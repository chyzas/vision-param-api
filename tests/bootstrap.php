<?php

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__) . '/vendor/autoload.php';

if (file_exists(dirname(__DIR__) . '/config/bootstrap.php')) {
    require dirname(__DIR__) . '/config/bootstrap.php';
} elseif (method_exists(Dotenv::class, 'bootEnv')) {
    (new Dotenv())->bootEnv(dirname(__DIR__) . '/.env');
}

if (isset($_ENV['BOOTSTRAP_RESET_DATABASE'])) {
    // executes the "php bin/console cache:clear" command
    passthru(sprintf(
        'php "%s/../bin/console" doctrine:schema:drop --force --env=test --no-interaction',
        __DIR__
    ));

    passthru(sprintf(
        'php "%s/../bin/console" doctrine:schema:update --env=test --force --no-interaction',
        __DIR__
    ));

    passthru(sprintf(
        'php "%s/../bin/console" doctrine:fixtures:load --env=test --no-interaction',
        __DIR__
    ));
}
