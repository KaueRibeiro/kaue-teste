 <?php 
        session_start();
                if(isset($_SESSION['cpf'])) {   
                    $cpf = $_SESSION['cpf'];
                    include 'conexao.php';
                    $sql = mysql_query("select * from consumidor where cpf = $cpf");
                    if(mysql_num_rows($sql) > 0){
                        $dado = mysql_fetch_assoc($sql);
                            $nome = $dado['nome'];
                            $ultimo = $dado['ultimoNome'];
                            $email = $dado['email'];
                            $senha = $dado['senha'];
                            $data = $dado['dataNasc'];
                     ?>

<html lang="pt-br" >    
<!DOCTYPE html>
    <meta charset="utf-8" />
    <head>
        <title>NeoTicket Minha Conta</title>
        <link rel="stylesheet" href="..\Estilos/Estilo.css" />
        <link rel="stylesheet" href="..\Estilos/bootstrap.css" />
        <link rel="stylesheet" href="..\Estilos/bootstrap.css.map" />
        <link rel="stylesheet" href="..\Estilos/bootstrap.min.css" />
        <link rel="stylesheet" href="..\Estilos/bootstrap.min.css.map" />
        <link rel="stylesheet" href="..\Estilos/bootstrap-grid.css" />
        <link rel="stylesheet" href="..\Estilos/bootstrap-grid.min.css" />
        <link rel="stylesheet" href="..\Estilos/bootstrap.min.css.map" />
    </head>
                     
    <form name="form1" method="POST" action="alterardados.php" >
                    <style type="text/css">
                    .s1{
                        width: 600px;           
					}
                    .ghost{
                    background-color: #0E100E;
                    bottom:0px;
                    height: 30px;
		            }
                     .footer{
                            background-color: #0E100E;  
                            height: auto;
                            bottom: 0;
                            text-color: #DCDCDC;
                            margin: 0px auto 0px auto;
			            }
                     </style>
                <body>
        <nav class="navbar navbar-expand-lg justify-content-center navbar-dark bg-dark">
                     <a class="navbar-brand" href="../index.php">NeoTicket</a>
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                      </button>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../sobrenos.php">Sobre Nos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../neo.php">Neo para Negocios</a>
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
                            <a class="dropdown-item" href="#">Sair</a>
                          </div>
                        </div> 
                    </li>
                </ul>
          </nav>
          <br>
          <br>
          <br>
          <br>
          <br>
            <center>
              <div class="container">
          <section class="s1">
        
             
                <div class="col">
                    <label for="inputEmail4">Nome:</label>
                    <input type="text" class="form-control" name="txt_nome" value="<?php echo $nome ?>">
                </div>
                <div class="col">
                    <label for="inputEmail4">Ultimo Nome:</label>
                    <input type="text" class="form-control" name="txt_ultimo" value="<?php echo $ultimo  ?>">
                </div>
                <div class="col">
                    <label for="inputEmail4">Email:</label>
                    <input type="email" name="txt_email" class="form-control" id="inputEmail4" value="<?php echo $email ?>">
                </div>
           
            <br>
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" style="margin-right: 30" >Alterar Senha</button>
                  <button type="submit" class="btn btn-success" onclick="document.form1.action='alterardados.php?alt=dados'">Alterar Dados</button>
             </center>
         </section> 
         <br>
         <br>
         
               <div class="footer">
                        <center>
                        <br>
                           <p class="text-white"> NeoTicket  Todos os direitos reservados </p>
                            </center>
                         <ul class ="nav2 flex-column" style="margin: 50px 50px 0px 50px">
                          <li class="nav-item">
                            <a class="nav-link active" href="Controls/menu.php">Eventos</a>
                          </li><p>
                          <li class="nav-item">
                            <a class="nav-link" href="sobrenos.php">Sobre Nós</a>
                          </li><p>
                          <li class="nav-item">
                            <a class="nav-link" href="neo.php">Promova seu Evento</a>
                          </li>
                            <li class="nav-item">
                            <a class="nav-link" href="Views/Login.html">Entrar</a>
                          </li>
                        </ul>
           
                        </div>
<section class="ghost2">
        </section>     

                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width: 400px">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">NeoTicket Alterar Senha</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                         </div>
                      <div class="modal-body">          
                                        <center>
                                        <div class="col-md-6">
                                            <label for="inputPassword4"> Nova Senha:</label>
                                            <input type="password" name="txt_senha" class="form-control" id="inputEmail4">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword4">Confirme a Senha:</label>
                                            <input type="password" class="form-control" id="inputPassword4" name="txt_rsenha">
                                        </div>
                                    </center>
                      </div>
                                    <div class="modal-footer">
                                           <button class="btn btn-success active my-2 my-sm-0 btn-block" type="submit" onclick="document.form1.action='alterardados.php?alt=senha'">Alterar Dados</button>                                                          
                                    </div>
                        </div>
                    </div>

        
           
</body>

                        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 </html>
    <?php 
            }}
        ?>   