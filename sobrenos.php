<?php
session_start();
 
    if(!isset($_SESSION['cpf'])){
        ?>
         
         <nav class="navbar navbar-expand-lg justify-content-center navbar-dark" style="background-color: #0E100E;">
                <a class="navbar-brand" href="index.php">NeoTicket</a>
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
                    <a class="navbar-brand" href="index.php">NeoTicket</a>
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
                                <a class="dropdown-item" href="formaPagamento">Formas De Pagamento</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="Controls/sair.php">Sair</a>
                              </div>
                            </div>          
                          </li>
                    </ul>
             </nav>
             <?php
             }?>
     <html>
     <form name="form1" method="post" action="Controls/login.php ">
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
                   
                   </head>
                    <style>
                            .s1{
                            background-color: #F5F5F5;
                            text-align: center;       
                             font-size: 20px;
                             }
                            .s2{
                            background-color: #D3D3D3;
                              text-align: center;  
                               font-size: 20px;
                               height:280px;
                              
                              }
                              
                            .s3{
                            background-color: #F5F5F5;
                              text-align: center;    
                              font-size: 20px;
                                 height: 280px;
                            }
                               .footer{
                                    background-color: #0E100E;  
                                    height: auto;
                                   bottom: 0;
                                   text-color: #DCDCDC;
                                   margin: 0px auto 0px auto;
				                	}
               
                   .ghost2{ 
                     background-color: #0E100E;
                     height: 30px;
				   }

                    </style>



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
                            <a href="Views/cadastro.html" style="max-width: 800px">Não tem conta? Cadastra-se!</a>

                              
                            </div>
                        </div>
                    </div>
                    </div>

                   

        <section class="s1">
         <br>
                <center>
                    <h4>NeoTicket Web</H4>
            
            <br>
             Somos uma startup criada em 2019 na faculdade de tecnologia de são Caetano(FATEC Antonio Russo), com o intuito de agilizar o processo em eventos, tendo maio comodida para o consumidor.
                    </center>
        </section>

        <section class="s2">
          <img src="Imagens/sistema.jpg" align="left"style="background-color: #F0F8FF">
                <center>
                <br>
                <br>
                    <h4>NeoTicket For bussiness</H4>
                    Esta ferramenta serve para auxiliar o cliente a ter uma melhor gestão do seu negócio, podendo controlar estoque, ver pedidios sendo realizados por seus consumidores e, por fim, tendo o controle do seu evento e ingressos a toda hora.
                    </center>
                   
        </section>
            
        <section class="s3">
          <img src="Imagens/mobile.jpeg" align="right">
             <br>
              <br>
                    <h4>NeoTicket Mobile</H4>
                   
                        <center>
                        
                    Temos outra ferramenta, a NeoTicket Mobile, que são para os consumidores, este produto tras a eles uma nova experiencia nos eventos parceiros, pois podem comprar ver o cardapio e fazer pedidos por lá, quando tiverem no evento comprado pela plataforma online.
                </center>
        </section>


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
     </body>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </html>
