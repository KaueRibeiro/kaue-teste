<?php 
session_start();
if(!isset($_SESSION['cnpj']))
{
header("location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/loginCliente.html");
exit;
}else{
include '../Controls/conexao.php';

$id= $_GET['idEvent'];
$acao= $_GET['acao'];

        if($acao == 'alterar'){
            $quantidade = $_POST['txt_quantidade'];
            $preco = $_POST['txt_preco'];
            $idProd = $_GET['idProd'];
            $sql = mysql_query("update eventoproduto set quantidade = $quantidade, preco = $preco where id_evento = $id and id_produto = $idProd");
            header("location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/estoqueEvento.php?idEvent=$id&acao=");
            }
       
          if($acao == 'add'){
          $nome=$_POST['txt_nome'];
          $descricao=$_POST['txt_descricao'];
          $categoria= $_POST['txt_categoria'];
          $preco = $_POST['txt_preco'];
          $quantidade = $_POST['txt_quantidade'];
                $sql = mysql_query("select * from eventoproduto where nome = '$nome' and id_evento= $id");
                    if(mysql_num_rows($sql) > 0){
                    echo "produto ja existe no estoque";
                    }else{
                    $sql = mysql_query("insert into eventoproduto(id_evento,preco,quantidade,nome,descricao,categoria) values ($id,'$preco',$quantidade,'$nome','$descricao','$categoria')");
                    header("location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/estoqueEvento.php?idEvent=$id&acao=");
				    }
          }else{
      
                $sql = mysql_query("select * from eventoproduto where id_evento= $id");
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
    <form name="form1" method="POST" action="estoqueEvento.php">
            <nav class="navbar navbar-expand-lg justify-content-center navbar-dark bg-dark">
         <a class="navbar-brand" href="eventoCliente.php">NeoTicket for Business</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"> </span>
         </button>
         <ul class="nav justify-content-center" style>
       
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
			  </br>
         <style>
        .s1{background-color: white;
        margin: 20px auto auto 280px;
        }
        </style>
        <sectio class="s1">
        <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#exampleModal">Novo Produto</button>
          <br><br>
              <center>
		                <table class="table" style="max-width: 800px">
			             <thead class="thead-dark" align="center">
				        <tr>
		
				        <th colspan="6" > Estoque do evento <?php echo $id ?></th>
				        </tr>
				        <tr>
				        <!-- Adiciona as colunas da tabela -->
				        <th scope="col">Nome do Produto</th>
				        <th scope="col">Descricao</th>
				        <th scope="col">Categoria</th>
				        <th scope="col">Preço</th>
                        <th scope="col">Quantidade</th>
				        <th scope="col">Editar</th>		
                        </tr>
			            </thead>
				        <tr>
			        <tbody>
			        <?php
				        while($linha = mysql_fetch_assoc($sql)) {
				
			        ?>
		
			         <!-- Preenche as linhas e colunas com todos os registros encontrados no banco de dados -->
                    <td align="center"><?php echo $linha['nome']; ?></td>
			        <td align="center"><?php echo $linha['descricao']; ?></td>
			        <td align="center"><?php echo $linha['categoria']; ?></td>
			        <td align="center"><?php echo $linha['preco']; ?></td>
                    <td align="center"><?php echo $linha['quantidade']; ?></td>
			        <td align="center">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                             Editar
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Editar Estoque</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    informe a quantidade em estoque do Produto: <?php echo $linha['descricao']; ?>
                                    <br> 
                                    
                                    <br>
                                     <div class="form-group">
                                    <label for="inputEmail4">Quantidade:</label>    
                                     <div class="form-group">
                                    <input type="text" class="form-control" name="txt_quantidade" value="<?php echo $linha['quantidade']; ?>" placeholder="Quantidade"></input>
                                     </div>
                                      <div class="form-group">
                                    <label for="inputEmail4">Preço:</label>  
                                    <div class="form-group">
                                    <input type="text" class="form-control" name="txt_preco"  value ="<?php echo $linha['preco']; ?>" placeholder="Preço"></input>
                                     </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button class="btn btn-success active my-2 my-sm-0" type="submit" onclick="document.form1.action='estoqueEvento.php?acao=alterar&idProd=<?php echo $linha['id_produto'] ?>&idEvent=<?php echo $id ?>'">Alterar</button>

                                  </div>
                                </div>  
                              </div>
                            </div> 
	               <td>
	    </Tbody>
        </center>
     </section>
			        <?php  }}}
                    ?>

                                  
                                         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Adicionar um novo Produto ao Estoque</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                    <div class="modal-body">
                                                    <div class="form-group">
                                                         <input type="text" class="form-control" name="txt_nome" placeholder="Nome do Produto"></input>
                                                     </div>
                                                          <div class="form-group">
                                                         <input type="text" class="form-control" name="txt_descricao" placeholder="Descricao"></input>
                                                     </div>
                                                          <div class="form-group">
                                                         <input type="text" class="form-control" name="txt_categoria" placeholder="Categoria"></input>
                                                     </div>
                                                          <div class="form-group">
                                                         <input type="text" class="form-control" name="txt_preco" placeholder="Preco"></input>
                                                          </div>
                                                          <div class="form-group">
                                                         <input type="text" class="form-control" name="txt_quantidade" placeholder="Quantidade"></input>
                                                          </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-success active my-2 my-sm-0" type="submit" onclick="document.form1.action='estoqueEvento.php?&idEvent=<?php echo $id ?>&acao=add'">Adicionar</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div> 






                            
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </form> 
</body>
</html>
    