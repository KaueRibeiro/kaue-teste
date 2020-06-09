
<?php
session_start();
 
    if(!isset($_SESSION['cpf'])){
        ?>
         
         <nav class="navbar navbar-expand-lg justify-content-center navbar-dark" style="background-color: #0E100E;">
                <a class="navbar-brand" href="index.php">NeoTicket Web</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="nav justify-content-center navbar-dark">
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
                       <button type="button" class="btn btn-Primary" data-toggle="modal" data-target="#exampleModal"> Entrar </button>
                    </li>
                </ul>
            </nav>
        <?php 
        }else{ 
        ?>
             <nav class="navbar navbar-expand-lg justify-content-center navbar-dark" style="background-color: #0E100E;">
                    <a class="navbar-brand" href="index.php">NeoTicket Web</a>
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
                                <a class="dropdown-item" href="Controls/meusEventos.php">Meus Eventos</a>
                                <a class="dropdown-item" href="Controls/minhaConta.php">Minha Conta</a>
                                <a class="dropdown-item" href="Controls/formaPagamento.php">Formas De Pagamento</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="Controls/sair.php">Sair</a>
                              </div>
                            </div>          
                          </li>
                    </ul>
             </nav>
                    <?php 
                    }
                    include 'Controls/conexao.php';
                    $sql = mysql_query ("select * from evento order by nome");
                    ?>

            <html>
            <head>
                <meta charset="utf-8" />
                <title>NeoTicket Web</title>

                <link rel="stylesheet" href="Estilos/bootstrap.css" />
                <link rel="stylesheet" href="Estilos/bootstrap.css.map" />
                <link rel="stylesheet" href="Estilos/bootstrap.min.css" />
                <link rel="stylesheet" href="Estilos/bootstrap.min.css.map" />
                <link rel="stylesheet" href="Estilos/bootstrap-grid.css" />
                <link rel="stylesheet" href="Estilos/bootstrap-grid.min.css" />
                <link rel="stylesheet" href="Estilos/bootstrap.min.css.map" />
                <style type="text/css">
                    .s1 {
                        background-color: #0E100E;
                        background-size: cover;
                        background-position: 0 55%;
                        position: relative;
                        height: 250px;
                    }

                    .s2{
                     margin: 0px auto auto auto;
                    background-color: #DCDCDC           
					}
                    .card-deck{
                        margin: 0px 150px 0px 150px;
                        height: auto;
                       
                    }
                    .form-row{
                      
                        margin: 0px 200px 5px 200px;
					}
                    .s3{
                        background-color:  #C0C0C0;
                        margin: 0px 0px 0px auto;
                        height: 100px;
                        bottom:0px;
                        padding:0px;
					}
                    .nav{
                         margin: 7px 10px 25px 20px;
                        height:20px;   
					}
                    .carousel{
                    height:200px;
                    width:800px;
                    }
                    .footer{
                        background-color: #0E100E;  
                        height: auto;
                       bottom: 0;
                       text-color: #DCDCDC;
                       margin: 0px auto 0px auto;
					}
                   .ghost{ 
                     background-color: #DCDCDC;
                     height: 10px;
				   }
                   .ghost2{ 
                     background-color: #0E100E;
                     height: 30px;
				   }
                </style>
            </head>
                    <body>
                     <form name="form1" method="post" action="Controls/login.php">
          
                        <section class="s1">
                           <div class="container">
                           <center>
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                            <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="Imagens/slide04.jpeg" class="d-block w-100" alt="...">
                                    </div>
                                       <div class="carousel-item">
                                            <img src="Imagens/slide05.jpg" class="d-block w-100" alt="...">
                                       </div>
                                           <div class="carousel-item">
                                                <img src="Imagens/slide035.jpg" class="d-block w-100" alt="...">
                                           </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                                </div>
                                    </div>
                              </section>
                <section class="ghost">
                
                </section>
                 <section class="s2">
                   <div class="form-row">
                    <br>
                    <br>
                            <input class="form-control" type="search" placeholder="Digite o nome do evento " aria-label="Search"> 
                            <button class="btn btn-outline-primary btn-block" type="submit">Procurar Evento</button>
                    </div>
              <hr>
                        <center>
                        <div class="row row-cols-1 row-cols-md-4"  style="max-width: 900px;">
                                
                                        <?php
                                        while($linha = mysql_fetch_assoc($sql)) {
                                        $id = $linha['idEvento'];
                                        $nome= $linha['nome'];
                                        $local= $linha['local'];
                                        $data= $linha['data'];
                                        $imagem= $linha['imagem'];
                                        ?>

                                        
                       
                     
                                    <div class="card">
                                    <div class="card h-100">
                                    <a href="Controls/detalheEvento.php?idEvent=<?php echo $id?>">
                                        <img src="Imagens/Banner/<?php echo $imagem ?> " class="card-img" alt>
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title" ><?php echo $nome ?> </h5>
                                        <p class="card-text"><?php echo $data  ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted"><?php echo $local ?></small>
                                    </div>
                                 </div>
                                 </div>
                      
                        <?php
                        }?>
  
               
              </div>
               </center>
        </section>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width: 250px">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">NeoTicket Login</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="txt_login" placeholder="E-mail"></input>
                                 </div>
                                <div class="form-group">
                                     <input type="password" class="form-control" name="txt_senha" placeholder="Senha"></input>
                                </div>
                                <button class="btn btn-primary active my-2 my-sm-0 btn-block" type="submit" onclick="document.form1.action='Controls/login.php'">Entrar</button>
                                 <a href="esquecisenha.php" style="max-width: 800px">Esqueci a senha!  </a>
                            </div>
                            <div class="modal-footer">
                            <a href="Views/cadastro.html" style="max-width: 800px">N�o tem conta? Cadastra-se!</a>
                                                          
                            </div>
                        </div>
                    </div>
                    </div>   
                 <section class="ghost">
                
                </section>
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
                <a class="nav-link" href="sobrenos.php">Sobre N�s</a>
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
 </body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>