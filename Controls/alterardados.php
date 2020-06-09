<?php 
$alterar= $_GET['alt'];


	if($alterar == 'dados'){
	include 'conexao.php';
		$nome= $_POST['txt_nome'];
		$ultimo = $_POST['txt_ultimo'];
		$email = $_POST['txt_email'];
			session_start();
			$cpf= $_SESSION['cpf'];

				$sql = mysql_query("update consumidor set nome= '$nome' , ultimoNome = '$ultimo' , email = '$email' where cpf = $cpf ");
						echo "cadastro atualizado";
					sleep(3);
	}

		if($alterar == 'senha'){
		include 'conexao.php';
				$senha= $_POST['txt_senha'];
				$rsenha = $_POST['txt_rsenha'];
				session_start();
				$cpf= $_SESSION['cpf'];
			
				if($senha == $rsenha){
					$sql = mysql_query("update consumidor SET senha = md5('$senha') where cpf = '$cpf'");
						echo "senha atualizada";
						sleep(3);
					
				}else{
					echo "senhas nao conferem";
					sleep(3);
					
				}
				}
?>