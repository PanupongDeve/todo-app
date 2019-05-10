echo "####### make Factory ###########"
echo "####### ex ---> {{ name }}Factory ###########"
read -p 'factory name: ' name 
php artisan make:factory $name
