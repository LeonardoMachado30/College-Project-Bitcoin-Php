<?php
	//Inforamcoes do banco de dados
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "julia_login";

	//Conectar ao servidor
	$conexao = mysqli_connect($servername,$username,$password); 
	//Conectar ao banco de dados
	mysqli_select_db($conexao ,$db_name) or die( "Não foi possível conectar ao banco ySQL");
	//validando conexao
	if (!$conexao) {
		echo "Não foi possível conectar ao banco MySQL.";
		echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
		exit;
	}
	else 
	{
		echo "Parabéns!! A conexão ao banco de dados ocorreu normalmente!.";
	}

	