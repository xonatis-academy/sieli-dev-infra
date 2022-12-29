composer create-project --prefer-dist laravel/laravel booking

# JWT
composer require tymon/jwt-auth
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret

```php
// routes/api.php
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::post('refresh', 'AuthController@refresh');
Route::post('me', 'AuthController@me');
```

php artisan make:controller AuthController

Replir le controller

php artisan make:model Room
php artisan make:model Hotel
