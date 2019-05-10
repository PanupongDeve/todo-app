echo "####### make Controller ###########"
echo "####### ex ---> create_{{model_name}}s_table ###########"
read -p 'migration name: ' modelName 
php artisan make:migration $modelName
