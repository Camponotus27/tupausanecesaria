```sh
make db-up
```

```sh
docker run -p 3306:3306 --name mysql-tupausanecesaria -e MYSQL_ROOT_PASSWORD=1234 -d mysql
```


# Dev container

## Run aplication

´´´sh
php artisan serve
´´´

## Run migrations and seed
Created all tables and data

´´´sh
php artisan migrate --seed
´´´

´´´sh
git config --global user.name "Tu Nombre"
git config --global user.email "tuemail@example.com"
´´´