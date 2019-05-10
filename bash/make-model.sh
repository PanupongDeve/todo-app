echo "####### make Controller ###########"
read -p 'model name: ' modelName 
php artisan make:model $modelName
