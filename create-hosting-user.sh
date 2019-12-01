#!/bin/bash
# Script automating the creation of a hosting account : the user, its folder, its virtualhost

: '
HOW-TO
$  bash /home/pixeline/bin/create-hosting-user username password domain.tld

Arguments:
 - username (if not created, create it, otherwise use current)  SEE https://gist.github.com/pixeline/9e5ea7d28e52138f0b31
 - user password (for existing user, enter anything, it will not be used)
 - domain name (will also be used to name the folder containing the website)
'

ROOT_UID=0
SUCCESS=0
E_USEREXISTS=70
VIRTUALHOST_TEMPLATE='https://gist.github.com/cd79b354732482dc52be368bc95d5ca7.git'

# Run as root, of course. (this might not be necessary, because we have to run the script somehow with root anyway)
if [ "$UID" -ne "$ROOT_UID" ]
then
  echo "Must be root to run this script."
  exit $E_NOTROOT
fi

#test if all arguments are there
if [ $# -eq 3 ]; then

	username=$1
	pass=$2
	domain=$3
	email="webmaster@$domain"
	webroot="/home/$username/www/$domain/public"

	# Check if user already exists.
	grep -q "$username" /etc/passwd
	if [ ! $? -eq $SUCCESS ]; then
		echo "User $username does not  exist. I'll create it now.."
 		# Create the User
		useradd -p `mkpasswd "$pass"` -d /home/"$username" -m -g users -s /bin/false "$username"
		usermod -aG $username $username
		usermod -aG sftponly $username
		usermod -aG www-data $username
		echo "The $username account is now setup."
	fi
	echo "Creating the website folder and virtualhost ..."
	# Check if git is installed
	if ! hash git 2>/dev/null; then
	    echo -e "Git is not installed! You will need it at some point anyways..."
		echo -e "Exiting, install git first."
		exit 0
	fi

	sudo -v

	# Check if the webroot exists
	if [ ! -d "$webroot" ]; then
		echo "Creating $webroot directory"
		mkdir -p $webroot
		chown root:root /home/$username
		chown -R $username:sftponly /home/$username/*
		# grant apache permissions
		chown -R www-data:www-data $webroot
		chmod -R 0775 $webroot
	fi


	# Virtualhost
	echo "Checking for the virtual host template file..."

	if [ ! -f /etc/nginx/sites-available/template.conf ]; then
	    echo "Downloading template file with Git..."
		sudo git clone "$VIRTUALHOST_TEMPLATE" /etc/nginx/sites-available/tmp
		sudo mv /etc/nginx/sites-available/tmp/virtualhost_le_template /etc/nginx/sites-available/template.conf
		sudo rm -Rf /etc/nginx/sites-available/tmp
	fi

	echo "Creating the new $domain virtual host file that has a webroot of: $webroot"

	if [ -f /etc/nginx/sites-available/template.conf ]; then

		sudo cp /etc/nginx/sites-available/template.conf /etc/nginx/sites-available/$domain.conf
		sudo sed -i 's/template.email/'$email'/g' /etc/nginx/sites-available/$domain.conf
		sudo sed -i 's/template.url/'$domain'/g' /etc/nginx/sites-available/$domain.conf
		sudo sed -i 's#template.webroot#'$webroot'#g' /etc/nginx/sites-available/$domain.conf

		echo "Adding $domain to the /etc/hosts file..."
		sudo sed -i '1s/^/127.0.0.1       '$domain'\n/' /etc/hosts
        sudo ln -s /etc/nginx/sites-available/$domain.conf /etc/nginx/sites-enabled/$domain
		sudo service nginx reload
		echo "Virtual host $domain created with a webroot at $webroot reachable from http(s)://$domain"

	else
		echo "Could not find the template.conf file"
		exit 0
	fi

else
        echo  " this programm needs 3 arguments you have given $# "
        echo  " you have to call the script $0 username and the pass "
fi

exit 0
