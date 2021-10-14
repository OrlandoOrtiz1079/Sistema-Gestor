<?PHP
session_start();
include "../../modelos/conexion.php";
$link = conectarse();

// if (empty($_SESSION['nombre'])) {
//   echo '<script languaje =javascript>
//           alert ("ERROR: NO Puede Entrar si no ha iniciado Sesion... Favor de Registrarse")
//           self.location="../../index.php";
//           </script>';
// } else {
//   echo '<script languaje =javascript>
//           </script>';
// }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!--========== LLAMADA A FILECABEZOTE ==========-->
    <?php
    include "FileCabezote.php";
    ?>
</head>

<body>
    <!--========== LLAMADA A CABEZOTE ==========-->
    <?php
    include "Cabezote.php";
    ?>

    <!--========== SECCION CONTENIDO ==========-->
    <div style="position: relative;" style="color: grey;">
        <div style="width: 40%; position: absolute; top: 20px; left: 30%; ">

            <div class="modal-header  bg-primary text-white">
                <h5 class="modal-tittle">BUSQUEDA DE CONSTANCIAS</h5>
                <button type="button" class="close" data-dismiss="modal"><span></span></button>
            </div>

            <div style="  border-width: 2px; border-style: solid; border-color: black;">
                <form id="formulario" method="post" action="../../modelos/Eleccion.php"><br>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Ingrese Numero de Control:</label>
                                <input class="form-control" type="text" name="txtNC" autocomplete="on" maxlength="8" minlength="8" autofocus placeholder="Numero de Control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                            </div>
                        </div>

                        <!--========== BOTON ==========-->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Consultar" value="Consultar">Consultar</button>
                        </div>

                    </div>
                </form>
            </div>

            <!--========== PIE DE PAGINA ==========-->
            <?php
            include "footer.php";
            ?>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>

</html>