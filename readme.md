
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

php artisan html:pdf

You have to place all html files on following path

/public/html/

That command pick all pdf and put them on following path

/public/html/pdf/

All PDF have random names, they stored in database.   



