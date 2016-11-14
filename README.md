Test URL : http://charlymartins.fr/demo/test-marvel-symfony

Prérequis
-------------------
- PHP version 5.5.9 sur votre serveur web et CLI
- Les modules PHP suivant doivent être installés : JSON, ctype
- php.ini : la directive date.timezone doit être définie
- Composer (https://getcomposer.org/composer.phar)

Vous pouvez vérifier votre installation en vous rendant sur : http://votre-serveur/votre-appli/web/config.php

Installation
-----------------------
- Cloner ce repository ou dezipper les fichier dans l'espace géré par votre serveur web
- Installer les vendors en ouvrant un terminal de commande dans le dossier de l'application
````
composer install
```
ou si vous utilisez le PHAR
````
php composer.phar install
```
