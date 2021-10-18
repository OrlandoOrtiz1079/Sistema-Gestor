<!DOCTYPE html>
<html lang="en">

<head>
	<title>Depto. Sistemas y Computación</title>
	<meta charset="UTF-8" />
	<meta name="BIENVENIDA" />
	<!--codigo para que la pagina sea RESPONSIVE -->
	<!-- Place somewhere in the <head> of your document -->
	<meta name="viewport" content="widht=device-widht,initial-scale=1">

	<!--CARGAN LIBRERIAS CSS -->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="imagenes/ITILogo.png" type="image/x-icon">

	<!--icono de pagina en navegador -->
	<link rel="shortcut icon" type="imagenes/x-icon" href="favicon.ico" />
	<link rel="author" type="text/plain" href="humans.txt" />

	<!--direccion URL para que jquery actualice a ultima version -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="js/jquery.flexslider.js"></script>
	<script type="text/javascript" charset="utf-8">
		$(window).load(function() {
			$(".flexslider").flexslider();
		});
	</script>
</head>

<body>
	<div class="one space"></div>

	<!--ENCABEZADO DE LA PAGINA PRINCIPAL -->
	<header>
		<div class="logo1"><img src="imagenes/EDULogo.png" title="Firma Secretaría de Educación Pública"></div>
		<div class="logo2"><img src="imagenes/TNMLogo.png" title="Logo Institucional Tecnológico Nacional de México"></div>
		<div class="espacio1"></div>
		<h1>INSTITUTO TECNOLÓGICO DE IGUALA </h1>
		<h2>Departamento de <br> Sistemas y Computación</h2>

	</header>



	<div class="one space"></div>
	<!--FIN DEL ENCABEZADO DE NUESTRA PAGINA PRINCIPAL -->


	<!--SECCION CONTENIDO -->
	<section id="contenido">
		<section id="principal">
			<a href="vistas/modulos/Inicia_Sesion.php" class="enviar"><img src="imagenes/sesion.jpg">&nbsp;Iniciar Sesión</a>
			<div class="espacio1"></div>
			<div align="center"><img class="centro" src="imagenes/ITILogo.png" title="Logo Intituto Tecnológico de Iguala"></div>
			<div class="three space"></div>
		</section>
	</section>
	<!--SECCION PIE DE PAGINA -->
	<footer>
		(C) Copyright alls Reserved
	</footer>
</body>

</html>