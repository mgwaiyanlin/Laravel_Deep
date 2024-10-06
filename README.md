## Useful commands
-  `php artisan make:controller DashboardController`
##### with pre-defined functions
-  ` php artisan make:controller IdeaController -r `
-  `php artisan make:model Idea -m`
##### with model, controller, migrations
-  ` php artisan make:model Idea -m -c`
-  ` php artisan make:provider RouteServiceProvider `


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
