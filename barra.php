<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Asap&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- FONT -->
<link href="https://fonts.googleapis.com/css2?family=Lora&family=Noto+Serif:wght@300&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

<nav class="Barra">
    <ul>
        <li><a href="#" class="Logo"  id="Br">
            <img src="IMGS/YoYChaqueta.png" alt="" id="img">
            <!-- <span class="nav-item" id="nameApp">Breathe</span> -->
        </a></li>
        <li id="nombreUser">
                <span class="nav-item">
                        <?php
                                echo $perfil;
                        ?>
                </span>
        </li>
        <li><a href="seleccion.php" id="Br">
                <i class="fas fa-home" id="icon"></i>
                <span class="nav-item">Seleccion</span>
        </a></li>
        <li><a href="mapa.php" id="Br">
                <i class="fas fa-map" id="icon"></i>
                <span class="nav-item">Mapa</span>
        </a></li>
        <li><a href="chat.php" id="Br">
                <i class="fas fa-comments" id="icon"></i>
                <span class="nav-item">Chat</span>
        </a></li>
        <li><a href="estadistica.php" id="Br">
                <i class="fas fa-chart-bar" id="icon"></i>
                <span class="nav-item">Estadisticas</span>
        </a></li>
        <li><a href="Brochure.html" id="Br">
                <i class="fas fa-book" id="icon"></i>
                <span class="nav-item">Acerca De</span>
        </a></li>
        <!-- <li><a href="#" id="Br" onclick="GenerarPerfil();">
                <i class="fas fa-user" id="icon"></i>
                <span class="nav-item">Perfil</span>
        </a></li> -->
        <li><a href="?cerrar_sesion=true" class="Logout" id="Br">
                <i class="fas fa-sign-out-alt" id="icon"></i>
                <span class="nav-item">Cerrar Sesion</span>
                <!-- <button name="cerrar_sesion"><span>Cerrar Sesión</span></button> -->
        </a></li>
    </ul>
</nav>

<menu id="VerPerfil">
        <body>
        <form method="post">
        <center>
                <div class="Foto">
                        <img src="IMGS/YoYChaqueta.png">
                </div>
        </center>
        <div class="E">
                <center>
                <?php
                echo' <h2>' . $perfil . '</h2>
                        <h3>Escribe una increible descripción de sobre ti :)</h3>
                ';
                ?>
                </center>
                <a href="#"><span>Ajustes</span></a>
                <!-- <a href="Creditos.html"><span>Creditos</span</a> -->
                <!-- <a href="Brochure.html"><span>Acerca De</span></a><br> -->
                <hr>
                <!-- <a href="#" onclick="window.history.back();"><span>Regresar</span></a><br><br> -->
                <button name="cerrar_sesion"><span>Cerrar Sesión</span></button>
        </div>
        </form>
        <?php
        if (isset($_GET['cerrar_sesion']) == true) {
                $_SESSION['perfil'] = null;
                echo '<script language="javascript">alert("Salida de sesión exitosa.");  window.location.href = "Login.php";</script>';

        }
        ?>
        </body>
</menu>

<script>
        perfilAbierto = false;

        function GenerarPerfil(){
                const windowPerfil = document.getElementById("VerPerfil");
                if(!perfilAbierto){
                        windowPerfil.style.display = "block";
                        perfilAbierto = true;
                }else {
                        windowPerfil.style.display = "none";
                        perfilAbierto = false;
                }
        }
</script>