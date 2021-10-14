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

    <form id="formulario" method="post" action="../../modelos/RegistroUsuarios.php">
      <fieldset>
        <legend align="center" id="titulo_frm">
          <h4>Registro de Usuarios</h4>
        </legend>
        &nbsp;&nbsp;&nbsp;&nbsp;<label>Nombre:</label><br />
        &nbsp;&nbsp;&nbsp;&nbsp;<input id="txtNombre" name="txtNombre" type="text" placeholder="Ingresa nombre completo" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"/><br />

    
        &nbsp;&nbsp;&nbsp;&nbsp;<label>Nombre de Usuario:</label><br />
        &nbsp;&nbsp;&nbsp;&nbsp;<input id="txtNombreU" name="txtNombreU" type="text" /><br />

        &nbsp;&nbsp;&nbsp;&nbsp;<label>Password:</label><br />
        &nbsp;&nbsp;&nbsp;&nbsp;<input id="txtPassword" name="txtPassword" TYPE="password" /><br />

        &nbsp;&nbsp;&nbsp;&nbsp;<label>Confirma Password:</label><br />
        &nbsp;&nbsp;&nbsp;&nbsp;<input id="txtConfirmaP" name="txtConfirmaP" TYPE="password" /><br />
  
       <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input style="cursor: pointer; border-radius: 10px;" type="submit" id="envio_comentario" name="Registro" value="Registrar" />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="cursor: pointer; border-radius: 10px;" type="submit" id="envio_comentario" name="Cancelar1" value="Cancelar" /><br /><br />


      </fieldset>
    </form></br></br></br></br></br>
  </section>
  <!--SECCION PIE DE PAGINA -->
  <footer>
    (C) Copyright alls Reserved
  </footer>
</body>

</html>