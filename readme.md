# Oso.test (Ocio Solo Ocio)
Aplicación rápida para una prueba de programación. 

Tiene
- Front con una selección de lugares de ocio
- Back con un CRUD para operar sobre los datos.
- Login/registro de usuarios
- Valoraciones y comentarios sobre los lugares.
- Busqueda en tiempo real XHR, Vue
- Generador de datos aleatorios para agilizar el desarrollo, incluyendo imágenes y coordenadas de los sitios
- Los datos se almacenan en MongoDb usando una implementación del ORM de laravel (Eloquent -> Moloquent)
- Seguridad (SQL, CSRF, Auth,...)

Tech Stack:

- Servidor (PHP)
    - Laravel 5
    - Faker
    - jenssegers/mongodb
    - Dependencias via composer

Cliente 
    - Vue (JS)
    - Dependencias via npm
    - Blade (PHP)
    - Bulma (CSS)
    - Font Awesome (Iconos)

BBDD:
    - MongoDB
    
    
Para echarlo a andar:
- Preparar un servidor local tipo XAMPP, recomiendo Laragon
- Instalar dependencias de composer
    - Ejecutar migraciones de laravel (crear bbdd)
    - Ejecutar seeds de laravel (rellenar bbdd con datos aleatorios)
- Instalar dependencias de npm
- Ejecutar npm run dev para compilar assets cliente

Si no falta nada, debería estar funcionando en la dirección que corresponda.
