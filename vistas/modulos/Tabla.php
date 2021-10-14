<?PHP
session_start();
include "../../modelos/conexion.php";
$link = conectarse();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  include "FileCabezote.php";
  ?>
</head>

<body >

  <?php
  include "Cabezote.php";
  ?>

  <!--SECCION CONTENIDO -->
  <?php
  $Num_C = $_GET['NC'];
  $result = mysqli_query($link, "SELECT * FROM datos_alumnos WHERE Numero_C= '$Num_C'");
  if ($row = mysqli_fetch_array($result)) {

  ?>
    <!-- ================== -->
    <center>
      <div class="col-18 mt-2" style=" float: right; margin-right: 50px; margin-left: 50px;">
        <div class="card">
          <a style=" margin-left: 1120px;" href="Ver_Constancias.php" class="enviar"> <i class="fas fa-arrow-circle-left fa-2x" style="color: #845ef7;"></i><strong> Salir</strong></a>
          <h2 class="ml-4">CONSTANCIAS DE <?php echo "$row[Numero_C]"; ?> </h2>
          <div class="card-body">

            <div class="data-tables datatable-primary">
              <table class="text-center tablaES">
                <thead class="text-capitalize">
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Numero de Control</th>
                    <th>Carrera</th>
                    <th>Creditos</th>
                    <th>Periodo</th>
                    <th>Evento</th>
                    <th>Fecha</th>
                    <th>Autorizada Por</th>
                    <th>Descargar</th>
                  </tr>
                </thead>

                <?php
                do {
                ?>
                
                  <tbody>
                    <tr class="table-success">
                      <th align="center"><?php echo "$row[Nombre] "; ?></th>
                      <th align="center"><?php echo "$row[Apellido_P] "; ?></th>
                      <th align="center"><?php echo "$row[Apellido_M] "; ?></th>
                      <th align="center"><?php echo "$row[Numero_C] "; ?></th>
                      <th align="center"><?php echo "$row[Carrera] "; ?></th>
                      <th align="center"><?php echo "$row[Numero_Creditos] "; ?></th>
                      <th align="center"><?php echo "$row[Periodo] "; ?></th>
                      <th align="center"><?php echo "$row[Nombre_Evento] "; ?></th>
                      <th align="center"><?php echo "$row[Fecha] "; ?></th>
                      <th align="center"><?php echo "$row[Generada_Por] "; ?></th>
                      <th align="center">

                        <!-- <div class="fas fa-file-download fa-2x" style="color: #845ef7;"></div> -->
                        <style>
                          input[type=submit] {
                            background: url("../../imagenes/pdf2.png");
                            border: 0;
                            display: block;
                            height: 50px;
                            width: 60px;
                            margin-right: 20px;
                            cursor: pointer;

                          }
                        </style>

                        <!--========== FORMULARIO OCULTO PARA PASAR A VIZUALIZAR.PHP ==========-->
                        <form method="post"  action="../../modelos/Genera_Constancia.php"  >
                          <input name="txtNombre" type="hidden" value=<?php echo "'$row[Nombre]'"; ?>>
                          <input name="txtAP" type="hidden" value=<?php echo "'$row[Apellido_P]'"; ?>>
                          <input name="txtAM" type="hidden" value=<?php echo "'$row[Apellido_M]'"; ?>>
                          <input name="txtNC" type="hidden" value=<?php echo "'$row[Numero_C]'"; ?>>
                          <input name="txtCarrera" type="hidden" value=<?php echo "'$row[Carrera]'"; ?>>
                          <input name="txtNumCred" type="hidden" value=<?php echo "'$row[Numero_Creditos]'"; ?>>
                          <input name="txtVal" type="hidden" value=<?php echo "'$row[Valor_Numerico]'"; ?>>
                          <input name="txtEven" type="hidden" value=<?php echo "'$row[Nombre_Evento]'"; ?>>
                          <input name="txtPer" type="hidden" value=<?php echo "'$row[Periodo]'"; ?>>
                          <input name="txtFe" type="hidden" value=<?php echo "' $row[Fecha]'"; ?> />
                          <input name="nombre" type="hidden" value=<?php echo "'$row[Generada_Por]'"; ?> />
                          <input name="tabla_constancia" type="hidden" value="1" />
                          <a href="../../modelos/Genera_Constancia.php" target="_blank">
                            <input type="submit" value="" name="Enviar"> </a>
                        </form>

                      </th>
                    </tr>

                  </tbody>
                <?php
                } while ($row = mysqli_fetch_array($result)); ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </center>

    <!-- =================== -->
  <?php
  } else { ?>
    <script language=javascript>
      alert("Ningun Registro Coincide Con la Busqueda")
      self.location = "Ver_Constancias.php"
    </script>
  <?php
  }
  ?>
  <div class="four space"></div>

  <!--========== LLAMADA AL FOOTER ==========-->
  <?php
  include "footer.php";
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>

</html>