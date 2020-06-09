<?php
include 'conexao.php';

$nome = $_POST ["txt_nome"];
$ultimo = $_POST ["txt_ultimo"];
$cpf = $_POST ["txt_cpf"];
$email = $_POST ["txt_email"];
$senha = $_POST ["txt_senha"];
$data = $_POST ["txt_data"];
$rsenha = $_POST["txt_rsenha"];
$remail = $_POST["txt_remail"];
		
		if(!empty($nome) && !empty($ultimo) && !empty($cpf) && !empty($email) && !empty($senha) && !empty($data)){
			if ($senha == $rsenha){
			 }else{
					echo "<center>";
					echo "<hr>";
					echo "<hr>";
					echo "<br>";
					echo "<a href=\"http://localhost:8080/tcc/NeoTicketWeb/Views/cadastro.html\"> RETORNAR AO CADASTRO </a>";
					echo "<br>";
					exit("senhas não conferem");
			 }

				 if ($email == $remail){
				 }else{
					echo "<center>";
					echo "<hr>";
					echo "<hr>";
					echo "<br>";
					echo "<a href=\"http://localhost:8080/tcc/NeoTicketWeb/Views/cadastro.html\"> RETORNAR AO CADASTRO </a>";
					echo "<br>";
					exit("emails nao conferem");

				 }
	 
$sql = mysql_query ("SELECT * FROM consumidor WHERE cpf = '$cpf' or email = '$email'");
	if(mysql_num_rows($sql) > 0){
		echo "<center>";
		echo "<hr>";
		echo "CPF ou EMAIL JÁ ESTÃO CADASTRADOS";
		echo "<hr>";
		echo "<br>";
		echo "<a href=\"http://localhost:8080/tcc/NeoTicketWeb/Views/login.html\"> RETORNAR AO LOGIN </a>";
	}	
	else {
		$sql = mysql_query ("INSERT INTO consumidor(cpf,nome,ultimoNome,email,senha,dataNasc) VALUES ('$cpf', '$nome', '$ultimo','$email',md5('$senha') , '$data')");
		echo "<center>";
		echo "<hr>";
		echo "CONTA CRIADA COM SUCESSO";
		echo "<hr>";
		echo "<br>";
		echo "<a href = \"http://localhost:8080/tcc/NeoTicketWeb/Views/login.html\">RETORNAR AO LOGIN </a>";
	}
	}
	else{
	echo "preencha todos os campos";
}

?>