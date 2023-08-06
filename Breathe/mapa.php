<?php
   include("php/comprobarSesion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>mapa</title>
    <link rel="stylesheet" href="CSS/Base.css">

	<!-- Barra -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- link de estilos para el mapa online -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
    <!-- Mapa -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>


	<style type="text/css">
/*
		#menuLat {
			width: 5vw;
			height: 100vh;
			background-color: black;

			position: fixed;
			left: 0;
			top: 0;
		}*/


/*    	Interfaz de Mapa*/
		#MapaBarraDeBusqueda {
			position: fixed;
			top: 20px;
			text-align: center;
			width: 100%;
			z-index: 2;
		}

		#MapaBarraDeBusquedaInput{
			background-color: rgba(232, 243, 238, 1.0);
			width: 60%;
			text-indent: 20px;
			border-radius: 50px;
			padding: 5px;
			color: black;
			z-index: 2;
		}
		#map {
			width: 100vw;
			height: 100vh;
			z-index: 1;
		}

		#todoElMapa {
			padding: 0;
			position: relative;
		}

		/*		Ajustes propios del mapa*/

		.leaflet-touch .leaflet-control-layers, .leaflet-touch .leaflet-bar {
		    position: relative;
		    top: 50px;
		}


	</style>
</head>
<body>
    <?php
        include("barra.php");
    ?>

	<div id="todoElMapa">
		<div id="MapaBarraDeBusqueda">
			<input type="text" name="MapaBarraDeBusquedaInput" id="MapaBarraDeBusquedaInput" placeholder="¿Donde quieres relajarte?">
		</div>
		<div id="map"></div>
	</div>


	<script type="text/javascript">
		

		// En progreso del mapa
		
		function cargarMapa(position){
			const map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 16.25);

			const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
				maxZoom: 19,
				attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
			}).addTo(map);


			// Constructores de iconos


			var marcadorBase = L.icon({
			    iconUrl: 'IMGS/Maps/marcadorRojoBase-2x.png',
			    iconSize: [38, 95],
			    iconAnchor: [22, 94],
			    popupAnchor: [-3, -76],
			    shadowUrl: 'IMGS/Maps/marker-shadow.png',
			    shadowSize: [68, 95],
			    shadowAnchor: [22, 94]
			});

			var marcadorPlayer = L.icon({
			    iconUrl: 'IMGS/Maps/person-orange.png',
			    iconSize: [38, 95],
			    iconAnchor: [22, 94],
			    popupAnchor: [-3, -76],
			    shadowUrl: 'IMGS/Maps/marker-shadow.png',
			    shadowSize: [68, 95],
			    shadowAnchor: [22, 94]
			});

			<?php
				include("php/conexion.php");

				if (isset($_GET['lugar'])) {
					$lugar = $_GET['lugar'];
				
					$consulta = "SELECT * FROM lugares WHERE codigo = ". $lugar;
					$resultado = mysqli_query($conex, $consulta);

					$fila = $resultado->fetch_assoc();
					//Datos de la consulta
					$latitud = $fila["latitud"];
					$longitud = $fila["longitud"];
					$lugar = $fila["lugar"];

					echo"console.log('latitud: " . $latitud . ", longitud: ". $longitud . "');";

					echo" L.marker([" . $latitud . ", " . $longitud . "], {icon: marcadorBase}).addTo(map); ";
				}
			?>

			// L.marker([position.coords.latitude, position.coords.longitude], {icon: myNewIcon}).addTo(map);

			L.marker([position.coords.latitude, position.coords.longitude], {icon: marcadorPlayer}).addTo(map);


			var latlngs = [
			    [position.coords.latitude, position.coords.longitude],
			    [6.2383056326335815, -75.60855496982394]
			];

		}
	
	    //Si el navegador soporta la geolocalizacion
	    if (!!navigator.geolocation) {
	        //Pedimos los datos de geolocalizacion al navegador
	        navigator.geolocation.getCurrentPosition(
	                //Si el navegador entrega los datos de geolocalizacion los imprimimos
	                function (position) {
	                    // window.alert("Accediendo a tu Ubicacion");

	                    console.log(position.coords.latitude + ", " + position.coords.longitude)

	                    // $("#nlat").text(position.coords.latitude);
	                    // $("#nlon").text(position.coords.longitude);
	                    cargarMapa(position);
	                },
	                //Si no los entrega manda un alerta de error
	                function () {
	                    // window.alert("No pudimos acceder a la navegacion");
	                }
	        );
	    }



	    
	</script>
</body>
</html>