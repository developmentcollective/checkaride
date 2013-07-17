Instalation
===============
This product is developed with the following software stack
- apache2
- mysql 14.14 distrib 5.1.37
- php 5.2.10
- phpunit 3.316
- mod_rewrite

Install the application into your folder and create a virtual host
Here are the apache directives for the httpd.conf file

NameVirtualHost 127.0.0.1
<Directory "/path_to_the_code">
    Options Indexes FollowSymLinks ExecCGI Includes
    AllowOverride All
    Order allow,deny
    Allow from all
</Directory>

NameVirtualHost 127.0.0.1
<VirtualHost 127.0.0.1>
    DocumentRoot "/path_to_the_code"
    ServerName application_name.tld
</VirtualHost>

TODO
===============
rate a cab
add jobs class and cron script
fix the messages on the XML output for the phone for if there is no make and model.


