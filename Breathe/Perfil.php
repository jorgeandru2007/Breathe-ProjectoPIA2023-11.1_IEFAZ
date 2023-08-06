<?php
   include("php/comprobarSesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="icon" href="Icono.png">
    <link rel="stylesheet" href="CSS/Base.css">
    <link rel="stylesheet" href="CSS/Perfil.css">

    <style type="text/css">
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
   <form method="post">
      <div class="Foto">
         <img src="IMGS/iconoP.png">
      </div>
      <div class="E">
         <center>
            <?php
               echo' <h2>' . $perfil . '</h2>
                     <h3>Escribe una increible descripción de sobre ti :)</h3>
               ';
            ?>
         </center>
            <a href="seleccion.html"><span>Ajustes</span></a>
            <a href="Creditos.html"><span>Creditos</span</a>
            <a href="Brochure.html"><span>Acerca De</span></a><br>
            <hr>
            <a href="#" onclick="window.history.back();"><span>Regresar</span></a><br><br>
            <button name="iniciar_sesion"><span>Cerrar Sesión</span></button>
      </div>
   </form>
   <?php
      if (isset($_POST['iniciar_sesion'])) {
         $_SESSION['perfil'] = null;
         echo '<script language="javascript">alert("Salida de sesión exitosa.");  window.location.href = "Login.php";</script>';

      }
   ?>
</body>
</html>