<?php
include 'conexao.php';

$evento = $_POST ["cmb_nome"];
$produto = $_POST ["cmb_produto"];
$preco = $_POST ["txt_preco"];
$quantidade = $_POST ["txt_quant"];


$sql = mysql_query ("SELECT * FROM eventoproduto WHERE id_evento = '$evento' and id_produto = '$produto'" );
	if(mysql_num_rows($sql) > 0){
		echo "<center>";
		echo "<hr>";
		echo "Produto ja cadastrado para esse Evento";
		echo "<hr>";
		echo "<br>";
		echo "<a href=\"login.html\"> RETORNAR AO LOGIN </a>";
	} else {
		$sql = mysql_query ("INSERT INTO eventoproduto(id_evento,id_produto,preco, quantidade) VALUES ('$evento', '$produto','$preco','$quantidade')");
		echo "<center>";
		echo "<hr>";
		echo "Produto adicionado na cardapio";
		echo "<hr>";
		echo "<br>";
		echo "<a href = \"menu.html\">RETORNAR AO LOGIN </a>";
	}
?>