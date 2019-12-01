server {

	root template.webroot;

	server_name template.url;
	index index.php index.html index.htm;

	location / {
		try_files $uri $uri/ /index.php?$query_string;
		# First attempt to serve request as file, then
		# as directory, then fall back to displaying a 404.
		# try_files $uri $uri/ =404;
	}

	# pass PHP scripts to FastCGI server
 	location ~ \.php$ {
         try_files $uri /index.php =404;
         fastcgi_split_path_info ^(.+\.php)(/.+)$;
         fastcgi_pass unix:/var/run/php/php7.3-fpm.sock;
         fastcgi_index index.php;
         include fastcgi_params;
         fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
         fastcgi_intercept_errors off;
         fastcgi_buffer_size 16k;
         fastcgi_buffers 4 16k;
         fastcgi_connect_timeout 600;
         fastcgi_send_timeout 600;
         fastcgi_read_timeout 600;
    }

	# deny access to .htaccess files, if Apache's document root
	# concurs with nginx's one
	location ~ /\.ht {
		deny all;
	}
}
