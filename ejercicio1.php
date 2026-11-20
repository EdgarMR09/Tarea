<?php
function obtenerIniciales($nombre) {
    $nombre = trim($nombre);
    $letras = substr($nombre, 0, 3);
    $mayusculas = strtoupper($letras);
    return $mayusculas;
}

function obtenerAnio($fecha) {
    $fecha = trim($fecha);
    $anio = substr($fecha, 2, 2);
    return $anio;
}

function obtenerMesDia($fecha) {
    $fecha = trim($fecha);
    $mes = substr($fecha, 5, 2);
    $dia = substr($fecha, 8, 2);
    return $mes . $dia;
}

function generarClave($nombre, $fecha) {
    $parte1 = obtenerIniciales($nombre);
    $parte2 = obtenerAnio($fecha);
    $parte3 = obtenerMesDia($fecha);
    $claveFinal = $parte1 . $parte2 . $parte3;
    return $claveFinal;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>

    <div class="menu">
        <a href="index.php">Inicio</a>
        <a href="ejercicio1.php">Ejercicio 1</a>
        <a href="ejercicio2.php">Ejercicio 2</a>
    </div>
    <hr>

    <h2>Ejercicio 1. Generador de claves de identificación</h2>

    <form method="post" action="">
        <label>Nombre completo del estudiante:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Fecha de nacimiento (AAAA-MM-DD):</label><br>
        <input type="date" name="fecha" required><br><br>

        <button type="submit" name="btnGenerar">Generar Clave</button>
    </form>

    <br>

    <?php
    if (isset($_POST['btnGenerar'])) {
        $nombre = $_POST['nombre'];
        $fecha = $_POST['fecha'];

        if (strlen(trim($nombre)) >= 3 && strlen(trim($fecha)) == 10) {
            $clave = generarClave($nombre, $fecha);
            echo "<hr>";
            echo "<h3>Resultado:</h3>";
            echo "<p><strong>Nombre:</strong> " . $nombre . "</p>";
            echo "<p><strong>Fecha de nacimiento:</strong> " . $fecha . "</p>";
            echo "<p><strong>Clave generada:</strong> " . $clave . "</p>";
        } else {
            echo "<p>Por favor ingresa un nombre válido y una fecha completa.</p>";
        }
    }
    ?>

</body>
</html>