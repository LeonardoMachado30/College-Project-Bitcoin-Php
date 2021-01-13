<!DOCTYPE HTML>

<HTML>
	<HEAD>
		<TITLE>Inicio</TITLE>
		<link rel="stylesheet" type="text/css" href="Formatacao/index_principal
		.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

	</HEAD>
<!--Iniciando o corpo-->
	<BODY>
		<img src="Formatacao/Imagens/888108.png" id="Banner"><h3>Bem Vindo</h3>
		<!--Criando um Menu Responsivo-->
		<input type="checkbox" id="bt_menu">
		<label for="bt_menu">&#9776;</label>
		<nav class="menu">
			<ul>
		    	<li><a href="index.php">Home</a></li>
		    	<li><a href="#">contatos</a></li>
		        <li><a href="#">Cursos</a>
		        	<!--<ul class="submenu">
		            	<li><a href="#">Java</a>
		                <li><a href="#">Photoshop</a>
		                <li><a href="#">HTML/CSS</a>
		            </ul>-->
		        </li>
		    </ul>
		    <ul id="menu_login">
				<li><a href="login.php">Entrar</a></li>
		        <li><a href="Cadastro.php">Cadastrar</a></li>
			</ul>
		</nav>

		<div class="Navegacao">
			<ul>
				<li><img src="Formatacao/Imagens/lupa.png" alt="Pesquisar"><input type="text" name="Pesquisa" placeholder="Pesquisar" maxlength="32"></li>
			</ul>
		</div>


		<main>
			<canvas id="myChart" width="50" height="10"></canvas>
			<script>
			var ctx = document.getElementById('myChart').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'line',
			    data: {
			        labels: ['Janeiro', 'Fevereiro', 'Marco', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro'],
			        datasets: [{
			            label: 'Ganhos por mes',
			            data: [12, 19, 3, 5, 2, 3, 5, 3, 8, 30],
			            backgroundColor: [
			                
			                
			            ],
			            borderColor: [
			                'rgba(0,0,139, 1)',
			                'rgba(0,0,139, 1)',
			                'rgba(0,0,139, 1)',
			                'rgba(0,0,139, 1)',
			                'rgba(0,0,139, 1)',
			                'rgba(0,0,139, 1)',
			                'rgba(0,0,139, 1)',
			                'rgba(0,0,139, 1)',
			                'rgba(0,0,139, 1)',
			                'rgba(0,0,139, 1)'
			            ],
			            borderWidth: 3
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
			</script>
		</main>
	</BODY>
</HTML>