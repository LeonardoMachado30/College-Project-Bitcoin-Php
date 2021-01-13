<?php
session_start();

//-----------Conectando ao banco de dados------------
	//Inforamcoes do banco de dados
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "projeto_login";

	//Conectar ao banco de dados
	$conexao = mysqli_connect($servername, $username, $password, $db_name) or die(mysqli_error($conexao));

	//Recebendo as informacoes digitadas pelo usuario
	$usuario = mysqli_real_escape_string($conexao, $_POST['Nome']);
	$senha = mysqli_real_escape_string($conexao, $_POST['Pass']);
	$email = mysqli_real_escape_string($conexao, $_POST['Email']);

	//Verificando se o caixa de texto esta vazia
	if(empty($_POST['Nome']) || empty($_POST['Pass']) || empty($_POST['Email'])) {
		$_SESSION['Preencha_os_campos'] = true;
		/*echo "<script language='javascript' type='text/javascript'>
		        alert('Preencha todos os campos!');
		        window.location.href='Login.php';</script>";*/
		header('Location: Cadasto.php');
		exit();
	}else{
		//Consulta no banco de dados
		$query = "SELECT nome from usuarios where nome = '{$usuario}' and senha = '{$senha}' and email = '{$email}'";

		$result = mysqli_query($conexao, $query);

		$row = mysqli_num_rows($result);

		if($row == 1) {
			echo "<script language='javascript' type='text/javascript'>
			        alert('Usuario ja cadastrado!');
			        window.location.href='painel.php';</script>";
			exit();
		} else {
			//Inserindo usuario no banco de dados
			$query = "INSERT INTO usuarios (nome, email, senha) VALUES('$nome','$email','$senha')";
			$insert = mysqli_query($conexao, $query);
			//Validando a conexao e a insercao
			if($insert) {
				?>
					<!--Mensagem em formato HTML
					<div class="Msg_sucedida">
					Cadastro realizado com sucesso!<a href="Login.php"> Clique aqui para Logar</a>
					</div>
					-->
				<?php
				//-------Script para aparecer uma mensagem-------
				//Direciona para a pagina login caso seja verdadeiro
				echo "<script language='javascript' type='text/javascript'>
		        alert('Cadastro realizado com sucesso!');
		        window.location.href='Login.php';</script>";
		        mysqli_close($conexao);
		        exit();
	        	//sleep(30);//tempo em segundos
			} else {
				//Informa que o cadastro nao e possivel
				echo "<script language='javascript' type='text/javascript'>
		        alert('Nao foi possivel realizar o cadastro');
	        	window.location.href='Cadastro.php';</script>";
	        	exit();
			}
		}
	}
?>