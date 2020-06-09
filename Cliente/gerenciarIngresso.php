
<?php 
session_start();
if(!isset($_SESSION['cnpj']))
{
header("location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/loginCliente.html");
exit;
}else{

$acao = $_GET['acao'];

include '../Controls/conexao.php';

		if($acao == 'alterar'){
        $id = $_GET['idIng'];
        $setor = $_POST['txt_setor'];
        $lote = $_POST['txt_lote'];
        $valor = $_POST['txt_valor'];
        $quantidade = $_POST['txt_quantidade'];
		 $sql = mysql_query("update eventoingresso set setor='$setor', lote='$lote', valor='$valor', qntd='$quantidade' where id_ingresso =$id");	
         header("location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/eventoCliente.php");
		}
        if($acao == 'add'){
        $id = $_GET['id_event'];
        $setor = $_POST['txt_setor'];
        $lote = $_POST['txt_lote'];
        $valor = $_POST['txt_valor'];
        $quantidade = $_POST['txt_quantidade'];
		 $sql = mysql_query("insert into eventoingresso(id_evento,setor,lote,valor,qntd)values($id,'$setor','$lote','$valor','$quantidade')");
         header("location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/eventoCliente.php");
		}
		if($acao == 'del'){
        $id = $_GET['idIng'];
		 $sql = mysql_query("delete from eventoingresso where id_ingresso= $id");
         header("location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/eventoCliente.php");
         }
	
        }?>







		