<?php

	include("conexion.php");

	// print_r($_REQUEST);

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registrarse'])) {

		if( strlen($_POST['nombre']) >= 1 &&
			strlen($_POST['correo']) >= 1 &&
			strlen($_POST['usuario']) >= 1 &&
			strlen($_POST['clave']) >= 1){

			ini_set('date.timezone','America/Bogota');
			$Hora = date("g:i A");
			$fecha_registro = date('y-m-d');

			$nombre = $_POST['nombre'];
			$correo = $_POST['correo'];
			$usuario = $_POST['usuario'];
			$clave = $_POST['clave'];

			
			$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
			$resultado = mysqli_query($conex, $consulta);

			if (mysqli_num_rows($resultado) >= 1) {
				echo '<script language="javascript">alert("Al parecer el usuario que digitaste ya existe, ¡intenta con otro!");</script>';
			} else{
				$consulta = "
					INSERT INTO usuarios(fecha_registro, nombre, correo, usuario, clave) VALUES ('$fecha_registro','$nombre','$correo','$usuario','$clave')
				";
				$resultado = mysqli_query($conex, $consulta);
				
				if ($resultado) {
					$_SESSION['perfil'] = $usuario;
					echo '<script language="javascript">alert("¡Registro completado con exito!"); window.location.href = "seleccion.php";</script>';
				} else {
					echo '<script language="javascript">alert("¡Al parecer a ocurrido un error!");</script>';
				}
			}


		}
		
    }else {
		// echo '<script language="javascript">alert("¡Por favor complete los campos!");</script>';
    }
    // echo "<script>window.location.href = '../animacion.php';</script>";
	// }
	exit;
?>