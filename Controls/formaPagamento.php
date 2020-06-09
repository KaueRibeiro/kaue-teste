  <?php
    session_start();
 
        if(!isset($_SESSION['cpf'])){
            ?>
                 header("location: http://localhost:8080/tcc/NeoTicketWeb/index.php");

                <?php 
                }else{ 
                     ?>
                         <nav class="navbar navbar-expand-lg justify-content-center navbar-dark" style="background-color: #0E100E;">
                                <a class="navbar-brand" href="../index.php">NeoTicket</a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <ul class="nav justify-content-center">
                                    <li class="nav-item">
                                        <a class="nav-link" href="Controls/menu.php">Eventos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="sobrenos.php">Sobre Nos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="neo.php">Neo para Negocios</a>
                                    </li>
                                    <li class="nav-item">
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Minha Conta
                                          </button>
                                          <div class="dropdown-menu">
                                            <a class="dropdown-item" href="meusEventos.php">Meus Eventos</a>
                                            <a class="dropdown-item" href="minhaConta.php">Minha Conta</a>
                                            <a class="dropdown-item" href="formaPagamento">Formas De Pagamento</a>
                                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="Controls/sair.php">Sair</a>
                              </div>
                            </div>          
                          </li>
                    </ul>
                </nav>
                    <?php 
                    }
                    ?> 
<html lang="pt-br" >
     <head>
        <meta charset="utf-8" />
        <title>NeoTicket Menu do Consumidor</title>
        <link rel="stylesheet" href="..\Estilos/Estilo.css" />
        <link rel="stylesheet" href="..\Estilos/bootstrap.css" />
        <link rel="stylesheet" href="..\Estilos/bootstrap.css.map" />
        <link rel="stylesheet" href="..\Estilos/bootstrap.min.css" />
        <link rel="stylesheet" href="..\Estilos/bootstrap.min.css.map" />
        <link rel="stylesheet" href="..\Estilos/bootstrap-grid.css" />
        <link rel="stylesheet" href="..\Estilos/bootstrap-grid.min.css" />
        <link rel="stylesheet" href="..\Estilos/bootstrap.min.css.map" />
 </head>
            <style>
             .s2{
              margin: 40px auto auto 10px;
           
              width: 100rem;
	         }
             .s1{
              margin: auto 150px auto 150px;
            
	         }

         .footer{
                        background-color: #0E100E;  
                        height: auto;
                        width: 1800;
                       bottom: 0;
                       text-color: #DCDCDC;
                       margin: 0px auto 0px auto;
                       position: fixed;
                      
					}
             </style>
     </center>
    <br>
    <br>
<form name="form1" method="POST" action="cartao.php">
    <div class="s1">
        <center>
        <h2> Meus Cartões </h2>
        <br>
        <br>  
    
         <div class="card-deck">
      
                    <?php 
                    $cpf = $_SESSION['cpf'];
                    include 'conexao.php';
                    $sql = mysql_query ("select * from pagamento where cpf = $cpf");
                     if(mysql_num_rows($sql) > 0){
                        while($linha = mysql_fetch_assoc($sql)) {
                        $num = $linha['numCartao'];
                        $mesValidade= $linha['mesValidade'];
                         $anoValidade= $linha['AnoValidade'];
                        $nomeCartao= $linha['nomeCartao'];
                       
                        ?>
                                 <div class="card w-">
                                      <div class="card h-100">
                                          <div class="card-header"></div>
                                              <div class="card-body">
                                                    <h5 class="card-title"><?php echo $linha['nomeCartao'] ?> </h5>
                                                    <p class="card-text"><?php echo $num ?> </p>
                                                    <p class="card-text">Validade: <?php echo $mesValidade ?>/<?php echo $anoValidade ?></p>
                                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#alterarCartao">Editar</a>
                                                     <a href="#" class="btn btn-danger"  data-toggle="modal" data-target="#excluirCartao">excluir </a>
                                             </div>
                                         </div>
                                    </div>
                              
                                                    <?php }}
                                                    
                                                    else { 
                                                         ?>

                                              <center>              
                                             <h7> Você não possui nenhum cartão adicionado, inclua um quando for realizar uma compra </h7> 
                                              </center>              
                                                    <?php
				                                    }
                                                        ?>
                 </div>
              </div>
           </div>
    </center>

        <br><br>
      
      
               <section class="ghost ">
                    </section>
                <div class="footer">
       
                            <br>
                            <center>
                               <p class="text-white"> NeoTicket  Todos os direitos reservados </p>
                                </center>
                             <ul class ="nav2 flex-column" style="margin: 50px 50px 0px 50px">
                              <li class="nav-item">
                                <a class="nav-link active" href="menu.php">Eventos</a>
                              </li><p>
                              <li class="nav-item">
                                <a class="nav-link" href="../sobrenos.php">Sobre Nós</a>
                              </li><p>
                              <li class="nav-item">
                                <a class="nav-link" href="../neo.php">Promova seu Evento</a>
                              </li>
                                <li class="nav-item">
                                <a class="nav-link" href="../Views/Login.html">Entrar</a>
                              </li>
                            </ul>
                           </center>
                     </div>
                        <section class="ghost2">
                        </section>
                               <section class="ghost ">
                    </section>
                        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>      
                                    
                                    
                                    
                                    
                                    <div class="modal fade" id="alterarCartao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document" style="max-width: 400 px">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">NeoTicket Meu Cartão</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                            <div class="form-group">
                                                                              <label for="exampleFormControlTextarea1">Numero do Cartão:</label>
                                                                            <input type="text" class="form-control" name="txt_num" value="<?php echo $num ?>"> </input>
                                                                            </div>
                                                                        <div class="form-group">
                                                                          <label for="exampleFormControlTextarea1">Nome do Titular:</label>
                                                                                <input type="text" class="form-control" name="txt_nome" value="<?php echo $nomeCartao ?>"></input>
                                                                        </div>
                                                                             <div class="form-group">
                                                                               <label for="exampleFormControlTextarea1">Mes de Validade:</label>
                                                                                <input type="text" class="form-control" name="txt_mesvalidade" value="<?php echo $mesValidade ?>"></input>
                                                                        </div>
                                                                          <div class="form-group">
                                                                               <label for="exampleFormControlTextarea1">Ano de Validade:</label>
                                                                                <input type="text" class="form-control" name="txt_anovalidade" value="<?php echo $anoValidade ?>"></input>
                                                                        </div>
                                                                        <button class="btn btn-success active my-2 my-sm-0 btn-block" type="submit" onclick="document.form1.action='cartao.php?acao=alt'">Alterar</button>
                                                                           
                                                                    </div>  
                                                            </div>
                                                      </div> 
                                            </div>
                                                                                                                                                     
                                                    <div class="modal fade" id="excluirCartao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document" style="max-width: 400px">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">NeoTicket Meu Cartão</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        </div>
                                                                     <div class="modal-body">
                                                                               <h5>Deseja realmente excluir o cartão <?php echo $num ?> ? </h5>
                                                                       
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button class="btn btn-danger active my-2 my-sm-0 " type="submit" onclick="document.form1.action='cartao.php?acao=del'">Remover</button>
                                                          
                                                                        </div>
                                                                    </div>
                                                                </div>
     </form>                                                    </div> 
   </html>