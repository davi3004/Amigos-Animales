<?php
include("con_db.php");

if (empty($_POST['telefono'])) {
    exit(0);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre']) && isset($_POST['direccion']) && isset($_POST['edad']) && isset($_POST['ciudad']) && isset($_POST['correo']) && isset($_POST['telefono'])) {

    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
    $edad = mysqli_real_escape_string($conexion, $_POST['edad']);
    $ciudad = mysqli_real_escape_string($conexion, $_POST['ciudad']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);

    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);

    //función validar número
    function validarNumero($numero)
    {
        if (filter_var($numero, FILTER_VALIDATE_INT) === false) {
            return false;
        } else {
            return true;
        }
    }

    if (filter_var($correo, FILTER_VALIDATE_EMAIL) === false) {
        echo '<script>console.log("La dirección de correo electrónico no es válida");</script>';
        echo '<p class="error">La dirección de correo electrónico no es válida</p>';
    } elseif (!filter_var($edad, FILTER_VALIDATE_INT) || $edad < 0) {
        echo '<script>console.log("La edad debe ser un número entero positivo");</script>';
        echo '<p class="error">La edad debe ser un número entero positivo</p>';
    } elseif (strlen($telefono) !== 10 || !ctype_digit($telefono)) {
        echo '<script>console.log("El número de teléfono debe tener exactamente 10 dígitos");</script>';
        echo '<p class="error">El número de teléfono debe tener 10 dígitos</p>';
    } else {
        
        $consulta = $conexion->prepare("INSERT INTO `registros`(`Nombre`, `Direccion`, `Edad`, `Ciudad`, `Correo`, `Teléfono`) VALUES (?, ?, ?, ?, ?, ?)");
        $consulta->bind_param("ssisss", $nombre, $direccion, $edad, $ciudad, $correo, $telefono);
        $resultado = $consulta->execute();

        if ($resultado) {
            echo '<script>console.log("Registro exitoso");</script>';
        } else {
            echo '<script>console.log("Error al registrarse");</script>';
        }
    }
}

mysqli_close($conexion);
?>

