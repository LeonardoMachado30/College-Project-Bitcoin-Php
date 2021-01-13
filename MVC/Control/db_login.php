<?php
	session_start();

	//-----------Conectando ao banco de dados------------
	include("db_conectar.php");
	include("crud.php");
	//Recebendo as informacoes digitadas pelo usuario
	$usuario = mysqli_real_escape_string($conexao, trim($_POST['Usuario']));
	$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

	//Verificando se o caixa de texto esta vazia
	if(empty($_POST['nome']) || empty($_POST['senha'])) 
	{
		$_SESSION['Preencha_os_campos'] = true;
		header('Location: ../View/login.php');
		exit();
	}
	else
	{
		//Se nao estiverem vazias o login continuara
		//Consulta no banco de dados para verificar se ja existe usuario cadastrado
		$crud = new crud();
		$row = $crud->selectDb_login($usuario, $senha);
		//se $row receber "1" e porque o login foi realizado com sucesso
		if($row == 1) 
		{
			$crud = new crud();
			$crud->selectMenu($usuario);
 			echo "<script language='javascript' type='text/javascript'>
			        alert('login realizado com sucesso!');
			        window.location.href='painel.php';
			        </script>";
			exit();
		}
		else 
		{
			$_SESSION['nao_autenticado'] = true;
			header('Location: login.php');
			exit();
		}
	}
?>