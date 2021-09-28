<?php

include('../config/conexao.php');

$erros = array('diaDaSemana' => '', 'data' => '', 'hora' => '');
$diaDaSemana = $data = $hora = '';

$date_regex = '/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/';
$time_regex = '/^([0-9]+):([0-5][0-9])$/';



if (isset($_POST['enviar'])) {

    //VALIDAÇÃO DOS CAMPOS

    //Verifica  Dia
    if (empty($_POST['diaDaSemana'])) {
        $erros['diaDaSemana'] = 'Digite o dia da Semana <br/>';
    } else {
        $diaDaSemana = $_POST['diaDaSemana'];
        if (!preg_match('/[a-zA-Z]/', $diaDaSemana)) {
            $erros['DiaDaSemana'] = 'O nome deve conter somente letras e espaços </br>';
            $diaDaSemana = '';
        }
    }
    //Verifica Data
    if (empty($_POST['data'])) {
        $erros['data'] = 'Campo não pode ser vazio <br/>';
    } else {
        $data = $_POST['data'];
        if (!preg_match($date_regex, $data)) {
            $erros['data'] = 'Formato de data</br>';
            $data = '';
        }
    }
    //Verifica hora
    if (empty($_POST['hora'])) {
        $erros['hora'] = 'Campo não pode ser vazio<br/>';
    } else {
        $hora = $_POST['hora'];
        if (!preg_match($time_regex, $hora)) {
            $erros['hora'] = 'Digite a hora hh:mm:ss corretamente </br>';
            $hora = '';
        }
    }

    //Script de Inserção, SALVANDO NO BDADOS ATRAVES DA PAGINA
    if (array_filter($erros)) {
        echo 'Erro no Formulario';
    } else {
        //echo 'Formulario valido'
        // header('Location: index.php');
        //Limpando de codigos suspeitos
        $id_sessao = mysqli_real_escape_string($conn, $_POST['id_sessao']);
        $diaDaSemana = mysqli_real_escape_string($conn, $_POST['diaDaSemana']);
        $data = mysqli_real_escape_string($conn, $_POST['data']);
        $hora = mysqli_real_escape_string($conn, $_POST['hora']);


        //Criando Query
        $sql = "UPDATE sessao SET diaDaSemana = '$diaDaSemana', data ='$data',hora = '$hora' WHERE id_sessao = '$id_sessao'";

        //Salva no bando de dados
        if (mysqli_query($conn, $sql)) {
            //Sucesso
            header('Location: alterarSessao.php');
        } else {
            echo 'query error:' . mysqli_error($conn);
        }
    }
}
?>

<?php include('includes/header.php'); ?>

<body>
    <header>
        <nav class="nav-extended light-blue darken-2">
            <div class="nav-wrapper ">
                <ul id="nav-mobile" class="right">
                    <li><a href="index.php">Página de Filmes</a></li>
                    <li><a href="cadastrarSessao.php">Cadastrar Sessão</a></li>
                    <li><a href="alterarSessao.php " class="active">Alterar Sessão</a></li>
                    <li><a href="removerSessao.php">Remover Sessão</a></li>
                </ul>
            </div>
            <div class="nav-header center ">
                <h1>JBCine</h1>
            </div>
        </nav>
    </header>

    <div class="row">
        <div class="col s6 offset-s3">
            <div class="card">
                <div class="card-content">
                    <span class="card-title center">Editar Sessão</span>
                    <div class="row">
                        <form class="col s12" method="POST" action="alterarSessao.php" >
                            <!--Input do ID--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="id_sessao" id="id_sessao" type="text" value="<?php echo $id_sessao ?>">
                                    <label for="id_sessao">ID</label>
                                </div>
                            </div>

                            <!--Input do dia--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="diaDaSemana" id="diaDaSemana" type="text" value="<?php echo $diaDaSemana ?>">
                                    <label for="diaDaSemana">Dia</label>
                                    <div class="red-text"><?php echo $erros['diaDaSemana'] . '</br>'; ?></div>
                                </div>
                            </div>

                            <!--Input da data--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="data" id="data" type="date" value="<?php echo $data?>">
                                    <label for="data">Data</label>
                                    <div class="red-text"><?php echo $erros['data'].'</br>'; ?></div>
                                </div>
                            </div>
                            <!--Input da hora--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="hora" name="hora" type="time" value="<?php echo $hora ?>">
                                    <label for="hora">hora</label>
                                    <div class="red-text"><?php echo $erros['hora'].'</br>'; ?></div>
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