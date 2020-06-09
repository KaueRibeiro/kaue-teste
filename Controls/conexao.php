<?php
$servidor="neoticketdb.cbm7umw9cjei.sa-east-1.rds.amazonaws.com";
$usuario="awskaue";
$senha="22692155";
$banco="neoticketDB";
$conecta_db=mysql_connect($servidor, $usuario, $senha) or die (mysql_error());
mysql_select_db($banco) or die ("Erro_conexao");
?>