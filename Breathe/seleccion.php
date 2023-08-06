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
	<link rel="stylesheet" type="text/css" href="CSS/seleccion.css">
	<link rel="stylesheet" type="text/css" href="CSS/Base.css">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Grand+Hotel&family=Lato:wght@100&family=Montserrat:wght@300&display=swap');


		.slide li {
			/* Establecer opacity inicial a 1 para que sea visible */
			opacity: 1;
			/* Establecer la visibilidad inicial en visible */
			visibility: visible;
			/* Agregar transiciones para opacity y visibility */
			transition: opacity 0.3s ease, visibility 0.3s ease;
		}

		.slide li.hidden {
			/* Establecer opacity a 0 para hacerlo transparente */
			opacity: 0;
			/* Establecer la visibilidad en hidden para ocultarlo */
			visibility: hidden;
		}

		

		.hi-slide > ul > li > span {
			width: 100%;
			height: 100%;
			background-position: center center;
			margin-top: 25%;
			/* margin-left: 30px; */
			color: white;

			opacity: 1 !important;
			background-color: transparent;
			position: absolute;
		}
				
		.hi-slide > ul > li > span > b {
			font-size: 80px;
			margin-left:10px;
		}

		.hi-slide > ul > li > span > hgroup {
			height: 200px;
		    /* list-style-type: disc; */
		    position: relative;
			text-align: right;

		    bottom: 0;
		}

		.hi-slide > ul > li > span > hgroup > i {
			display: list-item;
		    text-align: -webkit-match-parent;
			margin-right: 30px;
		}
/* 
		.hi-slide > ul > li > span > hgroup > i::before {
			content: "•";
			position: absolute;
			right: 100%;
			margin-right: 5px;
		} */

		.hi-slide > ul > li#li1 > span {
			width: 100%;
			height: 100%;
			background-position: center center;

			opacity: 1 !important;
			background-color: transparent;
			position: absolute;
		}

		.hi-slide > ul > li::before {
		    content: "";
		    position: absolute;
		    top: 0;
		    left: 0;
		    width: 100%;
		    height: 100%;
		    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 20%, rgba(0, 0, 0, 0.8) 60%);
		    pointer-events: none;
		}

		i > a{
			color: white;
			text-decoration: none;
			transition: 0.1s;
		}


		i > a:hover{
			text-decoration: underline;
		}

	</style>
</head>
<body>
    <?php
        include("barra.php");
		include("php/conexion.php");

		$categoria = 'CentroComercial';

		$consulta = "SELECT * FROM `categorias` WHERE `categoria` = 'CentroComercial'";
		$resultado = mysqli_query($conex, $consulta);

		if ($resultado->num_rows > 0) {
			$i = 0;
			$CentroComercial = "";

			while ($fila = $resultado->fetch_assoc() and $i < 11) {
				$i = $i + 1;

				$codigo = $fila["codigo"];
				$lugar = $fila["lugar"];
				
				$CentroComercial .= "<i><a href=\"mapa.php?lugar='" . $codigo . "'\"> " . $lugar . "  •</a></i>";
			}
		}


		$consulta = "SELECT * FROM `categorias` WHERE `categoria` = 'Spa'";
		$resultado = mysqli_query($conex, $consulta);

		if ($resultado->num_rows > 0) {
			$i = 0;
			$Spa = "";

			while ($fila = $resultado->fetch_assoc() and $i < 11) {
				$i = $i + 1;

				$codigo = $fila["codigo"];
				$lugar = $fila["lugar"];
				
				$Spa .= "<i><a href=\"mapa.php?lugar='" . $codigo . "'\"> " . $lugar . "  •</a></i>";
			}
		}

			
			$consulta = "SELECT * FROM `categorias` WHERE `categoria` = 'Piscina'";
			$resultado = mysqli_query($conex, $consulta);
	
			if ($resultado->num_rows > 0) {
				$i = 0;
				$Piscina = "";
	
				while ($fila = $resultado->fetch_assoc() and $i < 11) {
					$i = $i + 1;
	
					$codigo = $fila["codigo"];
					$lugar = $fila["lugar"];
					
					$Piscina .= "<i><a href=\"mapa.php?lugar='" . $codigo . "'\"> " . $lugar . "  •</a></i>";
				}
			}

			
			$consulta = "SELECT * FROM `categorias` WHERE `categoria` = 'Parque'";
			$resultado = mysqli_query($conex, $consulta);
	
			if ($resultado->num_rows > 0) {
				$i = 0;
				$Parque = "";
	
				while ($fila = $resultado->fetch_assoc() and $i < 11) {
					$i = $i + 1;
	
					$codigo = $fila["codigo"];
					$lugar = $fila["lugar"];
					
					$Parque .= "<i><a href=\"mapa.php?lugar='" . $codigo . "'\"> " . $lugar . "  •</a></i>";
				}
			}
			

			$consulta = "SELECT * FROM `categorias` WHERE `categoria` = 'Ejercicio'";
			$resultado = mysqli_query($conex, $consulta);
	
			if ($resultado->num_rows > 0) {
				$i = 0;
				$Ejercicio = "";
	
				while ($fila = $resultado->fetch_assoc() and $i < 11) {
					$i = $i + 1;
	
					$codigo = $fila["codigo"];
					$lugar = $fila["lugar"];
					
					$Ejercicio .= "<i><a href=\"mapa.php?lugar='" . $codigo . "'\"> " . $lugar . "  •</a></i>";
				}
			}
	?>
	<div id="menuLat">
		<div id="list"></div>
		<div class="slide hi-slide">
			<div class="hi-prev"></div>
			<div class="hi-next"></div>
			<ul>
				<li id="li1"><span>
					<hgroup>
						<?php
							echo $CentroComercial;
						?>
					</hgroup><br><b>Templos</b></span><img src="IMGS/Seleccion/slider/1.png" alt="" id="S1" onclick="sl1();">
				</li>

				<li id="li2"><span>
					<hgroup>
						<?php
							echo $Spa;
						?>
					</hgroup><br><b>Spa</b></span><img src="IMGS/Seleccion/slider/2.png" alt="" id="S2" onclick="sl2();">
				</li>

				<li id="li3"><span><hgroup>
						<?php
							echo $Piscina;
						?>
					</hgroup><br><b>Piscinas</b></span><img src="IMGS/Seleccion/slider/3.png" alt="" id="S3" onclick="sl3();">
				</li>
				
				<li id="li4"><span><hgroup>
						<?php
							echo $Parque;
						?>
					</hgroup><br><b>Parques</b></span><img src="IMGS/Seleccion/slider/4.png" alt="" id="S4" onclick="sl4();">
				</li>
				
				<li id="li5"><span>
					<hgroup>
						<?php
							echo $Ejercicio;
						?>
					</hgroup><br><b>Ejercitarse</b></span><img src="IMGS/Seleccion/slider/5.png" alt="" id="S5" onclick="sl5();">
				</li>
			</ul>
		</div>
	</div>
	<!-- <div id="txt">Hola mundo</div> -->
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<!-- <script src="JS/hislide/jquery.hislide.js"></script> -->

<script type="text/javascript">
	(function($) {
	    // Esta función solo es responsable de la función de una imagen de carrusel cada vez que se llama
	    // Es decir, solo se generará un carrusel, y el alcance de esta función solo se puede asignar a un carrusel
	    // Se requiere pasar la etiqueta raíz del carrusel actual al llamar a esta función
	    // El parámetro formal ele aquí es la etiqueta raíz de un carrusel
	    var slide = function(ele,options) {
	        var $ele = $(ele);
	        // opciones de configuración predeterminadas
	        var setting = {
	        		// Controlar el tiempo de animación del carrusel
	            speed: 500,
	            // Controlar el tiempo de intervalo (velocidad de rotación)
	            interval: 4000,
	        };
	        // fusión de objetos con las opciones
	        $.extend(true, setting, options);
	        // Especifica la posición y el estado de cada imagen.
	        var states = [
	            // { $zIndex: 1, width: 120, height: 150, top: 69, left: 134, $opacity: 0.2 },
	            { $zIndex: 1, width: 160, height: 90, top: 59, left: 100, $opacity: 0 },
	            { $zIndex: 2, width: 960, height: 540, top: 35, left: 100, $opacity: 0.7 },
	            { $zIndex: 3, width: 1160, height: 630, top: 0, left: 100, $opacity: 1 },
	            { $zIndex: 1, width: 960, height: 540, top: 35, left: 1435, $opacity: 0.7 },
	            { $zIndex: 0, width: 160, height: 90, top: 59, left: 620, $opacity: 0 },
	            // { $zIndex: 1, width: 120, height: 150, top: 69, left: 500, $opacity: 0.2 }
	        ];

	        var $lis = $ele.find('li');
	        var timer = null;

	        // eventos
	        $ele.find('.hi-next').on('click', function() {
	            next();
	        });
	        $ele.find('.hi-prev').on('click', function() {
	            states.push(states.shift());
	            move();
	        });
	        $ele.on('mouseenter', function() {
	            clearInterval(timer);
	            timer = null;
	        }).on('mouseleave', function() {
	            autoPlay();
	        });

	        move();
	        autoPlay();

	        // Que cada li corresponda a cada estado de los estados anteriores
	        // Deja que li se expanda desde el medio

	        function move() {
	            $lis.each(function(index, element) {
	                var state = states[index];
	                $(element).css('zIndex', state.$zIndex)
					.finish()
					.animate(state, setting.speed)
					.find('img')
					.css('opacity', state.$opacity);
	            });
	        }

	        // cambiar al siguiente
	        function next() {
	            // Principio: Mover el último elemento de la matriz al primero
	            states.unshift(states.pop());
	            move();
	        }

	        function autoPlay() {
	            timer = setInterval(next, setting.interval);
	        }
	    }
	    // Encuentre la etiqueta raíz del carrusel que se rotará y llame a slide()
	    $.fn.hiSlide = function(options) {
	        $(this).each(function(index, ele) {
	            slide(ele,options);
	        });
	        // valor devuelto para admitir llamadas encadenadas
	        return this;
	    }


	    // mi otro codigo
		// Para ocultar el slide
		$("#li1, #li2, #li3, #li4, #li5").addClass("hidden");

		// Para mostrar el slide
		$("#li1, #li2, #li3, #li4, #li5").removeClass("hidden");




	})(jQuery);



	function sl1() {
		// Mostrar el contenido del slide 1 y ocultar el resto
		$("#li1").removeClass("hidden");
		$("#li2, #li3, #li4, #li5").addClass("hidden");
		txt.innerHTML = "info DB 1";
	}



	$('.slide').hiSlide();


	// clickear

	txt = document.getElementById("txt");

	function sl1(){
		txt.innerHTML = "info DB 1";
	}
	
	function sl2(){
		txt.innerHTML = "info DB 2";
	}
	
	function sl3(){
		txt.innerHTML = "info DB 3";
	}

	function sl4(){
		txt.innerHTML = "info DB 4";
	}
	
	function sl5(){
		txt.innerHTML = "info DB 5";
	}


</script>