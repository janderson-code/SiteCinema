<?php
include('model.php');
include ('../../config/conexao.php');

$id= $_GET['id_sessao'];

(new model())->deleteSessao($conn, $id);



