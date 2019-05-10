echo "####### make Controller ###########"
read -p 'controller name: ' controllerName 
php artisan make:controller $controllerName
