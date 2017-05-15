<?php $seccion = 2; ?>
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
    <div class="container">
		<h1>Estado de señales</h1>
	
		<div class="row">
			<div class="col-md-6">
				<h2>Señal 1</h2>
				
				<div class="well" style="height: 500px; overflow-y: scroll; overflow-x: hidden;">
				<?php
				$senial1log = file("/home/linuser/senial1.log");
				foreach( $senial1log as $line){ echo $line . "<br>"; }
				?>
				</div>
			</div>
	
			<div class="col-md-6">
				<h2>Señal2</h2>
				
				<div class="well" style="height: 500px; overflow-y: scroll; overflow-x: hidden;">
				<?php
				$senial2log = file("/home/linuser/senial2.log");
				foreach( $senial2log as $line){ echo $line . "<br>"; }
				?>
				</div>
			</div>
		</div>
    </div><!-- /.container -->
<?php include "footer.php"; ?>