<?php
	session_name("admin_tesis");
	session_start();
	if(!isset($_SESSION["nombre_usuario"])) header ('location:index.php')
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<table width="100%" border="1">
  <tr>
    <td align="right">
    <?php
			echo $_SESSION['nombre_usuario'];
			echo '<br>';
			echo date("d/m/Y");
	?>
    </td>
  </tr>
</table>


</body>
</html>