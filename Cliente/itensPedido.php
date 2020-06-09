<?php 
session_start();
if(!isset($_SESSION['cnpj']))
{
header("location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/loginCliente.html");
exit;
}else{
$id = $_GET['pedido'];
include '../Controls/conexao.php';

	// Exibe todos os usuarios encontrados no BD em ordem alfabetica
	$sql = mysql_query("select * from itempedido where id_pedido = '$id'");

?>

<html>
<head>
    <meta charset="utf-8" />
    <title>NeoTicket Menu do Cliente</title>
    <link rel="stylesheet" href="..\Estilos/Estilo.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.css.map" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.min.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.min.css.map" />
    <link rel="stylesheet" href="..\Estilos/bootstrap-grid.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap-grid.min.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.min.css.map" />
</head>
		<center>
				<form name="form1" method="get">
			
					<br>
					<center>
		<table class="table" style="max-width: 800px">
			<thead class="thead-dark" align="center">
				<tr>
		
				<th colspan="6" > ITENS DO PEDIDO <?php echo $id ?> </th>
				</tr>
				<tr>
				<!-- Adiciona as colunas da tabela -->
				<th scope="col">Nome</th>
				<th scope="col">Quantidade</th>
				
				</tr>
			</thead>
				<tr>
			<tbody>

			<?php
				while($linha = mysql_fetch_assoc($sql)) {
				
			?>
			  <td align="center"><?php echo $linha['nomeProd']; ?></td>
			<td align="center"><?php echo $linha['quantidade']; ?></td>
	       <tr>
			</Tbody>
	</center>		 
		</form>
			<?php  }
			  echo "<br>";
			  echo "<center>";
			  echo "<hr>";
		      echo "<a href=\"acaopedido.php?acao=pronto&pedido=$id\">Finalizar Pedido </a>"; 
			  echo "<hr>";
			   }
			?>
				<?php echo $linha['id_pedido']; ?>
</table>
</body>
</html>