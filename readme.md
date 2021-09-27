# Scaffolding Fortify Bootstrap

[Latest version on Packagist](https://packagist.org/packages/davidecariola/scaffolding-fortify-bootstrap)

This package was created to allow developers to focus on the code that really matters.
Installing Laravel Fortify and Bootstrap 5 can take a long time and many steps which, with this package, are reduced to a simple line of code.
Just install Scaffolding Fortify Bootstrap and you're ready to code right away!


Specifically, it will:
* install Laravel/Fortify Package
* install Laravel/Socialite Package
* install bootstrap 5, popperjs/core
* update resources/app.js and resources/app.css 
* run npm install && npm run dev
* create components folder in resources/views with layout file
* create auth folder in resources/views with login, register, forgot-password and reset-password files in it
* every user related view will already have a complete form with csrf token, methods, actions, validation errors and session messages
* create a controller named SocialiteController which manages authentication with Google


## Requirements
* PHP >= 8.0.0
* Laravel >= 8.0.0


## Installation

To get started, install package using composer:
```bash
composer require davidecariola/scaffolding-fortify-bootstrap
```


Next, run install artisan command to publish scaffolding:
```bash
php artisan sfb:install
```


Publish Laravel Fortify:
```bash
php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
```


Add in config/app.php, in providers[] array:
```bash
App\Providers\FortifyServiceProvider::class,
Laravel\Socialite\SocialiteServiceProvider::class,
```


Add in config/app.php, in aliases[] array:
```bash
'Socialite' => Laravel\Socialite\Facades\Socialite::class,
```


Make sure the following are enabled in config\fortify.php, in features[]:
```bash
Features::registration(),
Features::resetPasswords(),
Features::updateProfileInformation(),
Features::updatePasswords(),
Features::twoFactorAuthentication([
        'confirmPassword' => true,
]),
```


Add in app\Providers\FortifyServiceProvider, in boot() function:
```bash
Fortify::loginView(function () {
        return view('auth.login');
});

Fortify::registerView(function () {
        return view('auth.register');
});

Fortify::requestPasswordResetLinkView(function () {
        return view('auth.forgot-password');
});

Fortify::resetPasswordView(function ($request) {
        return view('auth.reset-password', ['request' => $request]);
});
```


Remember to update const HOME in app\Providers\RouteServiceProvider:
```bash
public const HOME = '/';
```


In .env file, link your smtp service (like [Mailtrap](https://mailtrap.io/)) and update sender.

In app\config\services.php, update google[] with your identification data.

In .env file, insert the same google keys you inserted in services.php:
```bash
GOOGLE_CLIENT_ID=YOUR_GOOGLE_CLIENT_ID
GOOGLE_CLIENT_SECRET=YOUR_GOOGLE_CLIENT_SECRET
GOOGLE_REDIRECT=http://localhost:8000/callback
```

After creating the database, create a new migration to add google_id field in the users table:
```bash
php artisan make:migration add_google_id_column_to_users_table
```

Then proceed to set 'google_id' as a string in the migration.

Add 'google_id' in app\Models\User, in fillable[].


When you're ready:
```bash
php artisan migrate
```


Build something amazing!!


## Usage

Just install this package and begin coding without worries!


## What's next?

I will cover every Laravel/Fortify possibility, like TwoFactorAuthentication.


## License

This package is open-sourced software licensed under the [MIT license](https://choosealicense.com/licenses/mit/)


## Credits

Thanks to Leonardo De Candia and Roberto Russo for awesome support!
