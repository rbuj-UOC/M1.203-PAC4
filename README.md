# Laravel Sail

## Requisitos
- [php](https://www.php.net/)
- [Docker Desktop](https://www.docker.com/products/docker-desktop/)

## Instalar composer
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
mv composer.phar composer
```

## Instalar dependencias
```
./composer install
```

## Modificar el archivo de configuración

```
cp .env.sample .env
```

## Iniciar los contenedores

```
./vendor/bin/sail up
```

## Instalar los componentes de node

```
./vendor/bin/sail npm i
```

## Compilar

```
./vendor/bin/sail npm run build
```

## URL

http://localhost
