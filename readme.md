
Make Templates (PDF, Email and build Newsletter)- Bootstrap Template - HTML5 and Laravel

By Using this you can make Email Templates, build Newsletter and Create PDF Files. Here are simple steps you need to follow to install on your server.

Please install composer on your machine. You can go to following link to install composer

URL: https://getcomposer.org/doc/01-basic-usage.md

Please run this command to install packages.

php composer.phar update

Please update .env and connect your site with db and also update config/update.php

Run following command and run the server. 

php artisan serve

After run this command "Laravel Development Server" Started if all configuration goes good
 
You can convert html to pdf by following command. 

php artisan html:pdf 1

If you add "1" it means all foles in /storage/html/ will be converted to pdf. If you give any specific filename like temp then you need to add following command

php artisan html:pdf temp

You have to place all html files on following path

/storage/html/

All PDF will be exported to following path

/storage/pdf/

All PDF have random names, they stored in database.   