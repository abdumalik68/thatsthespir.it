# url: api.thatsthespir.it
# directory: /home/thatsthespirit/www/api.thatsthespir.it/public/

## create User
mkdir -p /home/thatsthespirit/.ssh
touch /home/thatsthespirit/.ssh/authorized_keys
useradd -d /home/thatsthespirit thatsthespirit
usermod -aG sudo thatsthespirit
chown -R thatsthespirit:thatsthespirit /home/thatsthespirit/
chown root:root /home/thatsthespirit
chmod 700 /home/thatsthespirit/.ssh
chmod 644 /home/thatsthespirit/.ssh/authorized_keys
usermod -aG www-data thatsthespirit
cd /home/thatsthespirit
mkdir www
# virtual host
mkdir /home/thatsthespirit/www/api.thatsthespir.it/public
chown -R www-data:www-data /home/thatsthespirit/www/api.thatsthespir.it/public
sudo cp /etc/nginx/sites-available/default /etc/nginx/sites-available/api.thatsthespir.it
nano /etc/nginx/sites-available/api.thatsthespir.it
ln -s /etc/nginx/sites-available/api.thatsthespir.it /etc/nginx/sites-enabled/
