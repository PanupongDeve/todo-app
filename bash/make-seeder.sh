echo "####### make Factory ###########"
echo "####### ex ---> {{ name }}Seeder ###########"
read -p 'seeder name: ' name 
php artisan make:seed $name
