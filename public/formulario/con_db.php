<?php

$ruta = 'localhost';
$usuario = 'root';
$contraseña = 'CONTRASEÑA';
$bd = 'registros';

$conexion = mysqli_connect($ruta, $usuario, $contraseña, $bd);

$db = $conexion;

$ruta = mysqli_real_escape_string($db, $ruta);
$usuario = mysqli_real_escape_string($db, $usuario);
$contraseña = mysqli_real_escape_string($db, $contraseña);
$bd = mysqli_real_escape_string($db, $bd);

if (mysqli_connect_error()) {
    die(mysqli_connect_error());
    error_log(mysqli_connect_error());
} else {
    echo "<script>console.log('Conexión Exitosa');</script>";
}

?>
