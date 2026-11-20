<?php
function limpiarNombre($nombre) {
    $nombre = trim($nombre);
    $nombre = str_replace(" ", "", $nombre);
    $nombre = str_replace("á", "a", $nombre);
    $nombre = str_replace("é", "e", $nombre);
    $nombre = str_replace("í", "i", $nombre);
    $nombre = str_replace("ó", "o", $nombre);
    $nombre = str_replace("ú", "u", $nombre);
    $nombre = str_replace("Á", "a", $nombre);
    $nombre = str_replace("É", "e", $nombre);
    $nombre = str_replace("Í", "i", $nombre);
    $nombre = str_replace("Ó", "o", $nombre);
    $nombre = str_replace("Ú", "u", $nombre);
    return $nombre;
}

function convertirMinusculas($texto) {
    $textoMinusculas = strtolower($texto);
    return $textoMinusculas;
}

function obtenerInstitucion($institucion) {
    $institucion = trim($institucion);
    $institucion = str_replace(" ", "", $institucion);
    $dosLetras = substr($institucion, 0, 2);
    return convertirMinusculas($dosLetras);
}

function obtenerAnio($anio) {
    $anio = trim($anio);
    $ultimosDos = substr($anio, -2);
    return $ultimosDos;
}

function generarUsuario($nombre, $institucion, $anio) {
    $nombreSinEspacios = limpiarNombre($nombre);
    $nombreMinusculas = convertirMinusculas($nombreSinEspacios);
    $siglasInstitucion = obtenerInstitucion($institucion);
    $anioCorto = obtenerAnio($anio);

    $usuario = $nombreMinusculas . $siglasInstitucion . $anioCorto;
    $usuario = str_replace(" ", "", $usuario);
    return $usuario;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>

    <div class="menu">
        <a href="Index.html">Inicio</a>
        <a href="ejercicio1.php">Ejercicio 1</a>
        <a href="ejercicio2.php">Ejercicio 2</a>
    </div>
    <hr>

    <h2>Ejercicio 2. Generador de nombres de usuario</h2>

    <form method="post" action="">
        <label>Nombre completo:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Nombre de la institución educativa:</label><br>
        <input type="text" name="institucion" required><br><br>

        <label>Año de ingreso:</label><br>
        <input type="text" name="anio" maxlength="4" required><br><br>

        <button type="submit" name="btnUsuario">Generar Usuario</button>
    </form>

    <br>

    <?php
    if (isset($_POST['btnUsuario'])) {
        $nombre = $_POST['nombre'];
        $institucion = $_POST['institucion'];
        $anio = $_POST['anio'];

        if (strlen(trim($nombre)) > 0 && strlen(trim($institucion)) >= 2 && strlen(trim($anio)) == 4) {
            $usuarioGenerado = generarUsuario($nombre, $institucion, $anio);
            echo "<hr>";
            echo "<h3>Resultado:</h3>";
            echo "<p><strong>Nombre:</strong> " . $nombre . "</p>";
            echo "<p><strong>Institución:</strong> " . $institucion . "</p>";
            echo "<p><strong>Año de ingreso:</strong> " . $anio . "</p>";
            echo "<p><strong>Usuario generado:</strong> " . $usuarioGenerado . "</p>";
        } else {
            echo "<p>Verifica que todos los datos estén completos (el año debe tener 4 dígitos).</p>";
        }
    }
    ?>

</body>
</html>