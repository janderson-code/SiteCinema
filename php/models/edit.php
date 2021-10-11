<?php

include('../../config/conexao.php');

// $id_filme = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
// $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
// $sinopse = filter_input(INPUT_POST, 'sinopse', FILTER_SANITIZE_STRING);
// $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
// $capa= filter_input(INPUT_POST, 'capa', FILTER_SANITIZE_STRING);
// $is_cartaz = filter_input(INPUT_POST, 'is_cartaz', FILTER_SANITIZE_STRING);

// $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
// $sinopse = mysqli_real_escape_string($conn, $_POST['sinopse']);
// $genero = mysqli_real_escape_string($conn, $_POST['genero']);
// $capa   =  mysqli_real_escape_string($conn, $_POST['capa']);
// $is_cartaz =  mysqli_real_escape_string($conn, $_POST['is_cartaz']);



// $sql = "UPDATE filmes SET titulo ='$titulo',sinopse='$sinopse',genero = '$genero',capa = '$capa', is_cartaz = '$is_cartaz' WHERE id = '$id_filme'";


// //Salva no bando de dados

// if (mysqli_query($conn, $sql)) {
//     //Sucesso
//     header("Location:../alterarFilme.php?msg=Filme+Alterado+com+sucesso");


// } else {
//     echo 'query error:' . mysqli_error($conn);

// }
$erros = array('titulo' => '', 'sinopse' => '', 'genero' => '', 'capa' => '');
$titulo = $sinopse = $genero = $capa = $is_cartaz = '';

if (isset($_POST['enviar'])) {

    //VALIDAÇÃO DOS CAMPOS

    //Verifica titulo do filme
    if (empty($_POST['titulo'])) {
        $erros['titulo'] = 'O nome do filme é obrigatório <br/>';
    } else {
        $titulo = $_POST['titulo'];
        if (!preg_match('/[a-zA-Z]/', $titulo)) {
            $erros['titulo'] = 'O nome deve conter somente letras e espaços </br>';
            $titulo = '';
        }
    }

    //Verifica sinopse
    if (empty($_POST['sinopse'])) {
        $erros['sinopse'] = 'Digite a sinopse do filme <br/>';
    } else {
        $sinopse = $_POST['sinopse'];
        if (!preg_match('/[a-zA-Z]/', $sinopse)) {
            $erros['sinopse'] = 'O nome deve conter somente letras e espaços </br>';
            $sinopse = '';
        }
    }

    //Verifica genero
    if (empty($_POST['genero'])) {
        $erros['genero'] = 'Deve conter ao menos um gênero<br/>';
    } else {
        $genero = $_POST['genero'];
        if (!preg_match('/[a-zA-Z]/', $genero)) {
            $erros['genero'] = 'O nome deve conter somente letras e espaços </br>';
            $genero = '';
        }
    }
    //Verifica capa
    if (empty($_POST['capa'])) {
        $erros['capa'] = 'Digite a URL da capa <br/>';
    } else {
        $capa = $_POST['capa'];
        if (!preg_match('/[a-zA-Z]/', $capa)) {
            $erros['capa'] = 'A url deve conter somente letras e espaços </br>';
            $capa = '';
        }
    }
    //Script de Inserção, SALVANDO NO BDADOS ATRAVES DA PAGINA

    if (array_filter($erros)) {
        echo 'Erro no Formulario';
    } else {
        $id_filme = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
        $sinopse = filter_input(INPUT_POST, 'sinopse', FILTER_SANITIZE_STRING);
        $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
        $capa = filter_input(INPUT_POST, 'capa', FILTER_SANITIZE_STRING);
        $is_cartaz = filter_input(INPUT_POST, 'is_cartaz', FILTER_SANITIZE_STRING);
        //Criando Query
        $sql = "UPDATE filmes SET titulo ='$titulo',sinopse='$sinopse',genero = '$genero',capa = '$capa', is_cartaz = '$is_cartaz'  WHERE id = '$id_filme'";
        //Salva no bando de dados
        if (mysqli_query($conn, $sql)) {
            //Sucesso
            header("Location: ../alterarFilme.php?msg=Filme+Alterado+com+sucesso");
        } else {
            echo 'query error:' . mysqli_error($conn);
        }
    }
}
