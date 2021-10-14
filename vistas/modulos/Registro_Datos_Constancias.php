<?PHP
session_start();
include "../../modelos/conexion.php";
$link = conectarse();


// if (empty($_SESSION['nombre'])) {
//     echo '<script languaje =javascript>
//           alert ("ERROR: NO Puede Entrar si no ha iniciado Sesion... Favor de Registrarse")
//           self.location="../../index.php";
//           </script>';
// } else {
//     echo '<script languaje =javascript>
//           </script>';
// }

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Depto. Sistemas y Computación</title>
    <meta charset="UFL-8" />
    <meta name="REGISTRO DE DATOS DE CONSTANCIA" />
    <meta name="viewport" content="widht=device-widht,initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.4/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.4/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.4/dist/js/uikit-icons.min.js"></script>

    <link rel="shortcut icon" href="../../imagenes/ITILogo.png" type="image/x-icon">
    <!-- <link rel="stylesheet" href="vistas/assets/css/switch-bootstrap4-toggle.min.css"> -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/swichtCSS.css">

    <!-- <link rel="stylesheet" href="vistas/assets/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="../assets/css/Font-Awesome.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">

    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.dataTables.css">

    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">

    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- sweetalert2 -->
    <script src="../assets/js/sweetalert2.all.min.js"></script>

    <!--direccion URL para que jquery se vaya actualizando a la ultima version -->
    <link rel="stylesheet" href="../../js/jquery-ui.structure.css" />
    <link rel="stylesheet" href="../../js/jquery-ui.theme.css" />
    <script src="../../js/jquery-1.9.1.js"></script>
    <script src="../../js/jquery-ui.js"></script>


    <!--UTILIZACION DE HERRAMIENTA DATEPICKER PARA MOSTRAR WIDGET DE CALENDARIO-->
    <script LANGUAGE="JavaScript">
        $(function() {
            $.datepicker.setDefaults($.datepicker.regional["es"]);
            $("#datepicker").datepicker({
                firstDay: 1,
                dateFormat: 'dd/mm/yy',
                onSelect: function(date) {
                    formulario.txtFe.value = date
                },
                monthNames: ['Enero', 'Febrero', 'Marzo',
                    'Abril', 'Mayo', 'Junio',
                    'Julio', 'Agosto', 'Septiembre',
                    'Octubre', 'Noviembre', 'Diciembre'
                ],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá']
            }).datepicker(formulario.txtFe.value = ((new Date().toLocaleDateString('en-GB'))));
        });
    </script>

    <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }
    </script>


</head>

<body>
    <!--========== LLAMADA A CABEZOTE ==========-->
    <?php
    include "Cabezote.php";
    ?>

    <!--========== SECCION CONTENIDO ==========-->
    <div style="position: relative;" style="color: red;">
        <div style="width: 40%; position: absolute; top: 20px; left: 30%; ">

            <div class="modal-header  bg-primary text-white">
                <h5 class="modal-tittle">REGISTRO DE DATOS DEL ALUMNO</h5>
                <button type="button" class="close" data-dismiss="modal"><span></span></button>
            </div>

            <div style="  border-width: 1px; border-style: solid; border-color: black;">
                <form id="formulario" method="post" target="_blank" action="../../modelos/Genera_Constancia.php">

                    <div class="modal-body">
                        <div class="box-body">

                            <!--========== ENTRADA PARA EL NOMBRE ==========-->
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Nombre(s):</label>
                                <input class="form-control" type="text" name="txtNombre" placeholder="Nombre's de Alumno" autocomplete="on" onkeyup="mayus(this);" required>
                            </div>

                            <!--========== ENTRADA PARA EL APELLIDO PATERNO ==========-->
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Apellido Paterno:</label>
                                <input class="form-control" type="text" name="txtAP" placeholder="Apellido Paterno" autocomplete="on" onkeyup="mayus(this);" required>
                            </div>

                            <!--========== ENTRADA PARA EL APELLIDO MATERNO ==========-->
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Apellido Materno:</label>
                                <input class="form-control" type="text" name="txtAM" placeholder="Apellido Materno" autocomplete="on" onkeyup="mayus(this);" required>
                            </div>

                            <!--========== ES ENTRADA O MUESTRA DE TABLA ==========-->
                            <input name="tabla_constancia" type="hidden" value="2" />

                            <!--========== ENTRADA PARA EL NUMERO DE CONTROL ==========-->
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Numero de Control:</label>
                                <input class="form-control" type="text" name="txtNC" placeholder="Numero de Control" maxlength="8" minlength="8" autocomplete="on" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                            </div>

                            <!--========== SELECCION DE LA CARRERA ==========-->
                            <div class="form-group">
                                <label class="col-form-label">Carrera:</label>
                                <select class="custom-select" name="txtCarrera">
                                    <option value="INGENIERÍA EN SISTEMAS COMPUTACIONALES">ING. EN SISTEMAS COMPUTACIONALES</option>
                                    <option value="INGENIERÍA INFORMÁTICA">ING. INFORMÁTICA</option>
                                    <option value="INGENIERÍA INDUSTRIAL">ING. INDUSTRIAL</option>
                                    <option value="INGENIERÍA EN GESTIÓN EMPRESARIAL">ING. EN GESTIÓN EMPRESARIAL</option>
                                    <option value="CONTADOR PÚBLICO">CONTADOR PÚBLICO</option>
                                </select>
                            </div>

                            <!--========== SELECCION DE CREDITOS ==========-->
                            <div class="form-group">
                                <label class="col-form-label">Número de Creditos:</label>
                                <select class="custom-select" name="txtNumCred">
                                    <option value="0.5" selected>0.5</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>

                            <!--========== ENTRADA PARA EL VALOR NUMERICO ==========-->
                            <label for="example-text-input" class="col-form-label">Valor Numérico:</label><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="txtVal" id="flexRadioDefault1" value="4" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    4 - Excelente
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="txtVal" id="flexRadioDefault2" value="3">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    3 - Bueno
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="txtVal" id="flexRadioDefault3" value="2">
                                <label class="form-check-label" for="flexRadioDefault3">
                                    2 - Regular
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="txtVal" id="flexRadioDefault4" value="1">
                                <label class="form-check-label" for="flexRadioDefault4">
                                    1 - Deficiente
                                </label>
                            </div>

                            <!--========== ENTRADA PARA EL NOMBRE DEL EVENTO ==========-->
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Nombre del evento:</label>
                                <input class="form-control" type="text" name="txtEven" placeholder="Nombre del Evento" autocomplete="on" onkeyup="mayus(this);" required>
                            </div>

                            <!--========== ENTRADA PARA EL PERIODO ==========-->
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Periodo:</label>
                                <input class="form-control" type="text" name="txtPer" placeholder="Ciclo Escolar en que Realizo" autocomplete="on" onkeyup="mayus(this);" required>
                            </div>

                            <!--========== ENTRADA PARA DE EFECHA==========-->
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Fecha de Elaboracion:</label>

                                <!--========== CALENDARIO ==========-->
                                <center>
                                    <div id="datepicker"></div>
                                </center>
                            </div>

                            <!--========== FECHA SELECIONADA ==========-->
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Fecha Seleccionada:</label>
                                <input class="form-control" type="text" name="txtFe" placeholder="Fecha" readonly="readonly">
                            </div>
                        </div>

                        <!--========== PIE DEL MODAL ==========-->
                        <div class="modal-footer">
                            <button type="submit" name="Enviar" value="Enviar" class="btn btn-primary">Guardar usuario</button>
                        </div>
                    </div>
                </form>
            </div>

            <!--========== LLAMADA AL FOOTER ==========-->
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