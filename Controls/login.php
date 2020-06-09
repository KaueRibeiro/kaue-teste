<?php 
include 'conexao.php';

$login = addslashes($_POST['txt_login']);
$senha = addslashes($_POST['txt_senha']);

$sql = mysql_query ("SELECT * FROM consumidor WHERE email = '$login' and senha = md5('$senha')" );
if(mysql_num_rows($sql) > 0){
$dado = mysql_fetch_assoc($sql);
session_start();
$_SESSION['cpf'] = $dado['cpf'];
header('Location: http://localhost:8080/tcc/NeoTicketWeb/Controls/menu.php');
}
else{
	echo "Usuario ou senha invalidas";
}

?>

