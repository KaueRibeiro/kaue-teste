<?php 
session_start();
    if(!isset($_SESSION['cpf']))
    {   
      include 'conexao.php';
        $login = addslashes($_POST['txt_login']);
        $senha = addslashes($_POST['txt_senha']);
            $sql = mysql_query ("SELECT * FROM consumidor WHERE email = '$login' and senha = md5('$senha')" );
                    if(mysql_num_rows($sql) > 0){
                        $dado = mysql_fetch_assoc($sql);
                        session_start();
                        $_SESSION['cpf'] = $dado['cpf'];
                        header('Location: http://localhost:8080/tcc/NeoTicketWeb/Controls/menu.php');
                    }
                    else{
	                    echo "Usuario ou senha invalidas";
                        }
    }else{
?>
<!DOCTYPE html>
<html lang="pt-br" >
<meta charset="utf-8" />
<head>
    <title>NeoTicket Resumo</title>
    <link rel="stylesheet" href="..\Estilos/Estilo.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.css.map" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.min.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.min.css.map" />
    <link rel="stylesheet" href="..\Estilos/bootstrap-grid.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap-grid.min.css" />
    <link rel="stylesheet" href="..\Estilos/bootstrap.min.css.map" />
</head>

    <form name="form1" method="POST" action="sacola.php">
        <style type="text/css">
        .s1{background-color: #F5F5F5;}
        .s2{background-color: #white;}
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
        <section class="s1">
            <center>
                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Otima(s) Escolha(s)!</h4>
                 <p> Aqui você pode Gerenciar todos os ingressos que deseja comprar 
                </div>
            </center>
        </section> 




            <section class="s2">
            <center>
            <h5>
             Ingresso  &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;           &nbsp;          Indentificação&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;                       Resumo &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;                   Pagamento&nbsp; &nbsp; &nbsp; &nbsp; 
             </h5>
                    <div class="progress" style="max-width: 800px">

                      <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>

                    </div>
            </center>

<br>

<center>
<table class="table" style="max-width: 800px" >
  <thead class="thead-dark" align="center" >
    <tr>
    <th scope="col">Evento</th>
      <th scope="col">Setor</th>
      <th scope="col">Lote</th>
      <th scope="col">Valor</th>
       <th scope="col">Qntd</th>
      <th scope="col">Remover</th>
    </tr>
  </thead>
  <?php 
   include 'conexao.php';
    $cpf = $_SESSION['cpf'];
    $sql2 = mysql_query("select i.nome,e.id_ingresso,e.setor,c.quantidade,c.totalingresso, c.totaltaxa, c.total, e.lote, e.valor from evento as i inner join eventoingresso as e inner join carrinho as c on i.idEvento = e.id_evento and e.id_ingresso = c.id_ingresso and c.cpf = '$cpf'");
 	while($linha = mysql_fetch_assoc($sql2)) {  
    $id = $linha['id_ingresso'];
?>
  <tbody> 
            <td align="center"><?php echo $linha['nome']; ?></td>
            <td align="center"><?php echo $linha['setor']; ?></td>
			<td align="center"><?php echo $linha['lote']; ?></td>
			<td align="center"><?php echo $linha['valor']; ?></td>
			<td align="center"><?php echo $linha['quantidade']; ?></td>
            <td align="center"> <button class="btn btn-danger btn-sm active my-2 my-sm-0" type="submit" onclick="document.form1.action='sacola.php?acao=del&id=<?php echo $linha['id_ingresso'] ?>'">Remover</button></td>        
  </tbody>
</table>
</section>
           
           <button class="btn btn-outline-primary active my-2 my-sm-0" type="submit" onclick="document.form1.action='menu.php'" style="margin-left: 350px;">voltar as compras</button>
        <center>
        <br>
         <div class="alert alert-success" role="alert" >
         <h5 class="alert-heading" style="margin-right: 650px;">Total do(s) Ingresso(s): R$<?php echo $linha['totalingresso'] ?> </h5>
         <h5 class="alert-heading" style="margin-right: 650px;">Taxa de Serviço: R$R$<?php echo $linha['totaltaxa'] ?></h5>
         <h5 class="alert-heading" style="margin-right: 650px;">Total da Compra: R$R$<?php echo $linha['total'] ?></h5>
          <?php 
         } }   
           ?>
          <button class="btn btn-outline-success active my-2 my-sm-0" type="submit" onclick="document.form1.action='pagamento.php'" style="margin-left: 700px;">Continuar</button>  

</center>
</div>
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
</form>
           <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 </html>

    