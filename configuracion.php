<?php
   include("php/comprobarSesion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>seleccion</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="CSS/configuracion.css">
	<link rel="stylesheet" type="text/css" href="CSS/Base.css">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Grand+Hotel&family=Lato:wght@100&family=Montserrat:wght@300&display=swap');
	</style>
</head>
<body>
    <?php
        include("barra.php")
    ?>
		<div id="login">
			<h2>Configuracion</h2>
				<form name="registroUsuario" id="registroUsuario" method="POST">
                    <img id="perfil" src="IMGS/perfiles/basicToken.png" width="600">
					<table>
						<tr>
							<td>
								<input type="text" id="nombre" name="nombre" placeholder="Nombre">
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" id="correo" name="correo" placeholder="Correo">
							</td>
						</tr>
						<tr>
						<tr>
							<td>
								<input type="text" id="usuario" name="usuario" placeholder="Usuario">
							</td>
						</tr>
							<td>
								<input type="password" id="clave" name="clave" placeholder="Clave">
							</td>
						<tr>
							<td>
								<div id="center">
                                    <button id="BtnActualizar" name="iniciar_sesion"><span id="BtnActualizarSpan">Actualizar</span></button><br><br>
								</div>
							</td>
						</tr>
					</table>
				</form>
		</div>
	</body>    
</body>
</html>