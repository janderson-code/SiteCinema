<?php

include('../config/conexao.php');

$id_sessao =  filter_input(INPUT_GET, 'id_sessao', FILTER_SANITIZE_NUMBER_INT);
$result_sessao = "SELECT * FROM sessao WHERE id_sessao = '$id_sessao'";
$resultado_sessao = mysqli_query($conn, $result_sessao);
$sessoes=  mysqli_fetch_assoc($resultado_sessao);

//Função para gerar mensagem de alerta
function alert($message)
{
    echo '<script>alert("' . $message . '");</script>';
}

$erros = array('horario' => '','dt_sessao' => '','qtd_assento_disp' => '','valor_ingresso' => '');
$horario  = $dt_sessao = $qtd_assento_disp = $valor_ingresso = '';

$date_regex = '/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/';
$time_regex = '/^([0-9]+):([0-5][0-9])$/';
$float_regex = '/[^0-9(.{2})]/';


if (isset($_POST['enviar'])) {

    //VALIDAÇÃO DOS CAMPOS

    //Verifica hora
    if (empty($_POST['horario'])) {
        $erros['horario'] = 'Campo não pode ser vazio<br/>';
    } else {
        $horario = $_POST['horario'];
        if (!preg_match($time_regex, $horario)) {
            $erros['horario'] = 'Digite a hora hh:mm:ss corretamente </br>';
            $horario = '';
        }
    }


    //Script de Inserção, SALVANDO NO BDADOS ATRAVES DA PAGINA
    if (array_filter($erros)) {
        echo 'Erro no Formulario';
    } else {
        //echo 'Formulario valido'
        // header('Location: index.php');
        //Limpando de codigos suspeitos
        $id_sessao = filter_input(INPUT_POST, 'id_sessao', FILTER_SANITIZE_STRING);
        $id_Filme = mysqli_real_escape_string($conn, $_POST['id_filme']);
        $num_sala = mysqli_real_escape_string($conn, $_POST['num_sala']);
        $horario = mysqli_real_escape_string($conn, $_POST['horario']);
        $dt_sessao = mysqli_real_escape_string($conn, $_POST['dt_sessao']);
        $qtd_assento_disp = mysqli_real_escape_string($conn, $_POST['qtd_assento_disp']);
        $valor_ingresso = mysqli_real_escape_string($conn, $_POST['valor_ingresso']);
        


        //Criando Query
        $sql = "UPDATE sessao SET id_filme = '$id_Filme', num_sala ='$num_sala', horario = '$horario',data_sessao = '$dt_sessao',qtd_assento_disp = '$qtd_assento_disp',valor_ingresso = '$valor_ingresso' WHERE id_sessao = '$id_sessao'";

        //Salva no bando de dados
        if (mysqli_query($conn, $sql)) {
            //Sucesso
            header('Location: alterarSessao.php?msg=Sessão+Alterada+com+sucesso")');
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
                    <span class="card-title center">Editar Sessão</span>
                    <div class="row">
                        <form class="col s12" method="POST" action="alterarSessao.php">
                            <!--Input do ID--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="id_sessao" id="id_sessao" type="hidden" value="<?php echo $sessoes['id_sessao'] ?>">
                                </div>
                            </div>
                            <!--Input do ID Filme--->
                                <div class="row">
                                <div class="input-field col s12">
                                    <input name="id_filme" id="id_filme" type="text" value="<?php echo $sessoes['id_filme']?>"required>
                                    <label for="id_filme">ID do filme</label>
                                </div>
                            </div>
                            <!--Input do Numero da sala--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="num_sala" id="num_sala" type="number" value="<?php echo $sessoes['num_sala']?>"required>
                                    <label for="num_sala">Numero da sala</label>
                                </div>
                            </div>
                            <!--Input da hora--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="horario" name="horario" type="time" value="<?php echo $sessoes['horario'] ?>"required>
                                    <label for="horario">Horário</label>
                                    <div class="red-text"><?php echo $erros['horario'].'</br>'; ?></div>
                                </div>
                            </div>
                            <!--Input da data--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="dt_sessao" id="dt_sessao" type="date" value="<?php echo $sessoes['data_sessao']?>"required>
                                    <label for="dt_sessao">Data</label>
                                    <div class="red-text"><?php echo $erros['dt_sessao'].'</br>'; ?></div>
                                </div>
                            </div>
                            <!--Input Assento disponiveis--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="qtd_assento_disp" id="qtd_assento_disp" type="number"step="0.1" value="<?php echo $sessoes['qtd_assento_disp']?>">
                                    <label for="qtd_assento_disp">Quantidade de assentos Disponiveis</label>
                                </div>
                            </div>
                             <!--Input Valor do Ingresso--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="valor_ingresso" id="valor_ingresso" type ="number" step="0.1" value="<?php echo $sessoes['valor_ingresso'] ?>">
                                    <label for="valor_ingresso">Valor do Ingresso</label>
                                </div>
                            </div>                           
                            <div class="card-action">
                                <a class="btn waves-effect waves-light grey btn " href="index.php">Cancelar</a>
                                <a class="btn waves-effect waves-light green" onclick="limparForm()" type="button" value="limpar">Limpar
                                    <i class="material-icons right">clear</i>
                                </a>
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