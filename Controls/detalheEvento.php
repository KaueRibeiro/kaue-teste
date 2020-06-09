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
                    <a class="dropdown-item" href="Controls/meusEventos.php">Meus Eventos</a>
                    <a class="dropdown-item" href="Controls/minhaConta.php">Minha Conta</a>
                    <a class="dropdown-item" href="formaPagamento">Formas De Pagamento</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Sair</a>
                  </div>
                </div> 
            </li>
        </ul>
 </nav>
<?php 
}
include 'conexao.php';
$idevento = $_GET['idEvent'];
$sql = mysql_query ("select * from evento where idEvento = $idevento");
?>
<!DOCTYPE html>

<html lang="pt-br" >
<head>
    <meta charset="utf-8" />
    <title>NeoTicket Ingressos</title>
    <link rel="stylesheet" href="..\Estilos/Estilo.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.css.map" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.min.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.min.css.map" />
    <link rel="stylesheet" href="..\Estilos/bootstrap-grid.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap-grid.min.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.min.css.map" />
</head>


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
         <form method="POST" name="form1" action="sacola.php" >
            <title></title>
                     <style type="text/css">
                     .s1{background-color: #F5F5F5;}
                     .s2{background-color: white;}
                      .s3{background: url('../Imagens/Banner/<?php echo $imagem ?>') no-repeat;
                      height:250px;
                      width:100%;
                      background-size: cover;
                      background-position: 0 55%;
                      position: relative:; }
                      .footer{ position:relative;
                      background-color: black;
                      text-color: white;
                      }
                     </style>
        <section class="s3">
            <div class="banner"> 
            </div>
        </section>


        <section class="s1">
            <div class="banner">
                <center>
                    <div class="media"  style="width: 50rem;">
                      <img src="../Imagens/Logo/<?php echo $logoEmpresa ?>" class="mr-3" alt="..."  style="max-width: 650px;">
                       <div class="media-body">
                        <br>
                         <h5 class="mt-0"><?php echo $nome ?></h5>
                          <p class="card-text"><?php echo $data ?> as <?php echo $horario ?></p>
                            <div class="card-text"><?php echo $local ?></p>
                                <small class="card-text"><?php echo $endereco ?></p>
                            </div>
                    </div>
                 </center>
            </div>
         </section>


    <section class="s2">
      <br>
         <center>
            <h5>
                    Ingresso  &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;           &nbsp;          Indentificação&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;                       Resumo &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;                   Pagamento&nbsp; &nbsp; &nbsp; &nbsp; 
            </h5>
                <div class="progress" style="max-width: 800px">
                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                </div>
        </center>
     </section>

<br>
    <section class="s1">
        <center>

            <table class="table" style="max-width: 800px" >
            </center>
              <thead class="thead-dark" align="center" >
                <tr>
                  <th scope="col">Setor</th>
                  <th scope="col">Lote</th>
                  <th scope="col">Valor</th>
                  <th scope="col">Quantidade</th>
                  <th scope="col">Adicionar</th>
                </tr>
              </thead>
                      <?php 
                        $sql2 = mysql_query("select * from eventoingresso where id_evento = $idevento");
 	                    while($linha = mysql_fetch_assoc($sql2)) {  
    
                        ?>
                <tbody> 
                <td align="center"><?php echo $linha['setor']; ?></td>
			            <td align="center"><?php echo $linha['lote']; ?></td>
			            <td align="center">R$ <?php echo $linha['valor']; ?></td>
                        <td align="center"><select name="quantidade" id="quantidade" style="max-width: 95px;" class="custom-select" >
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select> 
                            </td>
                        <td align="center"> <button class="btn btn-success btn-sm active my-2 my-sm-0" type="submit" onclick="document.form1.action='sacola.php?acao=add&id=<?php echo $linha['id_ingresso'] ?>&val=<?php echo $linha['valor'] ?>'">Adicionar</button></td>
            
                <tr>
    
                            <?php } ?>
                </tbody>
                </table>
                </center>
            <br>
            <br>
        <center>
            <button class="btn btn-outline-primary active my-2 my-sm-0" onclick="document.form1.action='identificacao.php'" style="margin-left: 700px;">Continuar</button>
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
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
   