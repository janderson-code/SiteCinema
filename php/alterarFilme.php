<?php
session_start();
include_once('../config/conexao.php');

$id_filme =  filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_filme = "SELECT * FROM filmes WHERE id = '$id_filme'";
$resultado_filme = mysqli_query($conn, $result_filme);
$filmes =  mysqli_fetch_assoc($resultado_filme);

//Função para gerar mensagem de alerta
function alert($message)
{
    echo '<script>alert("' . $message . '");</script>';
}
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

        $id= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
        $sinopse = mysqli_real_escape_string($conn, $_POST['sinopse']);
        $genero = mysqli_real_escape_string($conn, $_POST['genero']);
        $capa   =  mysqli_real_escape_string($conn, $_POST['capa']);
        $is_cartaz =  mysqli_real_escape_string($conn, $_POST['is_cartaz']);

        //Criando Query
        $sql = "UPDATE filmes SET titulo ='$titulo',sinopse='$sinopse',genero = '$genero',capa = '$capa', is_cartaz = '$is_cartaz'  WHERE id = '$id'";

        //Salva no bando de dados
        if (mysqli_query($conn, $sql)) {
            //Sucesso
            header("Location: alterarFilme.php?msg=Filme+Alterado+com+sucesso");
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
                                <input name="id" id="id" type="hidden" value="<?php echo $filmes['id']; ?>">
                            </div>
                        </div>

                        <!--Input do Titulo--->
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="titulo" id="titulo" type="text" value="<?php echo $filmes['titulo'] ?>">
                                <label for="titulo">Titulo do Filme</label>
                                <div class="red-text"><?php echo $erros['titulo'] . '</br>'; ?></div>
                            </div>
                        </div>

                        <!--Input da Sinopse--->
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="sinopse" type=text rows="5" cols="33" name="sinopse" class="materialize-textarea" value="<?php echo $filmes["sinopse"] ?>"></input>
                                <label for="sinopse">Sinopse</label>
                                <div class="red-text"><?php echo $erros['sinopse'] . '</br>'; ?></div>
                            </div>
                        </div>
                        <!--Input do Gênero--->
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="genero" name="genero" type="text" value="<?php echo $filmes['genero'] ?>">
                                <label for="genero">Gênero</label>
                                <div class="red-text"><?php echo $erros['genero'] . '</br>'; ?></div>
                            </div>
                        </div>
                        <!--Input da Capa--->
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="capa" name="capa" type="text" value="<?php echo $filmes['capa'] ?> " >
                                <label for="capa">Capa URL</label>
                                <div class="red-text"><?php echo $erros['capa'] . '</br>'; ?></div>
                            </div>
                        </div>
                        <!--Input Cartaz--->
                        <div class="row">
                            <div class="input-field col s12">
                                <input maxlength="1" id="is_cartaz" name="is_cartaz" type="text" value="<?php echo $filmes['is_cartaz'] ?>">
                                <label for="is_cartaz">Em cartaz?</label>
                            </div>
                        </div>
                        <div class="card-action">
                            <a class="btn waves-effect waves-light grey btn " href="mostrarFilmes.php">Cancelar</a>

                            <a class="btn waves-effect waves-light green" onclick="limparForm()" type="button" value="limpar">Limpar
                                <i class="material-icons right">clear</i>
                            </a>

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
<!--script para botão Limpar campos--->
<script>
    function limparForm() {

        const input = document.getElementsByTagName("input");

        for (prop of input) {
            prop.value = "";
        }

    }
</script>
<!--script para gerar mensagem confirmação de alteração--->
<?php if (isset($_GET["msg"])) : ?>
    <script>
        M.toast({
            html: '<?= $_GET["msg"] ?>'
        });
    </script>
<?php endif ?>