<?php
session_start();
session_destroy();
echo '<script> alert ("Cerraste Sesion...");</script>';
echo '<script> window.location="../../index.php";</script>';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

       <title> Saliendo...</title>
       <meta charset="utf-8">

       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <title>Documento sin título</title>
</head>

<body>
       <script language="javascript">
              location.href = "../../index.php";
       </script>
</body>

</html>