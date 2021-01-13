<?php
session_start();
include('Autenticar_login.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Informações do usuario</title>
	<link rel="stylesheet" type="text/css" href="Formatacao/painel_usuario.css">
	<meta charset="UTF-8">
</head>
<body>
	<!----------------MENU----------------->
	<?php require_once('menu.php'); ?>
	<!------------------------------------->
	<div class="informacoes" method="POST">
		<h1>Informações do usuario</h1>
		<p>ID:    <?php echo $_SESSION['id']; ?></p>
		<p>Nome:  <?php echo $_SESSION['usuario']; ?></p>
		<p>Email: <?php echo $_SESSION['email']; ?></p>
		<p>Senha: <?php echo $_SESSION['senha']; ?></p>
		<p id="aviso">(Por motivos de segurança a senha e mostrada de forma criptografada)</p>
        <a href="editar.php"><button>Editar</button></a>
		<a href="excluir.php"><button>Excluir</button></a>
		<?php
		//Mensagens de aviso na tela
		//Caso seja validado a atulização de registros
	        if(isset($_SESSION['atualizando'])):
		        ?>
			        <div class="Msg_estrutura" id="corVerde">
			            <p>Informações alteradas com sucesso.</p>	
			        </div>
	 	       <?php
	        endif;
		    unset($_SESSION['atualizando']);
        ?>
        <?php
		//Mensagens de aviso na tela
		//Se o usuario não conseguir ver as informações pessoais
	        if(isset($_SESSION['Erro'])):
		        ?>
			        <div class="Msg_estrutura" id="corVermelho">
			            <p>AVISO: Seus dados não podem ser apresentados no momento, saia e entre novamente para resolver o erro.</p>	
			        </div>
	 	       <?php
	        endif;
		    unset($_SESSION['Erro']);
        ?>
	</div>
</body>
</html>