# uikit-220704-back

//add auto load classes;
composer dump-autoload

//install deps;
composer update

docker-compose build
docker-compose up -d
docker-compose down
docker-compose exec php php -i | grep mysql
docker exec -it  php-uikit sh

docker-compose exec app php /app/bin/mysql_create.php
docker-compose exec app php /app/bin/registration.php

docker-compose exec php php /var/www/html/homes_staging/bin/mysql_create_tables.php
docker-compose exec php php /var/www/html/homes_staging/bin/registration.php

========================
https://selectel.ru/blog/docker-compose/
==========================
install;
composer require predis/predis
composer require vlucas/phpdotenv
===
docker images
docker container ls
$ docker-compose exec [service name] [command]
docker-compose exec mysql-uikit ls
docker-compose logs nginx

docker exec -it e3f51d3d6e30 /bin/bash
