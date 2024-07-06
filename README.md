## TMDB CONNECTER
This Laravel project fetches data from The Movie Database (TMDB) API and seeds it into the local database. The project includes models, repositories, services, and seeders for handling series, seasons, and episodes.

# Requirements
- PHP >= 8.1
- Composer
- Laravel >= 10.x
- TMDB API Key

# Installation
1. Clone the repository
- git clone https://github.com/your-repository.git
- cd your-repository
2. Install dependencies:
```shell
composer install
```
3. Copy the example environment file and modify the environment variables:
```shell
cp .env.example .env
```
4. Update your .env file with your database credentials and TMDB API key:
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=your_database
- DB_USERNAME=your_username
- DB_PASSWORD=your_password
- TMDB_API_KEY=your_tmdb_api_key
5.  Generate an application key:
```shell
php artisan key:generate
```
6. Get the datas
```shell
php artisan connect:tmdb
```
# Unit Testing
```shell
php artisan test
```
