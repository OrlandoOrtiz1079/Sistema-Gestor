<?php
session_start();
include "conexion.php";
$link=conectarse();

if (isset($_POST['Consultar'])) {
	 //invocas la funcion Conectarse que se encuentra en Conexion.php
      $Num_C=$_POST['txtNC'];
      if($Num_C==NULL)
	  {
		 echo '<script language = javascript>
			alert("Ingrese El Numero de Control")
			self.location="../vistas/modulos/Ver_Constancias.php"
			</script>';
	  }
	  else
	  {
		//Realizamos la Consulta a la Base de Datos Tabla Usuarios
		header("Location: ../vistas/modulos/Tabla.php?NC=$Num_C");
		
	  }

}
if(isset($_POST['Cancelar'])){
	echo '<script languaje =javascript>
					self.location="../vistas/modulos/Elegir_Accion.php";
					</script>';

}

?>