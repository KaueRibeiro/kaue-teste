<?php 
session_start();
if(!isset($_SESSION['cpf']))
{
header("location: http://localhost:8080/tcc/NeoTicketWeb/Views/login.html");
exit;
}else{
session_destroy();
header("location: http://localhost:8080/tcc/NeoTicketWeb/index.php");
}
?>
