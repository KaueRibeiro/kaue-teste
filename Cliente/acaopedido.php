 <?php 
session_start();
if(!isset($_SESSION['cnpj']))
{
header("location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/loginCliente.html");
exit;
}else{
	include '../Controls/conexao.php';
$acao = $_GET['acao'];
$id = $_GET['pedido'];
        if($acao == 'atender'){
            $sql =  mysql_query("update pedido set status = 'Em Atendimento' where id_pedido = $id");
            header("location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/itensPedido.php?pedido=$id");

		}

        if( $acao == 'pronto'){
          $sql =  mysql_query("update pedido set status= 'Pronto' where id_pedido = $id");
           header("location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/listagemPedido.php");
		}
          if( $acao == 'entregue'){
          $sql =  mysql_query("update pedido set status= 'Entregue' where id_pedido = $id");
           header("location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/pedidoPronto.php");
		}
}
?>