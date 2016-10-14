Starmade Web Manager


Web managemant interface for shadow by doomsider

Requirements :

Linux Server preferably Debian/Ubuntu (Ubuntu Server 14.04.LTS)

Server software :
- Apache 2
- php 5.4
- Mysql Server 5.5
- php5-intl (module for php5 -> "apt-get install php5-intl) - its required for symfony framework to work

Libs :
- Symfony Standard Edition 2.8
- composer
- bootstrap
- jquery

* doomsider shadow bash script, and set up database for it (for install instruction for this see doomsider repository install instructions

Tested on Ubuntu 14.04 LTS


Install insttructions :
- Install serwer software mentioned above,
- Install composer in local directory (https://getcomposer.org/download/) ie. /var/www/starmadewebmanager or other web directory form where this page will be served by apache 2
- Install symfony 2.8 with composer "php composer.phar install" <- call this in /var/www/starmadewebmanager
- wait for composer to install dependencies

