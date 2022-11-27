# Vision param api


Application filters products by option values via API.

The environment consists of 3 containers, running:

- nginx
- php (8.1)
- mysql as database

### Installation

1. Clone this rep
2. Run `docker compose up -d`
3. Once the containers are created ssh into the `php` container and run following commands

```
composer install
php "bin/console" doctrine:schema:create
php "bin/console" doctrine:migrations:migrate
php "bin/console" doctrine:fixtures:load
``` 

### Usage
There's no need to configure anything to run the application. 
Access the application in your browser at the given URL `http://127.0.0.1/parameter`

### Testing

Tests can be launched with
```
php bin/phpunit
```
