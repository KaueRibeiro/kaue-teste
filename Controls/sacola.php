<?php

session_start();
 
if(!isset($_SESSION['cpf']))
{
    header("location: http://localhost:8080/tcc/NeoTicketWeb/Controls/identificacao.php");
}else{
     $cpf= $_SESSION['cpf'];
     $id = $_GET['id'];
     $qtd = $_POST['quantidade'];
     $valor = $_GET['val'];
     $acao = $_GET['acao'];
    
    include 'conexao.php';
        if($acao == 'add'){
            $sql= mysql_query("SELECT * FROM carrinho WHERE id_ingresso = $id AND cpf = '$cpf'");
                if(mysql_num_rows($sql) > 0){
                    header("location: http://localhost:8080/tcc/NeoTicketWeb/Controls/resumo.php");
                    
                }else{
                $totalingresso = $valor * $qtd;
                $totaltaxa = $totalingresso * 0.1;
                $total = $totalingresso + $totaltaxa;
                 echo "$totalingresso";
                     $sql2= mysql_query("insert into carrinho(id_ingresso, cpf, quantidade, totalingresso, totaltaxa, total) values ($id,'$cpf',$qtd,$totalingresso,$totaltaxa,$total)");
                    header("location: http://localhost:8080/tcc/NeoTicketWeb/Controls/resumo.php");

                }} else{
                     $sql = mysql_query("delete  from carrinho where id_ingresso = '$id' and cpf ='$cpf'");
                        
                      header("location: http://localhost:8080/tcc/NeoTicketWeb/Controls/resumo.php");

                        }
                             }
  
?>