REQUISITOS:

    docker
    docker-compose
    npm
    nvm


INSTRUÇÔES de comandos:

    copiar arquivo .env.example para .env

    docker-compose build

    docker-compose up -d

    docker-compose exec web bash

    composer install

    php artisan key:generate

    chmod -R 775 storage/logs
    chown -R www-data:www-data storage/logs

    chmod -R 775 storage/framework/sessions
    chown -R www-data:www-data storage/framework/sessions

    chmod -R 775 storage/framework/views
    chown -R www-data:www-data storage/framework/views

    php artisan config:clear
    php artisan cache:clear

    exit

    docker-compose restart

    npm install

    npm install vue@next vue-router@4 @vitejs/plugin-vue


TESTES unitários:

    docker-compose run --rm web vendor/bin/phpunit