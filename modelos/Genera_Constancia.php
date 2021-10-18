<?php
session_start();
include "conexion.php";
$link = conectarse();

if (isset($_POST['Cancelar'])) {
	echo '<script languaje =javascript>
					self.location="../vistas/modulos/inicia_Sesion.php";
					</script>';
}

if (isset($_POST['Enviar'])) {

	//invocas la funcion Conectarse que se encuentra en Conexion.php
	//obtiene datos de Registro_Datos_Constancia.php
	$nombre = $_POST['txtNombre'];
	$AP = $_POST['txtAP'];
	$AM = $_POST['txtAM'];
	$NumCon = $_POST['txtNC'];
	$carrera = $_POST['txtCarrera'];
	$Cred = $_POST['txtNumCred'];
	$Even = $_POST['txtEven'];
	$generador = $_SESSION['nombre'];
	$Periodo = $_POST['txtPer'];
	$Fecha = $_POST['txtFe'];
	$Val = $_POST['txtVal'];



	

	if ($_POST['tabla_constancia'] == '1') {
		// 9876543210    
		// 0123456789
		// 2021-06-07;

		$dia = substr($Fecha, 9, 2); // devuelve "dd"
		$mes = substr($Fecha, 6, 2); // devuelve "mm"
		$a = substr($Fecha, 1, 4); // devuelve "aaaa"

	} else {
		$dia = substr($Fecha, 0, -8); // devuelve "dd"
		$mes = substr($Fecha, 3, -5); // devuelve "mm"
		$a = substr($Fecha, -4); // devuelve "aaaa"	

	}


	if ($mes == '01') {
		$m = "enero";
	} elseif ($mes == '02') {
		$m = "febrero";
	} elseif ($mes == '03') {
		$m = "marzo";
	} elseif ($mes == '04') {
		$m = "abril";
	} elseif ($mes == '05') {
		$m = "mayo";
	} elseif ($mes == '06') {
		$m = "junio";
	} elseif ($mes == '07') {
		$m = "julio";
	} elseif ($mes == '08') {
		$m = "agosto";
	} elseif ($mes == '09') {
		$m = "septiembre";
	} elseif ($mes == '10') {
		$m = "octubre";
	} elseif ($mes == '11') {
		$m = "noviembre";
	} elseif ($mes == '12') {
		$m = "diciembre";
	}

	//construye la nomeclatura de dias
	if ($dia == '01') {
		$fech = "el primer día del mes de " . $m . " del " . $a . ".";
	} else {
		if ($dia == '02') {
			$d = "dos";
		} elseif ($dia == '03') {
			$d = "tres";
		} elseif ($dia == '04') {
			$d = "cuatro";
		} elseif ($dia == '05') {
			$d = "cinco";
		} elseif ($dia == '06') {
			$d = "seis";
		} elseif ($dia == '07') {
			$d = "siete";
		} elseif ($dia == '08') {
			$d = "ocho";
		} elseif ($dia == '09') {
			$d = "nueve";
		} elseif ($dia == '10') {
			$d = "diez";
		} elseif ($dia == '11') {
			$d = "once";
		} elseif ($dia == '12') {
			$d = "doce";
		} elseif ($dia == '13') {
			$d = "trece";
		} elseif ($dia == '14') {
			$d = "catorce";
		} elseif ($dia == '15') {
			$d = "quince";
		} elseif ($dia == '16') {
			$d = "dieciséis";
		} elseif ($dia == '17') {
			$d = "diecisiete";
		} elseif ($dia == '18') {
			$d = "dieciocho";
		} elseif ($dia == '19') {
			$d = "diecinueve";
		} elseif ($dia == '20') {
			$d = "veinte";
		} elseif ($dia == '21') {
			$d = "veintiuno";
		} elseif ($dia == '22') {
			$d = "veintidós";
		} elseif ($dia == '23') {
			$d = "veintitrés";
		} elseif ($dia == '24') {
			$d = "veinticuatro";
		} elseif ($dia == '25') {
			$d = "veinticinco";
		} elseif ($dia == '26') {
			$d = "veintiséis";
		} elseif ($dia == '27') {
			$d = "veintisiete";
		} elseif ($dia == '28') {
			$d = "veintiocho";
		} elseif ($dia == '29') {
			$d = "veintinueve";
		} elseif ($dia == '30') {
			$d = "treinta";
		} elseif ($dia == '31') {
			$d = "treinta y uno";
		}

		$fech = "a los " . $d . " días del mes de " . $m . " del " . $a . ".";
	}

	$fecha2 = $a . $mes . $dia;

	if ($Val == 4) {
		$Des = "Excelente";
	}
	if ($Val == 3) {
		$Des = "Bueno";
	}
	if ($Val == 2) {
		$Des = "Regular";
	}
	if ($Val == 1) {
		$Des = "Deficiente";
	}


	//construye la nomeclatura de creditos
	if ($Cred == 0.5) {
		$Cr = "0.5 (medio) crédito.";
	} elseif ($Cred == 1) {
		$Cr = "1 (un) crédito.";
	} elseif ($Cred == 2) {
		$Cr = "2 (dos) créditos.";
	} elseif ($Cred == 3) {
		$Cr = "3 (tres) créditos.";
	}

	//VALIDAN AUSENCIA DE ESPACIOS EN BLANCO EN EL FORMULARIO
	if ($_POST['txtNombre'] == NULL || $_POST['txtAP'] == NULL || $_POST['txtAM'] == NULL || $_POST['txtNC'] == NULL || $_POST['txtCarrera'] == NULL || $_POST['txtNumCred'] == NULL || $_POST['txtVal'] == NULL || $_POST['txtEven'] == NULL || $_POST['txtPer'] == NULL || $_POST['txtFe'] == NULL) {
		echo '<script languaje =javascript>
					alert ("ERROR: No debes de Dejar Espacios en Blanco")
					self.location="../vistas/modulos/inicia_Sesion.php";
					</script>';
	} else {

		if ($_POST['tabla_constancia'] != '1') {
			$QUERY_INSERTAR = mysqli_query($link, "INSERT INTO datos_alumnos(Nombre, Apellido_P, Apellido_M, Numero_C, Carrera, Numero_Creditos, Nombre_Evento, Periodo, Generada_Por, Fecha, Valor_Numerico) VALUES 
										('$nombre','$AP','$AM','$NumCon','$carrera','$Cred','$Even','$Periodo','$generador','$fecha2','$Val')");
			
			mysqli_close($link); //cierra conexion
		}

		echo "<SCRIPT>window.open ('Visualiza.php?nom=$nombre&AP=$AP&AM=$AM&NumCon=$NumCon&carrera=$carrera&Cred=$Cr&Valor=$Val&Desem=$Des&Even=$Even&Periodo=$Periodo&fecha=$fech','mywindow');</SCRIPT>";

		echo '<script languaje =javascript>				
					self.location="../vistas/modulos/inicia_Sesion.php";
					</script>';
	}
}//fin del if validar el boton enviar
