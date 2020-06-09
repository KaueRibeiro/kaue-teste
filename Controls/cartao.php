<?php 
include 'conexao.php';
$acao=$_GET['acao'];
	
	if($acao == 'alt'){
		

$num = $_POST['txt_num'];
$nome= $_POST['txt_nome'];
$mesvalidade = $_POST['txt_mesvalidade'];
$anovalidade = $_POST['txt_anovalidade'];
session_start();
$cpf= $_SESSION['cpf'];
		$sql= mysql_query("update pagamento set numCartao=$num, nomeCartao='$nome', mesValidade=$mesvalidade,AnoValidade= $anovalidade where cpf= $cpf");
		echo "Cartão alterado";
		sleep(3);
	}

		if($acao == 'del'){
			$num = $_POST['txt_num'];
			
			session_start();
			$cpf= $_SESSION['cpf'];
			$sql= mysql_query("delete from pagamento where cpf = '$cpf' and numCartao = $num");
					echo "cartão deletado";
					sleep(3);
					}
		
?>