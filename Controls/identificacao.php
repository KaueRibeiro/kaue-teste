<?php 
session_start();
if(!isset($_SESSION['cpf']))
{
?>
<!DOCTYPE html>

<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
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
</head>

<body>
    <form name="form2" method="POST" action="http://localhost:8080/tcc/NeoTicketWeb/Controls/resumo.php" />
    <main>

        <section>
            <form>
                <center>
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                             <img src="..\Imagens\logo.jpeg" class="card-img-top" alt="...">
                          
                        </div>
                            <div class="card-footer">
                                
                                <p class="card-text">Email:</p>
                                <p><input type="email" class="form-control" name="txt_login" aria-describedby="emailHelp"> </p>
                                <p class="card-text">Senha:</p>
                                <input type="password" class="form-control" name="txt_senha">
                                <br />
                                 <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="document.form1.action='http://localhost:8080/tcc/NeoTicketWeb/Controls/resumo.php'">Entrar</button>
                               <a href="http://localhost:8080/tcc/NeoTicketWeb/Views/cadastro.html">N�o tem conta?<strong>Cadastra-se!!!</strong></a>
                            
                            </div>
               </div>
                </center>
                

            </form>

        </section>
    </main>
</body>

</html>

<?php 
}else{

 header("location: http://localhost:8080/tcc/NeoTicketWeb/Controls/resumo.php");

}
?>
