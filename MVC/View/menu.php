<?php
session_start();

include("../Control/crud.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="Formatacao/index_principal.css">
	<meta charset="UTF-8">
</head>
<body>
	<!-----------------------BANNER----------->
		<div class="apresentacao">
			<img src="Formatacao/Imagens/888108.png" id="Banner"><h3>Bem Vindo, <a href="db_painel_usuario.php"><?php echo $_SESSION['usuario']; ?></a></h3>
		</div>
		<!-----------------Navegador------------->
		<div class="Navegacao">
			<ul>
				<li><img src="Formatacao/Imagens/lupa.png" alt="Pesquisar"><input type="text" name="Pesquisa" placeholder="Pesquisar" maxlength="32"></li>
			</ul>
		</div>
		<!--------------------MENU--------------->
		<input type="checkbox" id="bt_menu">
		<label for="bt_menu">&#9776;</label>
		<nav class="menu">
			<ul>
		    	<li><a href="painel.php">Home</a></li>
		    	<li><a href="#">contatos</a></li>
		        <li><a href="#">Cursos</a>
		        	<!--<ul class="submenu">
		            	<li><a href="#">Java</a>
		                <li><a href="#">Photoshop</a>
		                <li><a href="#">HTML/CSS</a>
		            </ul>-->
		        </li>
		        <li><a href="logout.php">Sair</a></li>
		    </ul>
		</nav>
</body>
</html>

