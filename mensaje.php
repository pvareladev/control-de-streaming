<?php 
// Notificar todos los errores de PHP (ver el registro de cambios)
error_reporting(E_ALL);

$mensaje = $_POST['msg'];

switch ($mensaje){
	case "reset": 
		include "header.php";
		include "navbar.php"; ?> 
			<div class="container">
			<div class="jumbotron">
			  <h1>Servidor Reiniciándose</h1>
			  <p>Se ha enviado la señal de reinicio al servidor. Presione el boton para actualizar la página en 10 minutos.</p>
			  <p><a class="btn btn-primary btn-lg" href="#" role="button" onClick="window.location.reload()">Actualizar</a></p>
			</div>
			</div><!-- /.container --> <?php
		include "footer.php";
		//exec('sudo /var/www/webscript.sh resetsrv');
	break;
	// case "shutdown":
		// include "header.php";
		// include "navbar.php"; ?> 
			// <div class="container">
			// <div class="jumbotron">
			  // <h1>Servidor Apagándose</h1>
			  // <p>Se ha enviado la señal de apagado al servidor. Deberá encenderlo manualmente más tarde.</p>
			// </div>
			// </div><!-- /.container --> <?php
		// include "footer.php";
		// exec('sudo /var/www/webscript.sh shutdownsrv');
	// break;
}
?>

