<!DOCTYPE html>
<html lang="es-mx">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" contenido="width=device-width, initial-scale=1.0" />
    <title>Amigos Animales Formulario Para Contactarte</title>
    <style></style>
    <link rel="stylesheet"  href="../../assets/css/estilos.css" />

    <link rel=" shortcut icon" type="image/png" href="../../assets/img/Logo amigos animales.png" />
</head>

<body>
    <header>
        <a href="../index.html"><img class="logoimg" src="../../assets/img/Logo amigos animales.png" /></a>
    </header>
    <nav>
        <ul class="sidebar">
            <li onclick=hideSidebar()>
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                    </svg></a>
            </li>
            <li><a href="../index.html">Inicio</a></li>
            <li><a href="../novedades.html">Novedades</a></li>
            <li><a href="../servicios.html">Servicios</a></li>
            <li><a href="../productos.html">Productos</a></li>
        </ul>
        <ul>
            <li class="hideOnMobile"><a href="../index.html">Inicio</a></li>
            <li class="hideOnMobile"><a href="../novedades.html">Novedades</a></li>
            <li class="hideOnMobile"><a href="../servicios.html">Servicios</a></li>
            <li class="hideOnMobile"><a href="../productos.html">Productos</a></li>
            <li onclick=showSidebar() class="botonMenú">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
    <main>
    <form action="formulario.php" method="post">
       <div class="formulario">
            <h2>Formulario de registro</h2>
            <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Aquí puedes incluir tu archivo registrar.php
        include("registrar.php");
    }
?>

            <label for="nombre">Nombre</label>
            <input class="datos" type="text" name="nombre" id="nombre" placeholder="Nombre" required />
            <label for="direccion">Dirección</label>
            <input class="datos" type="text" name="direccion" id="direccion" placeholder="Dirección" required />
            <label for="edad">Edad</label>
            <input class="datos" type="number" name="edad" id="edad" placeholder="Edad" required />
            <label for="ciudad">Ciudad</label>
            <input class="datos" type="text" name="ciudad" id="ciudad" placeholder="Ciudad" required />
            <label for="correo">Correo</label>
            <input class="datos" type="email" name="correo" id="correo" placeholder="Correo" required />
            <label for="telefono">Teléfono</label>
            <input class="datos" type="tel" name="telefono" id="telefono" placeholder="Teléfono" required />
            <input class="boton" type="submit" value="Enviar">
       </div>
    </form>	
</main>



    <footer>
        <p>Dr. Juan Pérez Rodríguez</p>
        <p>Teléfonos: +52 55 1234 5678, +52 55 8765 4321</p>
        <p>Dirección: Calle Falsa 123, Tlalnepantla de Baz, México</p>
        <p>Correo electrónico: dr.juan.perez@cuidadocanino.com</p>
        <p>Derechos reservados 2023-2024</p>
    </footer>
    <script>
        function showSidebar() {
            const sidebar = document.querySelector(".sidebar")
            sidebar.style.display = 'flex'

        }
        function hideSidebar() {
            const sidebar = document.querySelector(".sidebar")
            sidebar.style.display = 'none'
        }
    </script>
</body>

</html>