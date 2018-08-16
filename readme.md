EP1
composer require "laracasts/generators"                   - для быстрого создания таблиц\моделей
composer require "laracasts/testdummy" --dev              - в основном для тестов

php artisan make:migration:schema create_posts_table --schema="user_id:integer:foregin, title:string, body:text" //Creates Model and Migration 
php artisan make:seed PostsTableSeeder //create seed for posts table