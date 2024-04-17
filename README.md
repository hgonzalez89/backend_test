# backend_test
Prueba Técnica de Backend
Proyecto desarrollado con las tecnologías:
Laravel 7.2, Mysql, Inicio de Sesión JWT (Tokens), Vista de Login VUE 2 JS
Validaciones de datos del Backend con Validate y del Front con la librería JOI javascript
Uso de la librería Toastr del lado del Front
Acceso a los endpoint de Insert,Update,Delete protegidos por Token
El proyecto se encuentra trabajando bajo la ip/puerto :http://127.0.0.1:8000 
Validar y actualizar la conexión a la base de datos en el archivo .env
realizando con el comando php artisan serve , si la url/puerto cambian, modificarlos para las pruebas
Para validar el login vía VUE ejecutar php run watch  y acceder al navegador http://127.0.0.1:8000/

Para las pruebas de los endpoint desde una herramienta como postman o Thunder Cliente, es importante activar las cabeceras/headers:
Content-Type  =>  application/json
X-Requested-With  => XMLHttpRequest
Endpoints Públicos
http://127.0.0.1:8000/api/register
http://127.0.0.1:800/api/login

para revisar los Endpoints protegidos es importante enviar el Token que responde el login correcto, importante mencionar que dicho token solo tiene 1 hora de vigencia
Endpoints Protegidos
http://127.0.0.1:8000/api/products/insert
http://127.0.0.1:8000/api/products/update/{id}
http://127.0.0.1:8000/api/products/delete/{id}

http://127.0.0.1:8000/api/products/delete/{id}

LOGIN VUE JS
http://127.0.0.1:8000
