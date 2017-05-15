<?php $seccion = 1; ?>
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>

    <div class="container">
		<h1>Estado de señales</h1>

		<div class="row">
			<div class="col-md-6">
				<h2>Señal 1</h2>
				
				<h3>Estado</h3>
				<div id="estado-senial-1">
				<h3><span class="label label-warning">Cargando...</span></h3>
				<p>PID: ?</p>
				</div>
				
				
								
				<div>
				<!-- <h4>Vuelta</h4> !-->
				<div class="embed-responsive embed-responsive-16by9">
					<iframe id="ytsen1" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
				</div>
				
				</div>
				
			</div>
	
			<div class="col-md-6">
				<h2>Señal2</h2>
				
				<h3>Estado</h3>
				<div id="estado-senial-2">
				<h3><span class="label label-warning">Cargando...</span></h3>
				<p>PID: ?</p>
				</div>
				
				<div>
				<!-- <h4>Vuelta</h4> !-->
				<div class="embed-responsive embed-responsive-16by9">
					<iframe id="ytsen2" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
				</div>
				
				</div>
				

			</div>
		</div>
		
		<div class="row" style="margin-top: 25px;">
			<div class="col-md-12">
				<div class="col-md-8"><h3>Conectividad con Youtube</h3></div>
				<div class="col-md-4"><h3><span class="label label-warning" id="ytlabel">Cargando...</span></h3></div>
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">Verificación:</div><div class="col-md-6 ytconinfo cargando" id="ytver">Cargando...</div>
						</div>
						<div class="row">
							<div class="col-md-6">Host</div><div class="col-md-6 ytconinfo cargando" id="ythost">Cargando...</div>
						</div>
						<div class="row">
							<div class="col-md-6">Puerto</div><div class="col-md-6 ytconinfo cargando" id="ytport">Cargando...</div>
						</div>
						<div class="row">
							<div class="col-md-6">Servicio</div><div class="col-md-6 ytconinfo cargando" id="ytserv">Cargando...</div>
						</div>
						<div class="row">
							<div class="col-md-6">Estado</div><div class="col-md-6 ytconinfo cargando" id="ytstatus">Cargando...</div>
						</div>
						
					</div>
				</div>
		</div>
    </div><!-- /.container -->
<?php include "footer.php"; ?>
