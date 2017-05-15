function sigcontrol(senial, accion, btn) {
	switch (accion){
		case "start":
			$("#control-senial-" + senial).append("Se está iniciando la señal...<br>");
			break;
		case "stop":
			$("#control-senial-" + senial).append("Se está deteniendo la señal...<br>");
			break;
		case "restart":
			$("#control-senial-" + senial).append("Se está reiniciando la señal la señal...<br>");
			break;
	}
	$.ajax({
		url: "sigcontrol.php",
		type: "POST",
		dataType: "json",
		data: { accion: accion, senial: senial , usuario: $("#username").html() },
		success: function(data){
			if ( data['code'] !== 0 ){
				$("#control-senial-" + senial).append("Error de ejecución de comando [" + data['code'] + "]: " + data['msg'] + "<br>");
				sigcheck(senial);
				btn.button('reset');
			} else {
				$("#control-senial-" + senial).append(data['msg'] + "<br>");
				sigconf(senial);
			}
		},
		error: function( xhr, status, errorThrown ) {
			$("#control-senial-" + senial).append("Error de ejecución de comando: " + status + ": " + errorThrown + "<br>");
			console.log(xhr);
			btn.button('reset');
		}
	});
}

function sigcheck(senial) {
	$.ajax({
		url: "sigcheck.php",
		type: "POST",
		data: { senial: senial },
		success: function(data){
			if ( data !== "1" ){
				$("#estado-senial-" + senial).html("\
					<h3><span class=\"label label-success playing\">Transmitiendo</span></h3>\
					<p>PID: " + data + "</p>");
			} else {
				$("#estado-senial-" + senial).html("\
				<h3><span class=\"label label-danger\">Detenido</span></h3>\
				<p>PID: No se encontró</p>");
			}
		},
		error: function( xhr, status, errorThrown ) {
			$("#estado-senial-" + senial).html("<p>Error recibiendo estado:<br>Error: " + errorThrown + "<br>Status: " + status + "<br>" + xhr + "</p>");
		}
	});
}

function sigconf(senial){
	$("[id^=senial-" + senial + "]").button('reset');
	$.ajax({
		url: "sigcheck.php",
		type: "POST",
		data: { senial: senial },
		success: function(data){
			if ( data !== "1" ){
				$("#control-senial-" + senial).append("La señal se encuentra en ejecución. (PID:" + data + ")<br>");
				$("#senial-" + senial + "-start").prop('disabled', true);
				$("#senial-" + senial + "-restart").prop('disabled', false);
				$("#senial-" + senial + "-stop").prop('disabled', false);
			} else {
				$("#control-senial-" + senial).append("La señal se encuentra detenida.<br>");
				$("#senial-" + senial + "-start").prop('disabled', false);
				$("#senial-" + senial + "-restart").prop('disabled', true);
				$("#senial-" + senial + "-stop").prop('disabled', true);
			}
		},
		error: function( xhr, status, errorThrown ) {
			$("#estado-senial-" + senial).html("<p>Error recibiendo estado:<br>Error: " + errorThrown + "<br>Status: " + status + "<br>" + xhr + "</p>");
		}
	});
}

function ytcheck(){
	// $(".ytconinfo").addClass("cargando");
	// $(".ytconinfo").html("Cargando...");
	// $("#ytlabel").html('Cargando...');

	$.ajax({
		url: "ytcheck.php",
		dataType: "json",
		success: function(data){
			if ( data['code'] !== 0 ){
				$("#ytlabel").removeClass("label-success label-danger");
				$("#ytlabel").addClass("label-warning");
				$("#ytver").html("FALLO: Error de sistema al ejecutar verificación: " + data['error']);
				$("#ythost").html("Desconocido");
				$("#ytport").html("Desconocido");
				$("#ytserv").html("Desconocido");
				$("#ytlabel").html('Desconocido');
				$("#ytstatus").html('Desconocido');
				
				$("#ytver").removeClass("cargando");
			} else {
				if ( data['state'] = "open" ){
					if ( data['state2'] = "syn-ack" ){
						$("#ytlabel").html("Correcto");
						$("#ytlabel").removeClass("label-warning label-danger");
						$("#ytlabel").addClass("label-success");
						$("#ytver").html("<strong>Verificación realizada: Conexion disponible.</strong>");
					} else {
						$("#ytlabel").html("Alerta");
						$("#ytlabel").removeClass("label-success label-danger");
						$("#ytlabel").addClass("label-warning");
						$("#ytver").html("<strong>Verificación realizada: Puerto abierto, pero conexión no establecida.</strong>");
					}
				} else {
					$("#ytlabel").html("Fallo");
					$("#ytlabel").removeClass("label-success label-warning");
					$("#ytlabel").addClass("label-danger");
					$("#ytver").html("<strong>Verificación realizada: Conexión no disponible.</strong>");
				}					
				$("#ythost").html(data['hostname'] + " (" + data['address'] + ")");
				$("#ytport").html(data['portid'] + " (" + data['protocol'] + ")");
				$("#ytserv").html(data['service']);
				$("#ytstatus").html(data['state'] + " (" + data['state2'] + ")");
				

			}
		},
		error: function( xhr, status, errorThrown ) {
			console.log(xhr);
			$("#ytlabel").removeClass("label-success label-danger");
			$("#ytlabel").addClass("label-warning");
			$("#ytver").html("FALLO: Error de apache al ejecutar verificación: " + status + " | " + errorThrown);
			$("#ythost").html("Desconocido");
			$("#ytport").html("Desconocido");
			$("#ytserv").html("Desconocido");
			$("#ytstatus").html("Desconocido");
			$("#ytlabel").html("Desconocido");
		}
	});
}

$( document ).ready(function(){
	
	// Para el estado en el monitoreo.
	if ( $("#estado-senial-1").length > 0 ) {
		sigcheck(1);
		sigcheck(2);
		ytcheck();
		
		setInterval(function () {
			sigcheck(1);
			sigcheck(2);
		},15000);
		
		setInterval(function () {
			$(".playing").toggleClass("playing2");
		},500);
		
		setInterval(function () {
			ytcheck();
		},15000);
		
	};
	
	// Para Control
	if ( $("#control-senial-1").length > 0 ) {
		sigconf(1);
		sigconf(2);
	}
	
	$("#senial-1-start").on('click', function(){ sigcontrol(1,"start",this); });
	$("#senial-1-restart").on('click', function(){ sigcontrol(1,"restart",this); });
	$("#senial-1-stop").on('click', function(){ sigcontrol(1,"stop",this); });
	$("#senial-2-start").on('click', function(){ sigcontrol(2,"start",this); });
	$("#senial-2-restart").on('click', function(){ sigcontrol(2,"restart",this); });
	$("#senial-2-stop").on('click', function(){ sigcontrol(2,"stop",this); });
	
	// Para todo.
	$(".btn-ctrl").on('click', function () {
		var b = $(this).button('loading');
	});
	
	$("#server-restart").on('click',function (){
		// $('.modal-dialog').addClass("modal-sm");
		$('.modal-header').addClass("titulo titulo-rojo");
		$('.modal-title').html("<h3>Alerta</h3>");
		$('#modal-ok-btn').addClass("btn-danger");
		$('.modal-body').html("<p>Está a punto de reinciar el servidor. Este proceso demora alrededor de 5 minutos, durante los cuales estarán caidas las señales.</p><p>Las señales se reanudarán automáticamente cuando se vuelva a iniciar el servidor.</p><p><strong>¿Está seguro de que desea continuar?</strong></p>");
		$('#modal-ok-btn').attr('href','mensaje.php?msg=reset');
		$('#myModal').modal('show');
	});
	
	$("#server-shutdown").on('click',function (){
		// $('.modal-dialog').addClass("modal-sm");
		$('.modal-header').addClass("titulo titulo-rojo");
		$('.modal-title').html("<h3>Alerta</h3>");
		$('#modal-ok-btn').addClass("btn-danger");
		$('.modal-body').html("<p>Está a punto de apagar el servidor. Mientras esté apagad el servidor estarán caidas las señales.</p><p>Las señales se reanudarán automáticamente cuando se vuelva a iniciar el servidor.</p><p><strong style='color: red;'>Para volver a iniciar el servidor deberá poder acceder a él físicamente.</strong></p><p><strong>¿Está seguro de que desea continuar?</strong></p>");
		$('#modal-ok-btn').attr('href','mensaje.php?msg=shutdown');
		$('#myModal').modal('show');
	});
});

function loadyt(target,chanid){
	$.getJSON( "https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=" + chanid + "&type=video&eventType=live&key=AIzaSyBOmBeYtdsjrluNivBhqC_QI-_10xppM2s", function( data ) {
	  var videoId = data.items[0].id.videoId;
	  $("#" + target).attr('src',"https://www.youtube.com/embed/" + videoId + "?autoplay=1&modestbranding=1&mute=0");
	});
}