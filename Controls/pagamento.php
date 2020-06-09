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
              margin: auto auto auto 20px;
           
              width: 80rem;
	         }
             .s1{
              margin: auto 150px auto 150px;
            
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
     </center>
    <br>
    <br>
  
 <section class="s3">
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
                        $dataValidade= $linha['dataValidade'];
                        $nomeCartao= $linha['nomeCartao'];
                        $tipoCartao= $linha['tipoCartao'];
                        ?>
                                 <div class="card w-">
                                      <div class="card h-100">
                                          <div class="card-header" style="background-color:#0000FF">Cartão de <?php echo $tipoCartao ?> </div>
                                              <div class="card-body">
                                                    <h5 class="card-title"><?php echo $nomeCartao ?> </h5>
                                                    <p class="card-text"><?php echo $num ?> </p>
                                                    <p class="card-text">Validade: <?php echo $dataValidade ?> </p>
                                                    <a href="#" class="btn btn-primary">Realizar Pagamento</a>
                                             </div>
                                         </div>
                                    </div>
                              
                                                    <?php }} else { 
                                                            echo "<center>";
                                                            echo "Você não possui nenhuma forma de pagamento adicionada, escoha uma das opções abaixo para adicionar e continuar a compra";        
                                                            echo "</center>";
				                                    }
                                                        ?>
                 </div>
              </div>
           </div>
    </center>
    </section>
        <br><br>
      
      <section class="s2">
            <div class="accordion" id="accordionExample">
                <div class="card">
                 <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Cartão de Crédito</button>
                    </h2>
                    </div>
                 <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                     <div class="card-body">
                         <div class="form-row">
                                <div class="col">
                                    <label for="inputEmail4">Numero do Cartão:</label>
                                    <input type="text" class="form-control" name="txt_numero" placeholder="Numero do cartão">
                                </div>
                                <div class="col">
                                    <label for="inputEmail4">data Validade:</label>
                                    <input type="text" class="form-control" name="txt_data" placeholder="ex: 10/2020">
                                </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="inputEmail4">Nome do Titular:</label>
                                <input type="text" name="txt_nome" class="form-control" id="inputEmail4">
                            </div>
                        </div>                  
                    </div>
                </div>
                      <div class="card">
                        <div class="card-header" id="headingTwo">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                             Cartão de Débito
                            </button>
                          </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                       <div class="card-body">
                                <div class="form-row">
                                <div class="col">
                                    <label for="inputEmail4">Numero do Cartão:</label>
                                    <input type="text" class="form-control" name="txt_numero" placeholder="Numero do cartão">
                                </div>
                                <div class="col">
                                    <label for="inputEmail4">data Validade:</label>
                                    <input type="text" class="form-control" name="txt_data" placeholder="ex: 10/2020">
                                </div>
                                 </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="inputEmail4">Nome do Titular:</label>
                                        <input type="text" name="txt_nome" class="form-control" id="inputEmail4">
                                    </div>
                                </div>    
                   </section>
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