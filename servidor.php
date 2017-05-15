<?php $seccion = 4; ?>
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
    <div class="container">
		<h1>Estado de Servidor</h1>

		<div class="panel panel-default">
			<div class="panel-heading">Equipo</div>
			
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6" style="vertical-align: middle;"><p>Encencido</p></div>
					<div class="col-md-6" style="vertical-align: middle;"><p><?php
					exec("uptime -since", $output);
					echo $output[0];
					unset($output);
					?></p></div>
				</div>
				<div class="row">
					<div class="col-md-6" style="vertical-align: middle;"><p>Tiempo encendido</p></div>
					<div class="col-md-6" style="vertical-align: middle;"><p><?php
					exec("uptime", $output);
					echo $output[0];
					unset($output);
					?></p></div>
				</div>
			</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-heading">Dispositivos de video</div>
			
			<div class="panel-body">
				<?php
				exec("lspci | grep SDI",$output,$return);
				if($return == 1) { ?>
				<p>No se encontró ningun dipositivo SDI instalado.</p>
				<?php } else { 
				foreach($output as $device){
					$device = substr($device,0,7);
					exec("lspci -vmm -s " . $device,$output2);
					?>
					<div class="col-md-4">
					<p><?php foreach($output2 as $linea){ echo $linea; echo "<br>"; } ?></p>
					</div>
				<?php
					unset($output2);
				}}
				unset($output);
				unset($return);
				?>
			</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-heading">Procesos de video</div>
			
			<div class="panel-body">
				<div class="row">
					<div class="col-md-2" style="vertical-align: middle;"><p><b>PID</b></p></div>
					<div class="col-md-6" style="vertical-align: middle;"><p><b>Comando</b></p></div>
				</div>
				<?php
				exec("pgrep ffmpeg",$output,$return);
				if($return == 1) {?>
				<p>No hay procesos de video en ejecución</p>
				<?php } else {
				foreach($output as $pid){
				exec("xargs -0 < /proc/" . $pid . "/cmdline",$outcom)
				?>
				<div class="row">
					<div class="col-md-2" style="vertical-align: middle;"><p><?php echo $pid; ?></p></div>
					<div class="col-md-10" style="vertical-align: middle;"><p><?php echo $outcom[0]; ?></p></div>
				</div>
				<?php 
				unset($outcom);
				}
			unset($output);
			unset($return);
			} ?>
			</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-heading">Mantenimiento</div>
			
			<div class="panel-body text-center">
				<button id="server-restart" class="btn btn-md btn-warning" type="button">
					<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Reiniciar Servidor
				</button>
				
				<button id="server-shutdown" class="btn btn-md btn-danger" type="button">
					<span class="glyphicon glyphicon-off" aria-hidden="true"></span> Apagar Servidor
				</button>
			</div>
		</div>
    </div><!-- /.container -->
<?php include "footer.php"; ?>
