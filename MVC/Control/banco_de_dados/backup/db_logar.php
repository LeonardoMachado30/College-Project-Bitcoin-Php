<?php
session_start();

//Inforamcoes do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "projeto_login";
//Conectar ao banco de dados
$conexao = mysqli_connect($servername, $username, $password, $db_name) or die(mysqli_error($conexao));


//Recebendo as informacoes digitadas pelo usuario
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);


//Verificando se o caixa de texto esta vazia
if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	echo "<script language='javascript' type='text/javascript'>
	        alert('Preencha todos os campos!');
	        window.location.href='Login.php';</script>";
	        header('Location: Login.php');
	exit();
}

//Consulta no banco de dados
$query = "SELECT email from usuarios where email = '{$usuario}' and senha = '{$senha}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	echo "<script language='javascript' type='text/javascript'>
	        alert('Cadastro realizado com sucesso!');
	        window.location.href='Login.php';</script>";
	header('Location: PaginaInicial.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	echo "<script language='javascript' type='text/javascript'>
	        alert('Nao autenticado!');
	        window.location.href='Login.php';</script>";
	header('Location: Login.php');
	exit();
}
?>