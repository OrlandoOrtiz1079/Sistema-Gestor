<?PHP
session_start();
include "../../modelos/conexion.php";
$link = conectarse();

if (empty($_SESSION['nombre'])) {
    echo '<script languaje =javascript>
          alert ("ERROR: NO Puede Entrar si no ha iniciado Sesion... Favor de Registrarse")
          self.location="index.php";
          </script>';
} else {
    echo '<script languaje =javascript>
          </script>';
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    include "FileHead.php";
    ?>
</head>

<body>
    <?php
    include "Cabezado.php";
    ?>

    <!--SECCION CONTENIDO -->
    <section id="contenido">

        <h3>ELABORACIÓN DE CREDITOS COMPLEMENTARIOS</h3>
        <br><br>

        <table>
            <tr>
                <th class="TablaMenu"><a href="Registro_Datos_Constancias.php">Generar Constancia</a></th>
                <th class="TablaMenu"><a href="Ver_Constancias.php">Ver Registro de Constancias</a></th>
                <th class="TablaMenu"><a href="RegistroUsuarios.php"><img src="../../imagenes/registrarse.png"> Registrarse</a></th>
                <th class="TablaMenu"><a href="Cerrar_Sesion.php"><img src="../../imagenes/sesion.jpg"> CerrarSesión</a></th>
            </tr>

        </table>


        <div class="one space"></div>
        <div><img class="centro" src="../../imagenes/ITILogo.png"></div>
        <div class="one space"></div>

        <div class="espacio1"></div>

    </section>
    <!--SECCION PIE DE PAGINA -->
    <footer>
        (C) Copyright alls Reserved
    </footer>
</body>

</html>