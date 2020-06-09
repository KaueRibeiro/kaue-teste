<?php
session_start();
 
if(!isset($_SESSION['cpf'])){
?>
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
               <button type="button" class="btn btn-Primary" data-toggle="modal" data-target="#exampleModal"> Entrar </button>
            </li>
        </ul>
    </nav>
<?php 
}else{ 
?>

             <nav class="navbar navbar-expand-lg justify-content-center navbar-dark" style="background-color: #0E100E;">
                    <a class="navbar-brand" href="../index.php">NeoTicket Web</a>
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
                                <a class="dropdown-item" href="formaPagamento.php">Formas De Pagamento</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="sair.php">Sair</a>
                              </div>
                            </div>          
                          </li>
                    </ul>
 </nav>
<?php 
}
include 'conexao.php';

$sql = mysql_query ("select * from evento order by nome");

?>

        <!DOCTYPE html>

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
             <style type="text/css">
            .s1 {
           
            background-size: cover;
            background-position: 0 55%;
            position: relative;
                }

             .s2 {
            margin: 50px 150px auto 150px;
            height: auto;
                }
                  .footer{
                        background-color: #0E100E;  
                        height: 300px;
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
                     

<br>
<section class="s2">
            <div class="card-deck"  >
                                
                                        <?php
                                        while($linha = mysql_fetch_assoc($sql)) {
                                        $id = $linha['idEvento'];
                                        $nome= $linha['nome'];
                                        $local= $linha['local'];
                                        $data= $linha['data'];
                                        $imagem= $linha['imagem'];
                                        ?>

                       
                                    <div class="card" style="width: 10rem;"  >
                                    <div class="card h-100">
                                    <a href="detalheEvento.php?idEvent=<?php echo $id?>">
                                        <img src="../Imagens/Banner/<?php echo $imagem ?> " class="card-img" alt>
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
</section>
</center>
</body>

<br>
<br>
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
 </body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>