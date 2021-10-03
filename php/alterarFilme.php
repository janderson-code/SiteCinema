<?php

include('../config/conexao.php');


$erros = array('titulo' => '', 'sinopse' => '', 'genero' => '', 'capa' => '');
$titulo = $sinopse = $genero = $capa = $is_cartaz ='';

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
        //echo 'Formulario valido'
        // header('Location: index.php');
        //Limpando de codigos suspeitos
        $idFilme = mysqli_real_escape_string($conn, $_POST['idFilme']);
        $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
        $sinopse = mysqli_real_escape_string($conn, $_POST['sinopse']);
        $genero = mysqli_real_escape_string($conn, $_POST['genero']);
        $capa   =  mysqli_real_escape_string($conn, $_POST['capa']);
        $is_cartaz =  mysqli_real_escape_string($conn, $_POST['is_cartaz']);

        //Criando Query
        $sql = "UPDATE filmes SET titulo ='$titulo',sinopse='$sinopse',genero = '$genero',capa = '$capa', is_cartaz = '$is_cartaz'  WHERE id = '$idFilme'" ;
        //Salva no bando de dados
        if (mysqli_query($conn, $sql)) {
            //Sucesso
            header('Location: alterarFilme.php');
        } else {
            echo 'query error:' . mysqli_error($conn);
        }
    }
}
?>
<?php include('includes/header.php'); ?>
    <div class="row">
        <div class="col s6 offset-s3">
            <div class="card">
                <div class="card-content">
                    <span class="card-title center">Alterar Filme</span>
                    <div class="row">
                        <form class="col s12" method="POST" action="alterarFilme.php">
                            <!--Input do ID--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="idFilme" id="idFilme" type="text" value="<?php echo $idFilme ?>">
                                    <label for="idFilme">ID</label>
                                </div>
                            </div>

                            <!--Input do Titulo--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="titulo" id="titulo" type="text" value="<?php echo $titulo ?>">
                                    <label for="titulo">Titulo do Filme</label>
                                    <div class="red-text"><?php echo $erros['titulo'] . '</br>'; ?></div>
                                </div>
                            </div>

                            <!--Input da Sinopse--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="sinopse" name="sinopse" class="materialize-textarea" value="<?php echo $sinopse ?>"></textarea>
                                    <label for="sinopse">Sinopse</label>
                                    <div class="red-text"><?php echo $erros['sinopse'] . '</br>'; ?></div>
                                </div>
                            </div>
                            <!--Input do Gênero--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="genero" name="genero" type="text" value="<?php echo $genero ?>">
                                    <label for="genero">Gênero</label>
                                    <div class="red-text"><?php echo $erros['genero'] . '</br>'; ?></div>
                                </div>
                            </div>
                            <!--Input da Capa--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="capa" name="capa" type="text" value="<?php echo $capa ?> " maxlength = "1">
                                    <label for="capa">Capa URL</label>
                                    <div class="red-text"><?php echo $erros['capa'] . '</br>'; ?></div>
                                </div>
                            </div>
                             <!--Input Cartaz--->
                             <div class="row">
                                <div class="input-field col s12">
                                    <input id="is_cartaz" name="is_cartaz" type="text" value="<?php echo $is_cartaz ?>">
                                    <label for="is_cartaz">Em cartaz?</label>
                                </div>
                            </div>
                            <div class="card-action">
                                <a class="btn waves-effect waves-light grey btn " href="index.php">Cancelar</a>
                                <button class="btn waves-effect waves-light green " type="reset" name="action">Limpar
                                    <i class="material-icons right">send</i>
                                </button>
                                <button class="btn waves-effect waves-light light-blue darken-2" value="enviar" type="submit" name="enviar">Alterar
                                    <i class="material-icons right">mode_edit</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</body>