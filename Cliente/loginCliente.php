<?php 
include '../Controls/conexao.php';

$login = addslashes($_POST['txt_login']);
$senha = addslashes($_POST['txt_senha']);


$sql = mysql_query ("SELECT * FROM cliente WHERE email = '$login' and senha = '$senha'" );
	if(mysql_num_rows($sql) > 0){
		$dado = mysql_fetch_assoc($sql);
		session_start();
		$_SESSION['cnpj'] = $dado['cnpj'];
		header('Location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/eventoCliente.php');
	}
	else{
	echo "Usuario ou senha invalidas";
	}

?>

