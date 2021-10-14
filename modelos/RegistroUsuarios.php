<?php
session_start();
include "conexion.php";
$link = conectarse();


if (isset($_POST['Registro'])) {
	//invocas la funcion Conectarse que se encuentra en Conexion.php
	$nombre = $_POST['txtNombre'];
	$nombreU = $_POST['txtNombreU'];
	$password = $_POST['txtPassword'];
	$confirmap = $_POST['txtConfirmaP'];

	//VALIDAMOS QUE NO SE DEJEN ESPACIOS EN BLANCO EN EL FORMULARIO
	if ($_POST['txtNombre'] == NULL || $_POST['txtPassword'] == NULL || $_POST['txtConfirmaP'] == NULL) {
		echo '<script languaje =javascript>
					alert ("ERROR: No debes de Dejar Espacios en Blanco")
					self.location="../vistas/modulos/RegistroUsuarios.php";
					</script>';
	} else {		//VALORES TAL CUAL APARECEN EN LA BD
		if ($password == $confirmap) {
			$QUERY_INSERTAR = mysqli_query(
				$link,
				"INSERT INTO usuarios(Nombre,Nombre_U,Password) VALUES 
						('$nombre','$nombreU','$password')"
			);
				echo '<script languaje =javascript>
					alert ("Registro Exitoso...")
					self.location="../index.php";
					</script>';
			mysqli_close($link); //cierra conexion

		} else {
			echo '<script languaje =javascript>
						alert ("Las Contraseñas no Coinciden...")
						self.location="../vistas/modulos/RegistroUsuarios.php";
						</script>';
		}
	}
} //fin del if validar el boton enviar

//INICIA EL BOTON DE ENTRAR - INICIO DE SESION
elseif (isset($_POST['Entrar'])) {
	//invocas la funcion Conectarse que se encuentra en Conexion.php
	$nombre = $_POST['txtUsuario'];
	$password = $_POST['txtPassword'];
	if ($nombre == NULL || $password == NULL) {
		echo '<script language = javascript>
			alert("Faltan datos por llenar en el Formularion")
			self.location="../vistas/modulos/Inicia_Sesion.php"
			</script>';
	} else {
		//Realizamos la Consulta a la Base de Datos Tabla Usuarios
		$QUERY = mysqli_query($link, "SELECT * FROM usuarios WHERE usuario= '$nombre' AND password='$password'");
		$RT = mysqli_affected_rows($link);
		if ($RT > 0) {
			echo $nombre, $password, " prueba de error";
			$row = mysqli_fetch_array($QUERY);
			$_SESSION['nombre'] = $row['nombre'];

			echo '<script languaje =javascript>
					alert ("Iniciando Sesion para...  ' . $row['nombre'] . '")
					self.location="../vistas/modulos/Elegir_Accion.php";
					</script>';
		} else {

			echo '<script languaje =javascript>
					alert ("Inicio de Sesion Rechazada...Aceptar para Continuar")
					self.location="../vistas/modulos/Inicia_Sesion.php"
					</script>';
		}
	}
}
if (isset($_POST['Cancelar'])) {
	echo '<script languaje =javascript>
					self.location="../vistas/modulos/Inicia_Sesion.php"
					</script>';
}

if (isset($_POST['Cancelar1'])) {
	echo '<script languaje =javascript>
					self.location="../vistas/modulos/Elegir_Accion.php";
					</script>';
}
