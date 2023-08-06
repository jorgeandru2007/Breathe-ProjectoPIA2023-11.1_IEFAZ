<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Registro</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="Icono.png">
		<link rel="stylesheet" href="CSS/Base.css">
		<link rel="stylesheet" href="CSS/Registro.css">
		<!-- <script src="JS/Registro.js" type="text/javascript"></script> -->
</head>
<body>
	<div id="cargaFondoCuadradoTop"></div>
	<div id="cargaFondoCirculoTop">
		<span id="cargaLetras">
			Breathe
		</span>
	</div>
	<big>
		<div id="login">
			<h2>Registro</h2>
			<center>
				<form name="registroUsuario" id="registroUsuario" method="POST">
					<table>
						<tr>
							<td>
								<input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" id="correo" name="correo" placeholder="Correo" required>
							</td>
						</tr>
						<tr>
						<tr>
							<td>
								<input type="text" id="usuario" name="usuario" placeholder="Usuario" required>
							</td>
						</tr>
							<td>
								<input type="password" id="clave" name="clave" placeholder="Clave" required>
							</td>
						</tr>
							<td>
								<span>
									<a href="Login.php" id="CreacionDeCuenta">¿Ya tienes cuenta?</a>
								</span>
							</td>
						</tr>
						<tr>
							<td>
								<center>
									<button id="BtnLogin" name="registrarse"><span id="BtnLoginSpan">Registrar</span></button><br>
								</center>
							</td>
						</tr>
					</table>
				</form>
                <?php
                    include("php/registrar.php");
                ?>
			</center>
		</div>
	</big>
	</body>
</html>