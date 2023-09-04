# DATABASE SEEDER MIGRATIONS

php artisan make:seeder UsersTableSeeder
php artisan make:seeder CategoriesTableSeeder
php artisan make:seeder AdsTableSeeder


php artisan db:wipe && php artisan migrate && php artisan db:seed && cls && php artisan serve
