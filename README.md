# php - Framework

### Requirements
- php 8.2
- composer 
- mysql
- symfony local server

install symfony local web server from here (https://symfony.com/doc/current/setup/symfony_server.html)


## Install

run the following command to install required packages 
``` 
composer update
``` 

copy the .env.example file to a .env file and configure 

migrate and seed to database 

``` 
cd database/Schema && php UserSchema.php && php CustomerSchema.php && cd .. && cd seeders && php users_seeder.php && php customer_seeder.php && cd .. && cd ..
```

run the server

``` 
symfony server:start --passthru=front.php
```

defined routes are currently:

- /users
- /index/{name}
- /customers



