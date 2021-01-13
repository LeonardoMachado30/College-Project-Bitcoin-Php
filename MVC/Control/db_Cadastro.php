<?php
	session_start();
	// LEMBRETE: Colocar as validacoes de quantidade de caracteres nos inputs, para que o usuario nao digite menos que 5 caracteres, essa validacao sera para todos os campos
	// na senha tera validacoes especiais

	//-----------Conectando ao banco de dados------------
	include 'db_conectar.php';
	include 'crud.php';

	//Recebendo as informacoes digitadas pelo usuario
	$usuario = mysqli_real_escape_string($conexao, trim($_POST['Usuario']));
	$senha = mysqli_real_escape_string($conexao, trim($_POST['Pass']));
	$email = mysqli_real_escape_string($conexao, trim($_POST['Email']));
	$ConfirmPass = mysqli_real_escape_string($conexao, trim($_POST['ConfirmPass']));

	//Verificando se os inputs estão vazios
	if(empty($_POST['Usuario']) || empty($_POST['Pass']) || empty($_POST['Email']))
	{
		$_SESSION['Preencha_os_campos'] = true;
		header('Location: ../View/Cadastro.php');
		exit();
	} 
	else 
	{
		//Validando input de senha vazio
		if($ConfirmPass == $senha)
		{
			//------------Validando as informacoes do banco de dados----------
			// Se $row retornar "1" e porque existe o cadastro
			//-----------CONSULTA NO BANCO DE DADOS-------------------
			//Ira validar para ver se o email ou usuario nao estao cadastrados
			$crud = new crud();
			$row = $crud->selectDb_Cadastro($usuario, $email);

			if($row == 1)
			{
				//Se for 1, entao e porque existe um cadastro no banco
				$_SESSION['ja_cadastrado'] = true;
				header('Location: ../View/Cadastro.php');
				mysql_close($conexao);
				exit();
			} 
			else 
			{
				//--------------INSERINDO USUARIO NO BANCO DE DADOS--------------
				// se for 0 e porque nao tem cadastro e pode ser cadastrado
				$insert = $crud->insert($usuario, $email, $senha);
				//Validando a conexao e a insercao
				if($insert) 
				{
					//Se $insert for "1" e porque foi cadastrado com sucesso
					//Direciona para a pagina login caso seja verdadeiro
					$_SESSION['cadastrado_com_sucesso'] = true;
					header('Location: ../View/Cadastro.php');
					mysql_close($conexao);
			        exit();
				}
				else 
				{
					//Informa que o cadastro nao e possivel
					echo "<script language='javascript' type='text/javascript'>
			        alert('Nao foi possivel realizar o cadastro');
					window.location.href='../View/Cadastro.php';</script>";
					mysql_close($conexao);
		        	exit();
				}
			}
		}
		else
		{
			$_SESSION['ConfirmPass'] = true;
			header('Location: ../View/Cadastro.php');
			mysql_close($conexao);
			exit();
		}
	}