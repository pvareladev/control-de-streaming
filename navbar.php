    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Streaming Server 1</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li<?php echo ($seccion == 1) ? ' class="active"' : ''; ?>><a href="index.php">Monitoreo</a></li>
            <li<?php echo ($seccion == 4) ? ' class="active"' : ''; ?>><a href="servidor.php">Servidor</a></li>
			<li<?php echo ($seccion == 2) ? ' class="active"' : ''; ?>><a href="log.php">Log</a></li>
			<li<?php echo ($seccion == 3) ? ' class="active"' : ''; ?>><a href="control.php">Control</a></li>
			<!--
            <li><a href="#contact">Contact</a></li>
			!-->
          </ul>
		<div class="navbar-text navbar-right">Logueado como&nbsp;
		<div class="dropdown" style="float: right;">
			<a class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span id="username"><?php echo $_SERVER['PHP_AUTH_USER']; ?></span>
			<span class="caret"></span>
			</a>
		  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
			<li><a href="http://logout@10.15.1.70/control">Salir</a></li>
		  </ul>
		</div>
        </div><!--/.nav-collapse -->
      </div>
    </nav>