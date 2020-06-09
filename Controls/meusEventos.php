<?php 
session_start();
$cpf = $_SESSION['cpf'];
if(!isset($_SESSION['cpf']))
{
header("location: http://localhost:8080/tcc/NeoTicketWeb/Views/login.html");
exit;
}else{
include 'conexao.php';

$sql = mysql_query ("SELECT i.id_ingresso, i.cpf, i.id_evento, e.nome, e.data,e.local, e.imagem
FROM ingresso AS i
INNER JOIN evento AS e ON i.id_evento = e.idEvento
AND cpf = '$cpf'");

    
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
</head>
    <style>
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
                   .ghost{ 
                     background-color:;
                     height: 30px;
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
                            <a class="dropdown-item" href="formaPagamento.php">Formas De Pagamento</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Sair</a>
                          </div>
                        </div> 
                    </li>
                </ul>
         </nav>
<br>
<?php 
 	while($linha = mysql_fetch_assoc($sql)) {  
    $id_ing = $linha['id_ingresso'];
    $id_evento = $linha['id_evento'];
    $nome= $linha['nome'];
    
    $local= $linha['local'];
    $data= $linha['data'];
    $imagem= $linha['imagem'];
?>

<br>
<br>
<center>
<form name="form1" method="POST" action="../promover.php">
          <div class="card" style="width: 18rem;">
            <a href="qrcode.php">
              <img src="../Imagens/Banner/<?php echo $imagem ?>" class="card-img-top" alt="...">
              </a>
             <div class="card-body">
                <h5 class="card-title"><?php echo $nome ?></h5>
                <p class="card-text"><?php echo $data  ?></p>
                <p class="card-text"><?php echo $local ?></p>
               <div class="card-footer">
                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal2" data-placement="top" title="Transferir o Ingresso para outra conta">Transferir</button>
               </div>
             </div>
          </div>

                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width: 400px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tansferir Ingresso</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                         <div class="modal-body">
                                                  <h5>Insira abaixo o CPF e EMAIL para quem <strong> DESEJA TRANSFERIR </strong> seu ingresso <?php echo $linha['id_ingresso'] ?> ? <p></h5>
                                                    <br>
                                                     <div class="form-group">
                                                     <label for="exampleFormControlTextarea1">CPF:</label>
                                                    <input type="text" class="form-control" name="txt_cpf"></input>
                                                  </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Email: </label>
                                                 <input type="email" class="form-control" name="txt_email" placeholder="seu email"></input>
                                            </div>
                                        </div>
                                     <div class="modal-footer">
                                        <button type="button" class="btn btn-danger my-2 my-sm-0 " data-dismiss="modal">Sair</button>
                                        <button class="btn btn-success active my-2 my-sm-0" onclick="document.form1.action='../promover.php?id_ingresso=<?php echo $id_ing ?>&id_evento=<?php echo $id_evento ?>&acao=Transferir'">Transferir</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                    </div>
                </div>
                   
<?php 
}}?>
</center>
</form>
</body>

<br>
<br>
<br>
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

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
