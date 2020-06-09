<?php 

session_start();
if(!isset($_SESSION['cpf']))
{
include 'conexao.php';
$login = $_POST['txt_login'];
$senha = $_POST['txt_senha'];
session_destroy();
 $sql = mysql_query ("SELECT * FROM consumidor WHERE email = '$login' and senha = md5('$senha')" );
        if(mysql_num_rows($sql) > 0){
        $dado = mysql_fetch_assoc($sql);
        session_start();
        $_SESSION['cpf'] = $dado['cpf'];
        }
          else{
	        echo "Usuario ou senha invalidas";
           
          } 
} else{ 
 
 }              
?>