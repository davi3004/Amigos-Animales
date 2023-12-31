# Amigos-Animales

Página web para una veterinaria con un registro php para dar de alta contactos.  

---

## Requisitos

Para poder hacer que la página web funcione es necesario montarla a través de un servidor local, en mi caso usé Laragoan en su versión completa, la cuál tiene soporte hasta php 8.
Este software puede ser descargado por medio del siguiente enlace. 
[Laragon/Downloads](https://laragon.org/download/index.html)
También es necesario tener MySQL instalad.
Se recomienda el uso de phpMyAdmin, no es obligatorio pero mejora la experiencia al usarse. 

---

En segundo lugar recomiendo tener configurada la base de datos en donde se añadirán los datos que se envíen a través del formulario.
El código de la base de datos usada se puede encontrar en el siguiente enlace. 

[Código de SQL para crear la base de datos](./assets/registros.sql)

O se puede copiar el siguiente código.

```sql
CREATE DATABASE 'registros';
USE 'registros';
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-11-2023 a las 03:51:16
-- Versión del servidor: 8.0.34
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `ID` int NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Direccion` varchar(400) NOT NULL,
  `Edad` int NOT NULL,
  `Ciudad` varchar(150) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Teléfono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
```

---

Para continuar es necesario mencionar la esrtuctura de archivos del proyecto, la cuál es la siguiente.

```
├───assets
│   ├───css
│   │       estilos.css
│   │       
│   │
│   ├───img
│   │       accesorios y juguetes.jpg
│   │       alimento premium para mascotas.webp
│   │       calabaza promocional.webp
│   │       close_FILL0_wght400_GRAD0_opsz24.svg
│   │       fondo_perro.jpg
│   │       Logo amigos animales.png
│   │       menu_FILL0_wght400_GRAD0_opsz24.svg
│   │       navidad promocional.webp
│   │       productos de higiene.png
│   │       promocionalx.webp
│   │
│   ├───js
│   │       showNavbar.js
│   └───registros.sql
│
└───public
    │   index.html
    │   novedades.html
    │   productos.html
    │   servicios.html
    │
    └───formulario
            con_db.php
            formulario.php
            registrar.php
```

La carpeta que se debe visitar desde el navegador es la de `public`, el navegador tomará el archivo `index.html` por si mismo y no se requiere acción adicional.

---

## Funcionamiento backend

Para comprender los archivo usados detrás del formulario primero es necesario cambiar los datos que vienen en el archivo llamado `con_db.php` dentro de lsa capretas `Amigos-Animales/public/formulario
`

Dentro de este archivo es recomendable revisar la configuración de las variables de a cuerdo con los datos de MySQL

```php
$ruta = 'localhost';
$usuario = 'USUARIO';
$contraseña = 'CONTRASEÑA';
$bd = 'NOMBRE_DE_LA_BASE_DE_DATOS';
```

> [!NOTE]
> El servidor ya deberá estar activo en este punto del proceso.

--- 

## Funcionamiento

El funcionamiento de la página web es sencillo, tiene un menú responsivo de a cuerdo con el dispositivo donde se visualice la página web y también se buscó mantener un diseño de a cuerdo con el logo de la veterinaria. 

En cuanto al formulario consta de tres partes como se puede observar a continuación.

```
    con_db.php
    formulario.php
    registrar.php
```

El archivo llamado `con_db.php` contiene la información necesaria para hacer la conexión con el administrador de base de datos y es el archivo que se debe modificar para el correcto funcionamiento de la web. También se encarga de indicar si ocurre un error durante el proceso de conexión. También hace un par de validaciones con ayuda de `mysqli_real_escape_string` esta sirve para crear una cadena SQL legal que se puede usar en una sentencia SQL, en este caso no est tan necesaria pero se prefirió su uso.

El archivo `formulario.php` se carga el formulario y se le da un bonito diseño por medio de css. Este carga un botón que al presionarlo se llama al archivo `registrar.php` para que este se encargue de hacer las validaciones pertinentes y de hacer la consulta SQL.

El archivo llamado `registrar.php` este se encarga de hacer la validación de input, comienza revisando que la llamada se haga por medio del método POST y que las variables no estén vacías, si alguno no se cumple el script cancela su ejecución. Luego se sanitizan las variables para evitar un ataque de inyección por SQL con ayuda de `mysqli_real_escape_string`. Luego se encarga de validar el correo con ayuda de `filter_var` que son filtros de validación, este se encarga de validar el correo, después valida la edad, asegurándose que esta sea de números positivos. Y lugo se encarga de validar el número telefónico para que este tenga una extensión máxima de 10 dígitos. Finalmente se encarga de hacer la consulta de SQL, esta no asigna un ID debido a que este está configurado para que se asigne automáticamente. Y finalmente nos menciona por medio de la consola si el registro se pudo completar o en caso contrario si no se pudo completar para posteriormente cerrar la conexión.


