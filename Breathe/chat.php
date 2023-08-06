<?php
   include("php/comprobarSesion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>chat</title>
    <link rel="stylesheet" href="CSS/Base.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Grand+Hotel&family=Lato:wght@100&family=Montserrat:wght@300&display=swap');

    	* {
			font-family: 'Montserrat';
    	}
    	/*
		#menuLat {
			width: 5vw;
			height: 100vh;
			background-color: black;

			position: fixed;
			left: 0;
			top: 0;
		}*/


		/*Interfaz de mensajeria*/

		#ChatBarraSuperior{
			display: flex;
			flex-direction: row;
		    align-items: center;
		    padding-left: 100px;
		}

		#ChatBarraSuperiorDecoracion{
			position: fixed;
			width: 95vw;
			background-color: rgba(159, 233, 192, 1.0);
			top: 25px;
			left: 2.5vw;
			height: 80px;
			z-index: -20;
			border-top-right-radius: 15px;
			border-top-left-radius: 15px;
		}

		.ChatBarraSuperiorItem {
			width: 50px;
			height: 50px;
			border-radius: 25px;
			background-color: rgba(159, 233, 192, 1.0);

			display: flex;
			align-items: center;
			justify-content: center;
		}

		#ChatTitulo {
			font-family: 'GrandHotel';
			font-size: 30px;
			height: 20px;
		}

		#ChatCuadroDeDialogo {
			background-color: rgba(230, 230, 230, 1.0);
			margin-top: 30px;
			height: 74vh;
			width: 95vw;
			margin-left: 2.5vw;
			overflow-y:scroll;
  			overflow-x:hidden;
/*			border-bottom-left-radius: 15px;*/
/*			border-bottom-right-radius: 15px;*/

			scrollbar-width: thin;
  			scrollbar-color: #d4d4d4 transparent;
		}

		#ChatCuadroDeDialogo::-webkit-scrollbar {
			width: 8px;
		}

		#ChatCuadroDeDialogo::-webkit-scrollbar-track {
			background-color: transparent;
		}

		#ChatCuadroDeDialogo::-webkit-scrollbar-thumb {
			background-color: #d4d4d4;
			border-radius: 4px;
		}

		/* Estilos generales para otros navegadores */
		#ChatCuadroDeDialogo::-moz-scrollbar {
			width: 8px;
		}

		#ChatCuadroDeDialogo::-moz-scrollbar-track {
			background-color: transparent;
		}

		#ChatCuadroDeDialogo::-moz-scrollbar-thumb {
			background-color: #d4d4d4;
			border-radius: 4px;
		}

		#ChatMensaje {
			background-color: dimgray;
			max-width: 60%;
			min-width: 10%;
			padding: 5px;
			border-radius: 5px;
			margin-left: 10px;
			margin-top: 10px;
			margin-bottom: 10px;
		}

		#ChatMensajeTu {
			background-color: aquamarine;
			max-width: 60%;
			min-width: 10%;
			padding: 5px;
			border-radius: 5px;
			margin-left: calc(40% - 20px);
			margin-top: 10px;
			margin-bottom: 10px;
		}

		.ChatMensajeInfo {
			display: flex;
			flex-direction: row;
		    justify-content: space-between;
		}

		#ChatEscribe {
			width: 85vw;
			border-radius: 1vw;
			border: none;
			padding: 7px;
			padding-left: 15px;
			background-color: aquamarine;
			color: black;
			position: fixed;
			left: 5.5vw;
			bottom: 4vh;
		}

		#ChatEscribe::placeholder {
			color: black;
/*			font-family: Arvo;*/
		}

		#ChatDivEnvia {
			width: 25px;
			position: fixed;
			left: 92.5vw;
			bottom: 4vh;


		}

		#ChatDivEnvia img {
			width: 25px;
		}

		#chatCompleto {
			margin-left: 50px;
		}


		/* Eliminar estilos del boton */

		button {
			color: black;
			letter-spacing: normal;
			word-spacing: normal;
			/* line-height: normal; */
			display: inline-block;
			text-align: left;
			align-items: flex-start;
			box-sizing: none;
			background-color: transparent;
			border: none;
			border-width: 0;
			font-size: 25px;
			cursor: pointer;
			position: absolute;
			margin-top: -38px;
       }


    </style>
</head>
<body>
    <?php
		include("php/conexion.php");

        include("barra.php");
    ?>

	
<?php
		
		$grupo = 1;

		$consulta = "SELECT * FROM `chat` WHERE `grupo` = " . $grupo;
		$resultado = mysqli_query($conex, $consulta);

		if ($resultado->num_rows > 0) {

			$chatTotal = '';

			while ($fila = $resultado->fetch_assoc()) {
				$fecha = new DateTime( $fila["fecha"] );
				$usuario = $fila["usuario"];
				$texto = $fila["texto"];

				// Formatear la hora para mostrar solo la hora en formato HH:mm:ss
				$hora_formateada = $fecha->format('H:i');


				if($perfil == $usuario){
					$tipoMensaje = 'ChatMensajeTu';
					$usuario = 'Tú';
				} else {
					$tipoMensaje = 'ChatMensaje';
				}
				
				$chatTotal .= '
				
						<div id="' . $tipoMensaje . '">
							<div class="ChatMensajeInfo">
								<div class="ChatMensajeUsuario">' . $usuario . '</div>
								<div class="ChatMensajeHora">' . $hora_formateada . '</div>
							</div>
							<div class="ChatMensajeTexto">' . $texto . '</div>
						</div>
				
				';
			}

		}
		
		?>


	<!-- <div id="chatCompleto"> -->
		<div id="ChatBarraSuperiorDecoracion"></div>
		<div id="ChatBarraSuperior">
			<div class="ChatBarraSuperiorItem">1</div>
			<div class="ChatBarraSuperiorItem">2</div>
			<div class="ChatBarraSuperiorItem">3</div>
		</div>

		<center id="ChatTitulo">
			Yoga del Parque Berrío
		</center>
		<div id="ChatCuadroDeDialogo">
			<!-- <div id="ChatMensaje">
				<div class="ChatMensajeInfo">
					<div class="ChatMensajeUsuario">Roberto</div>
					<div class="ChatMensajeHora">19:30</div>
				</div>
				<div class="ChatMensajeTexto">Mañana sesion de relajacion a las 8 de la mañana donde siempre, para que inviten a todos sus amigos y familiares</div>
			</div> -->
			<?php
				echo $chatTotal;
			?>
		</div>


	<center>
		<form method="POST" action="chat.php">
			<input id="ChatEscribe" name = "textoEnviado" type="text" placeholder="Envia un mensaje">
			<button id="ChatDivEnvia" name="enviarTexto">
				<img src="IMGS/enviado.png">
			</button>
		</form>
		<?php
		
			if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviarTexto'])) {


				if(strlen($_POST['textoEnviado']) >= 1){
					date_default_timezone_set('America/Bogota');

					$textoEnviado = $_POST['textoEnviado'];
					$fechaEnviar = date('Y-m-d H:i:s');
					$grupoEnviar = 1;

					
					$consulta = "SELECT `fecha`, `usuario`, `texto`, `grupo` FROM `chat` WHERE `texto` = '$textoEnviado' AND `fecha` = '$fechaEnviar';";
					$resultado = mysqli_query($conex, $consulta);

					if(!(mysqli_num_rows($resultado) >= 1)){
						$consulta = "INSERT INTO `chat`(`fecha`, `usuario`, `texto`, `grupo`) VALUES ('$fechaEnviar','$perfil','$textoEnviado','$grupoEnviar')";
						$resultado = mysqli_query($conex, $consulta);
						
						if ($resultado) {
							echo '<script language="javascript">alert("¡Enviaste el mensaje!"); window.location.href = "chat.php"</script>';
						} else {
							echo '<script language="javascript">alert("¡Al parecer a ocurrido un error!");</script>';
						}
					}
				}
			}

		
		?>
	</center>

</body>
	<script type="text/javascript">
		function construirMensaje(){
			var d = new Date();
			HoraActual = `${d.getHours()}:${d.getMinutes()}`;
			// alert(HoraActual);

			CajaMensaje = document.getElementById("ChatCuadroDeDialogo");
			Mensaje = document.getElementById("ChatEscribe").value;

			if(Mensaje != ""){

				CajaMensaje.innerHTML += `
				<div id="ChatMensajeTu">
						<div class="ChatMensajeInfo">
							<div class="ChatMensajeUsuario">Tú</div>
							<div class="ChatMensajeHora">${HoraActual}</div>
						</div>
						<div class="ChatMensajeTexto">${Mensaje}</div>
						</div>`;

				document.getElementById("ChatEscribe").value = "";
			} else {
				alert("No vas a enviar nada");
			}
		}
	</script>
</html>