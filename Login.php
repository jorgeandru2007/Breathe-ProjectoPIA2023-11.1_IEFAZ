<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title id="titulo">Cargando</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="Icono.png">
    <link rel="stylesheet" href="CSS/Base.css">
    <link rel="stylesheet" href="CSS/Login.css">
	<!-- FONT -->
	<link href="https://fonts.googleapis.com/css2?family=Lora&family=Noto+Serif:wght@300&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

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
			<h2>Iniciar Sesión</h2>
			<center>
				<form name="registroUsuario" id="registroUsuario" method="post">
					<table>
						<tr>
							<td>
								<input type="text" id="usuario" name="usuario" placeholder="Usuario" required>
							</td>
						</tr>
						<tr>
							<td>
								<input type="password" id="clave" name="clave" placeholder="Clave" required>
							</td>
						</tr>
							<td>
								<span>
									<a href="Registro.php" id="CreacionDeCuenta">¿No tienes una cuenta?</a>
								</span>
							</td>
						</tr>
						<tr>
							<td>
								<div id="center">
                                    <button id="BtnLogin" name="iniciar_sesion"><span id="BtnLoginSpan">Ingresar</span></button><br><br>
								</div>
							</td>
						</tr>
					</table>
				</form>

                <?php
                //Por tiempo lo inclui aqui la verdad :/
                include("php/conexion.php");

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['iniciar_sesion'])) {
                    if (strlen($_POST['usuario']) >= 1 && strlen($_POST['clave']) >= 1) {
                        $usuario = $_POST['usuario'];
                        $clave = $_POST['clave'];

                        $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
                        $resultado = mysqli_query($conex, $consulta);

                        if (mysqli_num_rows($resultado) >= 1) {
                        	$_SESSION['perfil'] = $usuario;
                            echo '<script language="javascript">alert("Inicio de sesión exitoso."); window.location.href = "seleccion.php";</script>';
                        } else {
                            echo '<script language="javascript">alert("Usuario o clave incorrectos.");</script>';
                        }
                    } else {
                        echo '<script language="javascript">alert("Por favor, complete los campos.");</script>';
                    }
                }
                ?>

			</center>
			<br><br>
		</div>
	</big>



	<script type="text/javascript">

		titulo = document.getElementById("titulo");

		segundos = 0.0;
		enTercios = 0;
		setTimeout(aumentarUnSegundo, 1000);

		function aumentarUnSegundo(){
			segundos += 0.1;

			if(segundos < 2){
				enTercios++;
				if (enTercios == 1) {
					titulo.innerHTML = `Cargando.`;
				}
				else if (enTercios == 2) {
					titulo.innerHTML = `Cargando..`;
				}
				else if (enTercios == 3) {
					titulo.innerHTML = `Cargando...`;
					enTercios = 0;
				}
			} else {
				titulo.innerHTML = `Login`;
			}



			console.log(segundos);
			setTimeout(aumentarUnSegundo, 100);
			// if (true) {} proximaente agregar animacion en el title de -> carga. -> carga.. -> carga... <--

		}




	</script>
</body>
</html>