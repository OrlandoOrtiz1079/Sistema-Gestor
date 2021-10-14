<?PHP
//FUNCION QUE PERMITE CONECTARNOS A LA BASE DE DATOS
function conectarse()
   {
	if(!($link=mysqli_connect("localhost","root","")))
	    {
			echo "Error: Conectando a la base de datos";
			exit();
		
		}
				    			
		if(!mysqli_select_db($link,"sdr"))
		    {
			  echo "Error seleccionando a la base de datos";
			  exit();
			}
			return $link;
		
   }
   conectarse();
?>