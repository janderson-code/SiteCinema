<?php
include('model.php');
include ('../../config/conexao.php');

$id = $_GET['id'];

(new model())->deleteFilme($conn, $id);

