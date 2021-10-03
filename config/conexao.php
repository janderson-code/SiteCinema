<?php
/* Criando variavel para teste de conexão com phpmyadmin database */
 $conn = mysqli_connect('localhost', 'cinema', '123456', 'JBCine');

if (!$conn) {
	echo 'Erro na conexão' . mysqli_connect_error();
}
?>