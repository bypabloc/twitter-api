# twitter api with auth Laravel Sanctum

### Crear base de datos en mysql o mariadb, ej: 
```
CREATE DATABASE twitter_db;
```

### Ejecutar el siguiente comando para instalar los paquetes de composer:
```
composer install
```

### Ejecuta el siguiente comando para generar la clave cifrada de laravel:
```
php artisan key:generate
```

### Ejecutar las migraciones:
```
php artisan migrate
```

### Ejecuta los seeds, esto creara una lista de 10 usuarios, la contraseña para todos es "123456" (sin las comillas)
```
php artisan db:seed
```

### Predeterminado se crea un usuario con las siguientes credenciales: 
#### nickname: bypabloc
#### email: pacg1991@gmail.com
#### password: 123456
