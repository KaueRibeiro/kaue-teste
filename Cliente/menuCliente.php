<?php 
   session_start();
   if(!isset($_SESSION['cnpj']))
   {
   header("location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/loginCliente.html");
   exit;
   }else{
   $id = $_GET['idEvent'];
   include '../Controls/conexao.php';
   $sql = mysql_query ("select * from evento where idEvento = $id");
   ?>
<!DOCTYPE html>
<html lang="pt-br" >
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
      <?php 
         if(mysql_num_rows($sql) > 0){
         $dado = mysql_fetch_assoc($sql);
         $imagem = $dado['imagem'];
         $nome = $dado['nome'];
         $local = $dado['local'];
         $data = $dado['data'];
         $empresa = $dado['empresa'];
         $endereco = $dado['endereco'];
         $logoEmpresa = $dado['logoEmpresa'];
         $info = $dado['informacoes'];
         $horario = $dado['horario'];
         }else{
             echo "esse evento nao esta mais disponivel";
         }
         ?>
      <!DOCTYPE html>
      <html lang="pt-br" >
         <meta charset="utf-8">
         <head>
            <form method="POST" name="form1" action="" >
               <title></title>
               <style type="text/css">
                  .s1{background-color: #F5F5F5;}
                  .s2{background-color: white;}
                   .s4{background-color:#87CEEB;
                   height: auto;
                   margin: auto auto auto 1px;
                   }
                  .ghost{background-color:#87CEEB;
                   height: 50px;
                   margin: 0px 0px auto auto;
                   bottom:0px;
                   }
                  .s3{background: url('../Imagens/Banner/<?php echo $imagem ?>') no-repeat;
                  height:250px;
                  width:100%;
                  background-size: cover;
                  background-position: 0 55%;
                  position: relative:;
                  }
                  .footer{ position:relative;
                  background-color: black;
                  text-color: white;
                  }
               </style>
               <section class="s3">
                  <center>
                     <div class="banner"> 
                        <br>
                        <br>
                     </div>
                  </center>
               </section>
               <section class="s1">
                  <center>
                     <div class="media"  style="width: 50rem;">
                        <img src="../Imagens/Logo/<?php echo $logoEmpresa ?>" class="mr-3" alt="..."  style="max-width: 650px;">
                        <div class="media-body">
                           <br>
                           <h5 class="mt-0"><?php echo $nome ?></h5>
                           <p class="card-text"><?php echo $data ?> as <?php echo $horario ?></p>
                           <class="card-text"><?php echo $local ?></p>
                           <small class="card-text"><?php echo $endereco ?></p>
                        </div>
                     </div>
                  </center>
                   <section class="s4">
                           
       <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#adicionaringressos" style="margin: auto auto auto 350px">Novo Ingresso</button>
                          
                                <div class="modal fade" id="adicionaringressos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                         <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Adicionar Ingresso</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                         </div>
                                         <div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="txt_setor" placeholder="Setor"></input>
                                            </div>
                                             <div class="form-group">
                                                <input type="text" class="form-control" name="txt_lote" placeholder="Lote"></input>
                                            </div>
                                             <div class="form-group">
                                                <input type="text" class="form-control" name="txt_valor" placeholder="Valor"></input>
                                            </div> <div class="form-group">
                                                <input type="text" class="form-control" name="txt_quantidade" placeholder="Quantidade"></input>
                                            </div>
                                         </div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <button class="btn btn-success active my-2 my-sm-0" type="submit" onclick="document.form1.action='gerenciarIngresso.php?acao=add&id_event=<?php echo $id ?>'">Adiconar Ingresso</button>
                                         </div>
                                      </div>
                                   </div>
                                  </div>

                  <center>
                 
                     <table class="table" style="max-width: 800px" >
                  </center>
                  <thead class="thead-dark" align="center" >
                      <tr>
                          <th scope="col">Setor</th>
                          <th scope="col">Lote</th>
                          <th scope="col">Valor</th>
                          <th scope="col">Quantidade</th>
                          <th scope="col">Alterar</th>
                          <th scope="col">Remover</th>
                      </tr>
                  </thead>
                  <?php 
                     $sql2 = mysql_query("select * from eventoingresso where id_evento = $id");
                     while($linha = mysql_fetch_assoc($sql2)) { ?>
                        <tbody> 
                            <td align="center"><?php echo $linha['setor']; ?></td>
                            <td align="center"><?php echo $linha['lote']; ?></td>
                            <td align="center">R$ <?php echo $linha['valor']; ?></td>
                            <td align="center"> <?php echo $linha['qntd']; ?></td>
                            <td align="center"><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal" onclick="">Alterar</button></td>
                            <td align="center"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal2" onclick="">Remover</button> </td>
                    
                                 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                         <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Alterar Ingresso</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                         </div>
                                         <div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="txt_setor" value="<?php echo $linha['setor'] ?>"></input>
                                            </div>
                                             <div class="form-group">
                                                <input type="text" class="form-control" name="txt_lote" value="<?php echo $linha['lote'] ?>"></input>
                                            </div>
                                             <div class="form-group">
                                                <input type="text" class="form-control" name="txt_valor" value="<?php echo $linha['valor'] ?>"></input>
                                            </div> <div class="form-group">
                                                <input type="text" class="form-control" name="txt_quantidade" value="<?php echo $linha['qntd'] ?>"></input>
                                            </div>
                                         </div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <button class="btn btn-primary active my-2 my-sm-0" type="submit" onclick="document.form1.action='gerenciarIngresso.php?acao=alterar&idIng=<?php echo $linha['id_ingresso'] ?>'">Alterar</button>
                                         </div>
                                      </div>
                                   </div>
                                  </div>

  
                                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                         <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Remover Ingresso</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                         </div>
                                          <div class="modal-body">
                                                    Deseja realmente Excluir os ingressos do <?php echo $linha['setor']; ?>??
                                            </div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <button class="btn btn-danger active my-2 my-sm-0" type="submit" onclick="document.form1.action='gerenciarIngresso.php?acao=del&idIng=<?php echo $linha['id_ingresso'] ?>'">Remover</button>
                                         </div>
                                      </div>
                                   </div>
                                  </div>
                       <?php }?>
                    
                  </tbody>
                  </table>
                  </center>
                  <section class="ghost">
                  </section>
                 
                  <center>
                     <button class="btn btn-outline-primary active my-2 my-sm-0" onclick="document.form1.action='gerenciarEvento.php?acao=alt&idEvent=<?php echo $id ?>'" style="margin-left: 700px;">Alterar Evento </button>
                  </center>
               </section>
               <br>
               <section class="s2">
                  <div class="container"  style="max-width: 800px">
                     <h5>Infos:</h5>
                     <?php echo $info ?>
                  </div>
               </section>
               <br>
               <footer class="footer">
                  Todos os direitos reservados
               </footer>
            </form>
            <!-- Modal -->
          
                                 
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            </body>
      </html>
      <?php 
         }
         ?>