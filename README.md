1.	Opis tematyki: 
Aplikacja Komisu samochodowego z podziałem na  użytkowników (klientów) oraz adminów (admin/super admin). Aplikacja wykonuje podstawowe akcje CRUD. Zawiera prostą logikę biznesową manipulując statusami samochodów, historią zamówień użytkownika itp. 

2.	Opis wykorzystanych technologii:
a)	Język programowania PHP 8.1 (https://www.php.net/releases/8.1/en.php)
b)	Framework Laravel 9.17.0 (https://laravel.com/docs/9.x/releases)
c)	Baza danych PostgreSQL 13 (https://www.postgresql.org/download/)
d)	Biblioteka Spatie do zarządzania rolami użytkowników (https://spatie.be/docs/laravel-permission/v5/introduction)
e)	Biblioteka Bootstrap 5 (https://getbootstrap.com/docs/5.0/getting-started/introduction/)

3.	Opis wykorzystanych narzędzi: 
a)	Środowisko programistyczne PHPStorm 
(https://www.jetbrains.com/phpstorm/documentation/?source=google&medium=cpc&campaign=14335686150&term=phpstorm&gclid=Cj0KCQjwwJuVBhCAARIsAOPwGASHIvS-g9nCdJltnWleFVyT4pDWXDpwd5dhMVWevogYbhJ68CK0PL0aAmdHEALw_wcB)
Darmowa licencja dla studentów

b)	pgAdmin 4 (https://www.pgadmin.org/download/)
Narzędzie, pozwalające pracować z bazą PostgreSQL korzystając z GUI

c)	Composer CLI (https://getcomposer.org/)

d)	Node.js (https://nodejs.org/en/)


4.	Instrukcja uruchomienia aplikacji
a)	Zainstalować PHP w wersji min 8.1
b)	Zainstalować serwis bazy danych PostgreSQL 13
c)	Zainstalować „composer”
d)	Zainstalować „Node.js”
e)	Uzupełnić dane do połączenia z bazą danych w pliku .env
Polecenia do uruchomienia w głównym folderze projektu:
a)	composer update
b)	composer install
c)	npm install
d)	php artisan db:create (polecenie utworzy bazę danych. UWAGA! Jeśli baza o nazwie podanej w pliku konfiguracyjnym już istnieje zostanie ona usunięta)
e)	php artisan migrate
f)	php artisan db:seed
g)	php artisan serve

Aplikacja będzie dostępna pod adresem: http://localhost:8000

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
