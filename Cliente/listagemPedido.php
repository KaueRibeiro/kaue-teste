 <?php 
session_start();
if(!isset($_SESSION['cnpj']))
{
header("location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/loginCliente.html");
exit;
}else{
$id = $_GET['idEvent'];
		include '../Controls/conexao.php';
		$sql = mysql_query ("select * from pedido order by id_pedido");

		if(isset($_POST['busca']) != '') {
			// Query para caso queira buscar manualmente um usuario
			$sql = mysql_query("select * from pedido where id_pedido like '{$_POST['busca']}%' order by id_pedido asc" );
	    }else 
		 {
			// Exibe todos os usuarios encontrados no BD em ordem alfabetica
			$sql = mysql_query("select * from pedido where status = 'aguardando' and id_evento = $id");
			}
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
<body>
      <nav class="navbar navbar-expand-lg justify-content-center navbar-dark bg-dark">
         <a class="navbar-brand" href="eventoCliente.php">NeoTicket for Business</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"> </span>
         </button>
         <ul class="nav justify-content-center" style>
         <li class="nav-item">
            <a class="nav-link"  href="cardapioEvento.php?idEvent=<?php echo $id ?>&acao=""">Cardapios</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="estoqueEvento.php?idEvent=<?php echo $id ?>&acao=">Meu Estoque</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="listagemPedido.php?idEvent=<?php echo $id ?>">Cozinha</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="relatoriosCliente.php">Relatorios</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="sairCliente.php">Sair</a>
         </li>
      </nav>
					<center>
						<form name="form1" method="POST" action="listagemPedido.php">
						Bem Vindo á Cozinha, aqui você pode ver os pedidos do cnpj: <?php echo $_SESSION['cnpj'];?> <br> <br>
						<br>
					</center>
						 </form>
					 <center>
					  <form class="form-inline my-2 my-lg-0" style="max-width: 300px;">
						
							 <input class="form-control mr-sm-2" name="busca" type="search" placeholder="Numero do Pedido" >
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		 
					 </form>
					 </center>

<center>
		<table class="table" style="max-width: 800px">
			<thead class="thead-dark" align="center">
				<tr>
		
				<th colspan="6" > PEDIDOS PARA ATENDER</th>
				</tr>
				<tr>
				<!-- Adiciona as colunas da tabela -->
				<th scope="col">Pedido</th>
				<th scope="col">dataPedido</th>
				<th scope="col">valor Total</th>
				<th scope="col">CPF</th>
				<th scope="col">Status</th>		
				<th scope="col">ACAO</th>
				</tr>
			</thead>
				<tr>
			<tbody>
			<?php
				while($linha = mysql_fetch_assoc($sql)) {
				
			?>
		
			 <!-- Preenche as linhas e colunas com todos os registros encontrados no banco de dados -->
            <td align="center"><?php echo $linha['id_pedido']; ?></td>
			<td align="center"><?php echo $linha['dataPedido']; ?></td>
			<td align="center"><?php echo $linha['valorTotal']; ?></td>
			<td align="center"><?php echo $linha['cpf']; ?></td>
			<td align="center"><?php echo $linha['status']; ?></td>
			<th align="center"> <a href="acaopedido.php?pedido=<?php echo $linha['id_pedido'] ?>&acao=atender">Atender</th>
	       <tr>
			</Tbody>
</center>		 
			<?php  }
			  echo "<br>";
			  echo "<center>";
			  echo "<hr>";
		      echo "<a href=\"eventoCliente.php\">Fechar Cozinha </a>";?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<a href=\"pedidoPronto.php?idEvent=$id\">Pedidos Prontos </a>";  
			  echo "<hr>";
			}  ?>
				<?php echo $linha['usuario']; ?>
</table>
</body>
</html>