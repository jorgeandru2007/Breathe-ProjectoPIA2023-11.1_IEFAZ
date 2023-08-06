<?php
   include("php/comprobarSesion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>estadisticas</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="CSS/Base.css">

    <!-- Graficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js/dist/Chart.min.js"></script>


	<style type="text/css">

		body {
			background-color: white;
		}

		.inferior {
			position: fixed;
			width: 125vw;
			height: 40vh;
			bottom: -50px;
			transform: rotate(3deg);
			left: -20px;
			background-color: rgb(65, 99, 88);
			z-index: -100;
		}

		/* Estadisticas */

		
		/*Grafico Circular*/
		.chart-container {
			position: relative;
			width: 300px;
			height: 300px;
		}

		#chart {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}

		/*Grafico de Barras*/

		.chart-container {
			position: relative;
			width: 700px;
			height: 350px;
		}

		#bar-chart {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}

		/*Ajustes*/
		#GraficosDeBarras{
			position: fixed;
			right: 5vw;
			top: 5vh;
		}

		#GraficosCirculares{
			position: fixed;
			left: 5vh;
			top: 5vh;
		}
		
		#graficoV {
			position: fixed;
			right: 5vh;
			top: 5vh;
		}

		/* Calendario */

		ul#ulCalendario {
			display: grid;
			grid-template-columns: repeat(7, 1fr);
			list-style: none;
  			padding: 0;
		}

		.first-day {
			grid-column-start: 5;
		}

		#Calendario {
			width: 300px;
			height: 200px;
			position: fixed;
			bottom: 5vh;
			left: 15vw;
			color: white;
		}

		ul#ulCalendario li {
			border: 1px black solid;
		}

		
		#podio {
			position: fixed;
			width: 700px;
			right: 5vh;
			bottom: 5vh;
		}
	</style>
</head>
<body>
    <?php
        include("barra.php");
    ?>

		<div id="GraficosDeBarras">
			<div class="chart-container">
				<canvas id="bar-chart"></canvas>
			</div>
		</div>

		<div id="GraficosCirculares">
			<div class="chart-container">
				<canvas id="chart"></canvas>
			</div>
		</div>
<!-- 
		<div id="Calendario" >
			<h1 align="center" style="background-color: red; border-radius: 5px 5px 0 0;">Enero 2021</h1>
			<ul style="border: 1px black solid;" id="ulCalendario">
				<li class="day-name">Lun</li>
				<li class="day-name">Mar</li>
				<li class="day-name">Mié</li>
				<li class="day-name">Jue</li>
				<li class="day-name">Vie</li>
				<li class="day-name">Sáb</li>
				<li class="day-name">Dom</li>

				<li class="first-day">1</li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
				<li>5</li>
				<li>6</li>
				<li>7</li>
				<li>8</li>
				<li>9</li>
				<li>10</li>
				<li>11</li>
				<li>12</li>
				<li>13</li>
				<li>14</li>
				<li>15</li>
				<li>16</li>
				<li>17</li>
				<li>18</li>
				<li>19</li>
				<li>20</li>
				<li>21</li>
				<li>22</li>
				<li>23</li>
				<li>24</li>
				<li>25</li>
				<li>26</li>
				<li>27</li>
				<li>28</li>
				<li>29</li>
				<li>30</li>
				<li>31</li>
			</ul>
			</div> -->

			<div id="podio">
				<h3>Mas recomendados del mes</h3>
				<ol>
					<li>Parque Osmiro</li>
					<li>Parque Arvi</li>
					<li>Parque San Agustin</li>
				</ol>
			</div>

			<div class="inferior"></div>

	<script type="text/javascript">
		
			var ctx = document.getElementById('chart').getContext('2d');
			var chartData = [98, 2]; // Datos para el gráfico (porcentajes)

			var chart = new Chart(ctx, {
			  type: 'doughnut',
			  data: {
			    labels: ['Usuarios Satisfechos', 'Usuarios no Satisfechos'],
			    datasets: [{
			      data: chartData,
			      backgroundColor: ['#0DD604', '#D60404'], // Colores para cada sección del gráfico
			      borderColor: '#fff', // Color del borde
			      borderWidth: 2 // Ancho del borde
			    }]
			  },
			  options: {
			    responsive: true,
			    maintainAspectRatio: false,
			    cutoutPercentage: 1 // Porcentaje de espacio vacío en el centro del gráfico
			  }
			});

			/*
			var ctx2 = document.getElementById('chart2').getContext('2d');
			var chartData = [84, 16]; // Datos para el gráfico (porcentajes)

			var chart = new Chart(ctx, {
			  type: 'doughnut',
			  data: {
			    labels: ['Usuarios que aliviaron su estres', 'Usuarios que no lograron aliviar su estres'],
			    datasets: [{
			      data: chartData,
			      backgroundColor: ['#0DD604', '#D60404'], // Colores para cada sección del gráfico
			      borderColor: '#fff', // Color del borde
			      borderWidth: 2 // Ancho del borde
			    }]
			  },
			  options: {
			    responsive: true,
			    maintainAspectRatio: false,
			    cutoutPercentage: 1 // Porcentaje de espacio vacío en el centro del gráfico
			  }
			});
*/

			var ctx = document.getElementById('bar-chart').getContext('2d');
			var chartData = {
			  labels: ['Parque San Agustin', 'Parque Osmiro', 'Psicina Alcazarez', 'Plaza Mayor', 'Parque Arvi', 'Parque La Chinca', 'Psicina de la Estrella', ''],
			  datasets: [{
			    label: 'Mejores calificados de la semana',
			    data: [5, 4.9, 4.9, 4.7, 4.6, 4.5, 4.3, 0], // Valores de ejemplo para las barras
			    backgroundColor: '#2D57A5', // Color de fondo de las barras
			    borderColor: '#0E2D64', // Color del borde de las barras
			    borderWidth: 1 // Ancho del borde de las barras
			  }]
			};

			var barChart = new Chart(ctx, {
			  type: 'bar',
			  data: chartData,
			  options: {
			    scales: {
			      y: {
			        beginAtZero: true // Iniciar el eje y desde cero
			      }
			    }
			  }
			});

			var data = {
            labels: ['Etiqueta 1', 'Etiqueta 2', 'Etiqueta 3'],
            datasets: [{
                label: 'Datos de ejemplo',
                data: [10, 20, 30],
                backgroundColor: 'rgba(0, 123, 255, 0.5)'
            }]
        };

			// Configuración del gráfico
			var options = {
				indexAxis: 'y', // Orientación vertical
				scales: {
					x: {
						beginAtZero: true
					},
					y: {
						beginAtZero: true
					}
				}
			};

			// Crear el gráfico de barras vertical
			var ctx = document.getElementById('grafico').getContext('2d');
			var chart = new Chart(ctx, {
				type: 'bar',
				data: data,
				options: options
			});
	    
	</script>
</body>
</html>