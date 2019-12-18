#Tickets System 

## Installation

Follow the steps below to quickly set up the application.

1. Dedicate a domain/subdomain to the project and set up the virtual host accordingly.
2. On the command line, run `composer install` to install all dependencies, and then `composer dump` to autoload the needed files.
3. Create a database that will be used for the application purposes.
4. Copy the .env.example file on the root of the app to a new file named .env. Update the database fields according to your local setup and set the APP_KEY.
5. On the command line, run `php artisan key:generate`
6. Still in the command line, run `php artisan migrate` to create the needed tables. 
7. Run `php artisan db:seed` to run all of the seeders.
8. Run `php artisan serve`

##Log in
All passwords are: password.<br>
Admin login: admin@mail.ru.<br>
Logins of users you can see in "Пользователи" sidebar.



## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
