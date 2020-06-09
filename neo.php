<?php
session_start();
 
if(!isset($_SESSION['cpf'])){
?>
 <html>
 <form name="form1" method="post" action="Cliente/loginCliente.php">
 <form name="form" method="post" action="Promover.php">
            <nav class="navbar navbar-expand-lg justify-content-center navbar-inverse bg-light" >
                <a class="navbar-brand" href="index.php">NeoTicket For bussiness</a>
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
             <nav class="navbar navbar-expand-lg justify-content-center navbar-inverse bg-light">
                    <a class="navbar-brand" href="index.php">NeoTicket for bussiness</a>
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
}
?>
<html>
<head>
        <title> </title>
            
            <link rel="stylesheet" href="Estilos/bootstrap.css" />
            <link rel="stylesheet" href="Estilos/bootstrap.css.map" />
            <link rel="stylesheet" href="Estilos/bootstrap.min.css" />
            <link rel="stylesheet" href="Estilos/bootstrap.min.css.map" />
            <link rel="stylesheet" href="Estilos/bootstrap-grid.css" />
            <link rel="stylesheet" href="Estilos/bootstrap-grid.min.css" />
            <link rel="stylesheet" href="Estilos/bootstrap.min.css.map" />



                        <style type="text/css">
                        .bg-img {
                        width: 100%;
                        height: 40%;
                        min-height: 400px;
                        background-image: url(Imagens/slide.jpg);
                        background-size: cover;
                        background-position: center;
                        display: flex;
                        flex-direction: column;
                        position: relative;
                        }
                        .jumbotron{
                            margin: 0px 0px 0px 0px;       
                            background-color: #F5FFFA;
						}

                        .s1{
                         margin: 20px 50px 50px 50px;
                        max-width: 800px;
	                    }
                        .s2{
                         background-color: #F5FFFA;
                        height:400px;
                        bottom:0;
                        margin: 0 auto;
	                    }
                        .s3{
                         background-color: #F5F5F5;
                          margin: 50px auto auto auto;
                           margin-top: 0;
	                    }  
                        .footer{
                            background-color: #0E100E;  
                            height: 290px;
                            bottom: 0;
                            text-color: #DCDCDC;
                            margin: 0px auto auto auto;
        
	                    }
                     .ghost{ 
                     background-color: #F5FFFA;;
                     height: 40px;
				   }
                    </style>

<body>
<header class="bg-img">
</header>
      
        <div class="jumbotron">
              <h1 class="display-4">Ola Investidor!</h1>
              <p class="lead">Bem Vindo ao NeoTicket for bussiness.</p>
              <hr class="my-4">
              <p>Esta ferramenta serve para você ALAVANCAR SUAS VENDAS com a nossa plataforma com ferramentas que irão facilitar a sua administração e dar uma experiencia melhor para o seu público.</p>
              <a class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal2" role="button-inverse">Fazer parte do time</a>
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
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width: 250px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">NeoTicket for bussiness Login</h5>
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
                                            <button class="btn btn-primary active my-2 my-sm-0 btn-block" type="submit" onclick="document.form1.action='Cliente/loginCliente.php'">Entrar</button>
                                             <a href="esquecisenha.php" style="max-width: 800px">Esqueci a senha!  </a>
                                        </div>
                                        <div class="modal-footer">
                                             <a href="formneo.php" style="max-width: 800px">Não tem conta? Cadastra-se!</a>                         
                                        </div>
                                    </div>
                                </div>
                           </div>


                                 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document" style="max-width: 700px">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Entrar em Contato</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                                     <div class="modal-body">
                                                          <h4> Entre em contato com a nossa equipe para mais informações técnicas sobre a parceria com a NeoTicket e as suas vantegens.<p></h4>
                                                          <h6> Horário de atendimento das 8:00 as 17h de segunda a sexta-feira.<p></h6>
                                                          Retornaremos o mais breve possivel. 
                                                          <br>
                                                             <div class="form-group">
                                                                 <label for="exampleFormControlTextarea1">Nome:</label>
                                                                 <input type="text" class="form-control" name="txt_nome"></input>
                                                             </div>
                                                             <div class="form-group">
                                                                 <label for="exampleFormControlTextarea1"> Email: </label>
                                                                  <input type="email" class="form-control" name="txt_email" placeholder="seu email"></input>
                                                             </div>
                                                             <div class="form-group">
                                                                  <label for="exampleFormControlTextarea1">Assunto:</label>
                                                                  <input type="text" class="form-control" name="txt_assunto" value="promover evento"></input>
                                                             </div>
                                                            <div class="form-group">
                                                                 <label for="exampleFormControlTextarea1">Mensagem:</label>
                                                                <textarea class="form-control" name="txt_mensagem" id="exampleFormControlTextarea1" rows="4"></textarea>
                                                            </div>
                                                     </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-primary active my-2 my-sm-0 btn-block" type="submit" onclick="document.form1.action='promover.php?acao=Promover'">Promover</button>               
                                                </div>
                                        </div>
                                    </div>
                                 </div>
                               

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    </form>
    </form>
    </body>
    </html>