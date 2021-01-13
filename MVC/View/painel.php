<?php
session_start();
//Essa autenticacao e para nao se logar pela URL
include('Autenticar_login.php');
?>

<!DOCTYPE HTML>
<HTML>
	<HEAD>
		<TITLE>Inicio</TITLE>
		<link rel="stylesheet" type="text/css" href="Formatacao/index_principal.css">
	</HEAD>
	<!--Iniciando o corpo-->
	<BODY>
		<!------------Menu----------------->
		<?php include_once('menu.php') ?>
		<!-------------------------------->
	</BODY>
</HTML>