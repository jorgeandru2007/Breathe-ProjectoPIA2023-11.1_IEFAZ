<?php
    session_start();
 
    $perfil = $_SESSION['perfil'];

    if(strlen($perfil) >= 1){
        // echo'Ya estas logueado';
    } else{
        echo'<script language="javascript"> window.location.href = "Login.php";</script>';
    }
?>