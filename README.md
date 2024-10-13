## Useful commands
-  `php artisan make:controller DashboardController`
-  `php artisan make:controller IdeaController -r ` with pre-defined functions
-  `php artisan make:model Idea -m`
-  `php artisan make:model Idea -m -c` with model, controller, migrations
-  `php artisan make:provider RouteServiceProvider `
-  `php artisan make:migration add_bio_and_image_to_users ` augment columns to an existing table
-  `php artisan storage:link ` to link 'public/storage' with 'storage/app/public'
-  `php artisan make:migration create_follower_user_table --create `
-  `php artisan make:mail WelcomeEmail `


## Included Features
- CRUD functionalities with MySQL
- Flash Messages
- Data Validation
- Pagination

#### In Laravel, clearing the cache and other stored data is common when changes are not reflecting on your application. 
- ``` php artisan cache:clear ```
- ``` php artisan route:clear ```
- ``` php artisan view:clear ```
- ``` php artisan config:clear ```
- ``` php artisan event:clear ```
- ``` php artisan clear-compiled ```
- ``` php artisan make:controller FeedController --invokable ```

#### Laravel Debuger Installation
`composer require barryvdh/laravel-debugbar --dev`

