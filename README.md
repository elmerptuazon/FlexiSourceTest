## Lumen 8 Dev Test

## Setup
- Run `composer install` on your cmd or terminal
- Copy `.env.example` file to .env on the root folder. You can type copy `.env.example` `.env` if using command prompt Windows or cp `.env.example` `.env` if using terminal, Ubuntu
- Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
- Run `php artisan migrate:fresh --seed`
- Run `php artisan jwt:secret`
- Run `php artisan run:import` to generate random customers with options `--nationality=au`(default *au*) and `--limit=100`(default *100*)
- Run `php -S localhost:8000 -t public`

## Exported Postman Collection 
 - https://drive.google.com/file/d/1XYd9uHrePQVB80srAKWtMP08QjJ2R_me/view?usp=sharing
 - If encountered authenticated please use the 2 Client Token Login Request. It is automatically changing the values of the variable inside so just click Send button. Please refer video shared.
