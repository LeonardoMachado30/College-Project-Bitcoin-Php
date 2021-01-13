<?php
if(!$_SESSION['usuario']) {
	header('Location: ../View/Login.php');
	exit();
}