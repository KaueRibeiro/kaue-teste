<?php 
session_start();
if(!isset($_SESSION['cnpj']))
{
header("location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/loginCliente.html");
exit;
}else{
$cnpj = $_SESSION['cnpj'];
$id = $_GET['idEvent'];
$acao = $_GET['acao'];
include '../Controls/conexao.php';
    if ( $acao == 'alt'){
    $sql = mysql_query("select * from evento where idEvento = $id and empresa = $cnpj");
	if(mysql_num_rows($sql) > 0){
    $dado = mysql_fetch_assoc($sql);
    $nome= $dado['nome'];
    $local = $dado['local'];
    $data = $dado['data'];
    $endereco = $dado['endereco'];
    $infos = $dado['informacoes'];
    $horario = $dado['horario'];
    }
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
    <title>NeoTicket Cadastro</title>
    <link rel="stylesheet" href="../Estilos/Estilo.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.css.map" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.min.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.min.css.map" />
    <link rel="stylesheet" href="..\Estilos/bootstrap-grid.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap-grid.min.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.min.css.map" />
    <style type="text/css">
         .s1{background-color: white;
          text-align: center;
            margin: 50px auto auto 500px;
            padding:0;
          font-size: larger;
            justify-content:center;
        }
</style>

</head>
    <nav class="navbar navbar-expand-lg justify-content-center navbar-dark bg-dark">
         <a class="navbar-brand" href="eventoCliente.php">NeoTicket for Business</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"> </span>
         </button>
         <ul class="nav justify-content-center" style>
         <li class="nav-item">
            <a class="nav-link" href="estoqueEvento.php?idEvent=<?php echo $id ?>&acao=">Meu Estoque</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="listagemPedido.php?idEvent=<?php echo $id ?>">Cozinha</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="relatoriosCliente.php">Relatorios</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="sairCliente.php">Sair</a>
         </li>
      </nav>
<body>
    <form name="form2" method="post" action="cadastrarEvento.php"/>
    <main>
            
        <section class="s1" id="Cadastro Evento">
       
            <form>

                <font face="arial" size="5" color="black">

                    <div class="form-row">
                        <div class="col">
                            <label for="inputEmail4">Nome do Evento:</label>
                            <input type="text" class="form-control" name="txt_nome" value="<?php echo $nome ?>">
                        </div>
                       
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="inputEmail4">local:</label>
                            <input type="text" name="txt_local" class="form-control" id="inputEmail4" value="<?php echo $local ?>">
                        </div>
                            <div class="col-md-6">
                                <label for="inputPassword4">Endereco:</label>
                                <input type="text" name="txt_endereco" class="form-control" id="inputEmail4" value="<?php echo $endereco ?>">
                            </div>
                        </div>  
                         <div class="form-row">
                        <div class="col-md-6">
                            <label for="inputEmail4">data do evento:</label>
                            <input type="date" name="txt_data" class="form-control" id="inputEmail4" value="<?php echo $data ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4">Horario:</label>
                            <input type="time" name="txt_horario" class="form-control" id="inputEmail4" value="<?php echo $horario ?>">
                        </div>
                    </div>
                       
                         <div class="form-group">
                            <label for="exampleFormControlTextarea1">Informações:</label><br>
                            <textarea class="form-control" name="txt_infos" id="exampleFormControlTextarea1" rows="10" value="<?php echo $infos ?>" ></textarea>
                          </div>
                        </form>                        


                        <button type="submit" class="btn btn-primary btn-block" onclick="document.form2.action='http://localhost:8080/tcc/NeoTicketWeb/Cliente/cadastrarEvento.php?acao=alt&idEvent=<?php echo $id?>'">Alterar</button>
                </font>

            </form>
            
       
       
 </section>
    </main>
</body>
</html>
<?php 
}}
?>