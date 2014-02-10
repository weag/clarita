<?php
	 
	 class Funciones{
		 
	 function mensaje($title,$message,$url,$time){
	echo "<html><head><title>Mensaje</title><meta HTTP-EQUIV='refresh' CONTENT='".$time."; URL=$url'><link href='comun/estilos.css' rel=stylesheet type='text/css'><link rel='shortcut icon' href='images/buy.png'< /></head><body>";
	echo "<div align=center>";
	echo "<table height='100%' width=400><tr><td valign='middle'>";
	echo "<table width=100% border=0 cellspacing=0 cellpadding=2 class=border-color bgcolor=FFFFFF>";
	echo "<tr><td align=left height=20 class=".'"'.'head-color border-color-bottom titulo-mensaje-t'.'"'."><b>".utf8_decode($title)."</b></td></tr>";
	echo "<tr><td height=10></td></tr>";
	echo "<tr><td align=left valign=top class=titulo-mensaje-c>".utf8_decode($message)."</td></tr>";
	echo "<tr><td height=10>&nbsp;</td></tr>";
	echo "</table><br><table width=100%><tr><td><div align=center><a href=$url><font color=FF0000>[ Retornar ]</font></a></div></td></tr></table>";
	echo "</td></tr></table>";
	echo "</div></body></html>";
	 }
	 
	 }
?>