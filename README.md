Starmade Web Manager


Web managemant interface for shadow by doomsider providing more elegant and easy way to view and interact with Starmade Dedicated Server Objects in-game.

This software is licensed under GNU GPL 2 license. For terms see : https://www.gnu.org/licenses/old-licenses/gpl-2.0.html

Requirements :

Linux Server preferably Debian/Ubuntu (Ubuntu Server 14.04.LTS)

Server software :
- Apache 2.4
- php 5.5 to 7.0
- Mysql Server 5.5
- php5-intl (module for php5 -> "apt-get install php5-intl) - its required for symfony framework to work
- apache2-mpm-itk module installed and enabled (for running web application as user that runs doomsider shadow - see apache2 documentation how to set user as owner of apache instance runing this app in virtual host configuration file)

Libs :
- Symfony Standard Edition 2.8
* doomsider shadow bash script, and set up database for it (for install instructions for this, see doomsider repository install instructions -> https://github.com/doomsider/shadow)

Package Managers : 
- composer
- nodejs, npm
- bower

* doomsider shadow bash script, and set up database for it (for install instruction for this see doomsider repository install instructions -> https://github.com/doomsider/shadow)

Tested on Ubuntu 14.04 LTS


Install insttructions :
- Install serwer software mentioned above,
- Download this package ("git clone https://github.com/waski35/starmadewebmanager.git /var/www/starmadewebmanager");
- Install nodejs ("sudo apt-get install nodejs"),
- Install npm ("sudo apt-get install npm"),
- Install bower ("sudo npm install -g bower"),
- Navigate to /var/www/starmadewebmanager ("cd /var/www/starmadewebmanager"),
- Install composer in local directory (https://getcomposer.org/download/) ie. /var/www/starmadewebmanager or other web directory form where this page will be served by apache 2
- Install symfony 2.8 with composer "php composer.phar install" <- call this in /var/www/starmadewebmanager
- wait for composer to install dependencies,
- Install project dependencies with bower ("bower install") or ("bower install --allow-root") if running on root account,
  - if you get error that node has not been found install nodejs-legacy ("sudo apt-get install nodejs-legacy") to fix package naming issues on debian/ubuntu
- Edit "/var/www/starmadewebmanager/app/parameters.yml" -> lines with database_ (host, dbname, user, password, port) should contain apropirate settings for doomsiders shadow database; 
  - line containing "path_to_shadow" should be filled with directory (absolute system path) where dommsiders shadow main executable "shadow.dtsd" resides without trailing slash
- Edit "var/www/starmadewebmanager/app/config.yml" so password for admin user is no longer "secret_admin_password" for security reasons.



