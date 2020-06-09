<?php 
session_start();
if(!isset($_SESSION['cnpj']))
{
header("location: http://localhost:8080/tcc/NeoTicketWeb/Views/login.html");
exit;
}else{
include '../Controls/conexao.php';
$cnpj = $_SESSION['cnpj'];

$sql = mysql_query ("select * from evento where empresa = $cnpj");

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
                     .card-deck{
                        margin: 0px 150px 0px 150px;
                        height: auto;
                        width: 800px;
                       
                    }
</style>
<body>
 <nav class="navbar navbar-expand-lg justify-content-center navbar-dark bg-dark">
             <a class="navbar-brand" href="eventoCliente.php">NeoTicket for Business</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  
                <span class="navbar-toggler-icon"> </span>
             </button>
             <ul class="nav justify-content-center" style>
             
                             <li class="nav-item">
                             <a class="nav-link" href="sairCliente.php.php">Sair</a>
                       </li>
    </nav>
    
<br>
<br>
        <div class="container">
        <?PHP 
        echo  "<center>";
        echo "<h3>";
        echo "Selecione um evento para gerenciar"; 
        echo "</h3>";
        echo "</center>";
      
      ?>
  
        <hr>
           <div class="card-deck">
                <?php 
            
 	                while($linha = mysql_fetch_assoc($sql)) {  
                    $id = $linha['idEvento'];
                    $nome= $linha['nome'];
                    $local= $linha['local'];
                    $data= $linha['data'];
                    $imagem= $linha['imagem'];
                ?>
                          <div class="card h-100">
                          <a href= "menuCliente.php?idEvent=<?php echo $id?>">
                            <img src="../Imagens/Banner/<?php echo $imagem ?>" class="card-img-top" alt>
                            </a>
                            <div class="card-body">
                              <h3 class="card-title"><?php echo $nome ?></h3>
                               <p class="card-text"><?php echo $data  ?></p>
                            </div>
                            <div class="card-footer">
                              <small class="text-muted"><?php echo $local ?></small>
                            </div>
                          </div>

                <?php 
                }}?>
</div>
</div>
</body>
</html>