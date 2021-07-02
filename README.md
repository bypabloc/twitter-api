# Twitter api with auth Laravel Sanctum

### Crear base de datos en mysql o mariadb, ej: 
```
CREATE DATABASE twitter_db;
```

### Ejecuta los siguientes comandos para iniciar el proyecto:

### Instalar los paquetes de composer:
```
composer install
```

### NOTA: para el siguiente comando debes tener el archivo ".env" creado, de lo contrario dará error. (Puede copiar y pegar el archivo ".env.example" y allí indicar los datos de la DB que creó)

### Generar la clave cifrada de laravel:
```
php artisan key:generate
```

### Ejecute las migraciones:
```
php artisan migrate
```

### Ejecuta los seeds, esto creara una lista de 10 usuarios, la contraseña para todos es "123456" (sin las comillas), tambien se crearan 100 tweets creados con ids de usuarios, obtenidos aleatoriamente de la tabla users.
```
php artisan db:seed
```

### Predeterminado se crea un usuario con las siguientes credenciales: 
#### nickname: bypabloc
#### email: pacg1991@gmail.com
#### password: 123456
