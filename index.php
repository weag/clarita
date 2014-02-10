<?php
  session_start();
  include("templates/header.php"); 
  include("templates/menu.php"); 
 
  if ( isset($_GET["page"]) ) {
    include("templates/".$_GET["page"].".php" );
  }else{
    include("templates/landing.php");
  }
  include("templates/footer.php"); 
?>