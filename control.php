<?php $seccion = 3; ?>
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>

	<div class="container">
		<h1>Control de señales</h1>
		
		<div class="row">
		<div class="col-md-6">
			<h2>Señal 1</h2>
			
			<div>
			<button class="btn btn-lg btn-success btn-ctrl" type="button" id="senial-1-start" data-loading-text="Iniciando..." disabled="disabled"><span class="glyphicon glyphicon-play" aria-hidden="true"></span> Iniciar</button>
			<button class="btn btn-lg btn-warning btn-ctrl" type="button" id="senial-1-restart" data-loading-text="Reiniciando..." disabled="disabled"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reiniciar</button>
			<button class="btn btn-lg btn-danger btn-ctrl" type="button" id="senial-1-stop" data-loading-text="Deteniendo..." disabled="disabled"><span class="glyphicon glyphicon-stop" aria-hidden="true"></span> Detener</button>
			</div>
			
			<h4 style="padding-top:25px;">Mensajes</h4>
			<div id="control-senial-1" class="mensajes">
			</div>
		</div>

		<div class="col-md-6">
			<h2>Señal2</h2>
			
			<div>
			<button class="btn btn-lg btn-success btn-ctrl" type="button" id="senial-2-start" data-loading-text="Iniciando..." disabled="disabled"><span class="glyphicon glyphicon-play" aria-hidden="true"></span> Iniciar</button>
			<button class="btn btn-lg btn-warning btn-ctrl" type="button" id="senial-2-restart" data-loading-text="Reiniciando..." disabled="disabled"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reiniciar</button>
			<button class="btn btn-lg btn-danger btn-ctrl" type="button" id="senial-2-stop" data-loading-text="Deteniendo..." disabled="disabled"><span class="glyphicon glyphicon-stop" aria-hidden="true"></span> Detener</button>
			</div>
			
			<h4 style="padding-top:25px;">Mensajes</h4>
			<div id="control-senial-2" class="mensajes">
			
			</div>
		</div>
		</div>
    </div><!-- /.container -->
<?php include "footer.php"; ?>
