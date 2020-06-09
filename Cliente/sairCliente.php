<?php 
session_start();
if(!isset($_SESSION['cnpj']))
{
header("location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/loginCliente.html");
exit;
}else{
session_destroy();
header("location: http://localhost:8080/tcc/NeoTicketWeb/Controls/index.php");
}
?>
