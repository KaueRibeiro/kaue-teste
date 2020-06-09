<?php
include 'conexao.php';

$cnpj = $_POST ["txt_cnpj"];
$nome = $_POST ["txt_nome"];
$end = $_POST ["txt_endereco"];
$representante = $_POST ["txt_representante"];
$cpf = $_POST ["txt_cpf"];
$email = $_POST ["txt_mail"];

$sql = mysql_query ("SELECT * FROM cliente WHERE cnpj = '$cnpj'");
	if(mysql_num_rows($sql) > 0){
		echo "<center>";
		echo "<hr>";
		echo "Usuário Existente";
		echo "<hr>";
		echo "<br>";
		echo "<a href=\"login.html\"> Cliente cadastrado </a>";
	} else {
		$sql = mysql_query ("INSERT INTO cliente(cnpj,nome,endereco,representante,cpf,email) VALUES ('$cnpj', '$nome', '$end','$representante','$cpf','$email')");
		echo "<center>";
		echo "<hr>";
		echo "Conta do Cliente CRIADA COM SUCESSO";
		echo "<hr>";
		echo "<br>";
		echo "<a href = \"login.html\">RETORNAR AO LOGIN </a>";
	}
?>