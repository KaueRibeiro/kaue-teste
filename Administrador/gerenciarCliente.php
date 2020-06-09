<?php 

include '../Controls/conexao.php';

$acao= $_GET['acao'];

         if($acao == 'alt'){
            $cnpj = $_GET['cnpj'];
            $nome = $_POST['nome'];
            $endereco = $_POST['ende'];
            $representante = $_POST['repre'];
            echo "$cnpj,$nome,$endereco,$representante";
              $sql = mysql_query("update cliente set nome=$nome, endereco=$endereco, representante=$representante where cnpj = $cnpj");
                    echo "Dados atualizados com sucesso";
                   }
            
        if($acao == 'del'){
            $cnpj = $_GET['cnpj'];
                $sql = mysql_query("delete from cliente where cnpj = $cnpj");
                header("location: http://localhost:8080/tcc/NeoTicketWeb/Administrador/gerenciarCliente.php?acao=");
            }
         if($acao == 'add'){
            $cnpj = $_GET['cnpj'];
            $nome = $_GET['nome'];
            $endereco = $_GET['end'];
            $representante = $_GET['repre'];
            $email = $_POST['txt_email'];
            $senha = $_POST['txt_senha'];
                $sql = mysql_query("select * from cliente where cnpj = $cnpj");
                    if(mysql_num_rows($sql) > 0){
                         header("location: http://localhost:8080/tcc/NeoTicketWeb/Administrador/gerenciarCliente.php?acao=");

                        }else
                        { $sql = mysql_query("insert into cliente(cnpj,nome,endereco,representante,email,senha) values ('$cnpj','$nome','$endereco','$representante','$email','$senha')");
                          header("location: http://localhost:8080/tcc/NeoTicketWeb/Administrador/gerenciarCliente.php?acao=");
                         }}   

         if($acao == 'addEvent'){
            $cnpj = $_GET['cnpj'];
            
            $imagem = $_POST['txt_imagem'];
            $logo = $_POST['txt_logo'];
                if($cnpj == ''){
                    echo "erro";
				}else{
              $sql = mysql_query("insert into evento(nome,local,data,imagem,empresa,endereco,logoEmpresa,informacoes,horario) values ('','','','$imagem','$cnpj','','$logo','','')");
                            
                            echo "Evento criado com sucesso";
                         }}
            $sql = mysql_query("select * from cliente order by nome");
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
        <form name="form1" method="POST" action="gerenciarCliente.php">
                <nav class="navbar navbar-expand-lg justify-content-center navbar-dark bg-dark">
                <a class="navbar-brand" href="gerenciarCliente.php?acao=">NeoTicket Administration</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"> </span>
                </button>
                <ul class="nav justify-content-center" style>
               
                <li class="nav-item">
                <a class="nav-link" href="sair.php">Sair</a>
                </li>
            </nav>
  </br>
        <style>
        .s1{background-color: white;
        margin: 20px auto auto 280px;
        }
        </style>
        <sectio class="s1">
            <center>
            <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#exampleModal">Novo Cliente</button>
            </center>
                <br><br>
                     <center>
		                    <table class="table" style="max-width: 800px">
			                 <thead class="thead-dark" align="center">
				            <tr>
		
				            <th colspan="6"> Listagem de Clientes </th>
				            </tr>
				            <tr>
				            <!-- Adiciona as colunas da tabela -->
                            <th scope="col">Cnpj</th>
				            <th scope="col">Nome da Empresa</th>
				            <th scope="col">endereco</th>
				            <th scope="col">Represenatante</th>
				           
				            <th scope="col">Remover</th>
                            <th scope="col">Evento</th>
                            </tr>
			                </thead>
				            <tr>
			                     <tbody>
			                            <?php
				                            while($linha = mysql_fetch_assoc($sql)) {
				
			                            ?>
		
			                                        <!-- Preenche as linhas e colunas com todos os registros encontrados no banco de dados -->
                                                   <td align="center"><?php echo $linha['cnpj']; ?></td>
                                                   <td align="center"><?php echo $linha['nome']; ?></td>
			                                        <td align="center"><?php echo $linha['endereco']; ?></td>
			                                        <td align="center"><?php echo $linha['representante']; ?></td>
                                                    <td align="center"><button type="button" class="btn btn-sm btn-danger" data-toggle="modal"  data-target="#staticBackdrop">Remover</button> </td>
                                                    <td align="center"><button type="button" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#exampleModal2">add Evento</button> </td>

                                             <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Adicionar um novo Evento para o <?php echo $linha['cnpj'] ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="form-group">
                                                                    <input type="text" class="form-control" name="txt_cnpj" value="<?php echo $linha['cnpj']; ?> "></input>
                                                                <div class="custom-file">
                                                                      <input type="file" class="custom-file-input" id="customFile" name="txt_imagem">
                                                                      <label class="custom-file-label" for="customFile">Choose file</label>
                                                                    </div>
                                                                    <div class="custom-file">
                                                                          <input type="file" class="custom-file-input" id="customFile" name="txt_logo">
                                                                          <label class="custom-file-label" for="customFile">Choose file</label>
                                                                     </div>
                                                               
                                                         <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button class="btn btn-success active my-2 my-sm-0" type="submit" onclick="document.form1.action='gerenciarCliente.php?acao=addEvent&cnpj=<?php echo $linha['cnpj']; ?>'">Adicionar</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div> 
                                                    </div>
                                                     </div>
                                                                         

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
                                                                       Deseja mesmo remover a Empresa: <?php echo $linha['nome']; ?>?
                                                                        <br> 
                                                                        <br>
                                                                   
                                                                  <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button class="btn btn-danger active my-2 my-sm-0" type="submit" onclick="document.form1.action='gerenciarCliente.php?acao=del&cnpj=<?php echo $linha['cnpj']; ?>'">Remover</button>
                                                                  </div>
                                                                </div>  
                                                              </div>
                                                            </div> 
	                         <td>
	                   </Tbody>
                </center>
             </section>
			        <?php  }
                    ?>

                                  
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Adicionar um novo Cliente</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="form-group">
                                            <input type="text" class="form-control" name="txt_cnpj" placeholder="CNPJ"></input>
                                        </div>
                                            <div class="form-group">
                                            <input type="text" class="form-control" name="txt_nome" placeholder="NOME"></input>
                                        </div>
                                            <div class="form-group">
                                            <input type="text" class="form-control" name="txt_endereco" placeholder="Endereco"></input>
                                        </div>
                                            <div class="form-group">
                                            <input type="text" class="form-control" name="txt_representante" placeholder="Representante"></input>
                                            </div>
                                            <div class="form-group">
                                            <input type="text" class="form-control" name="txt_email" placeholder="EMAIL"></input>
                                            </div>
                                              <div class="form-group">
                                            <input type="text" class="form-control" name="txt_senha" placeholder="SENHA"></input>
                                            </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button class="btn btn-success active my-2 my-sm-0" type="submit" onclick="document.form1.action='gerenciarCliente.php?acao=add'">Adicionar</button>
                                    </div>
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
    