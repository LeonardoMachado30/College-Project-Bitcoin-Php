<?php
session_start();
include('Autenticar_login.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Informações do usuario</title>
	<link rel="stylesheet" type="text/css" href="Formatacao/index.css">
	<meta charset="UTF-8">
</head>
<body>
	<div class="confirmacao" method="POST">
		<p id="aviso2">TEM CERTEZA QUE DESEJA EXCLUIR SUA CONTA?</p>
		<a href="db_exclui.php"><button>Sim</button></a>
		<a href="db_painel_usuario.php"><button>Não</button></a>
		<p id="aviso">AO EXCLUSÃO A SUA CONTA SERA EXCLUIDO OS SEUS DADOS DO NOSSO BANCO DE DADOS</p>
	</div>
</body>
</html>