<?php

include('../config/conexao.php');


$erros = array('titulo' => '', 'sinopse' => '', 'genero' => '', 'capa' => '');
$titulo = $sinopse = $genero = $capa = '';

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

    //Script de Inserção, SALVANDO NO BDADOS ATRAVES DA PAGINA

    if (array_filter($erros)) {
        echo 'Erro no Formulario';
    } else {
        //echo 'Formulario valido'
        // header('Location: index.php');
        //Limpando de codigos suspeitos
        $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
       

        //Criando Query
        $sql = "DELETE FROM filmes where titulo = '$titulo'";

        //Salva no bando de dados
        if (mysqli_query($conn, $sql)) {
            //Sucesso
            header('Location: removerFilme.php');
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
                    <span class="card-title center">Remover Filme</span>
                    <div class="row">
                        <form class="col s12" method="POST" action="removerFilme.php">
                            <!--Input do Titulo--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="titulo" id="titulo" type="text" value="<?php echo $titulo ?>">
                                    <label for="titulo">Titulo do Filme</label>
                                    <div class="red-text"><?php echo $erros['titulo'] . '</br>'; ?></div>
                                </div>
                            </div>
                            <div class="card-action">
                                <a class="btn waves-effect waves-light grey btn " href="index.php">Cancelar</a>
                                <button class="btn waves-effect waves-light green " type="reset" name="action">Limpar
                                    <i class="material-icons right">send</i>
                                </button>
                                <button class="btn waves-effect waves-light red" value="enviar" type="submit" name="enviar">Remover
                                    <i class="material-icons right">delete</i>
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