<?php

include('../config/conexao.php');

$erros = array('horario' => '', 'dt_sessao' => '', 'qtd_assento_disp' => '', 'valor_ingresso' => '');
$horario  = $dt_sessao = $qtd_assento_disp = $valor_ingresso = '';



$date_regex = '/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/';
$time_regex = '/^([0-9]+):([0-5][0-9])$/';
$float_regex = '/[^0-9(.{2})]/';


//Função para gerar mensagem de alerta
function alert($message)
{
    echo '<script>alert("' . $message . '");</script>';
}


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

    //Verifica Data
    if (empty($_POST['dt_sessao'])) {
        $erros['dt_sessao'] = 'Campo não pode ser vazio <br/>';
    } else {
        $dt_sessao = $_POST['dt_sessao'];
        if (!preg_match($date_regex, $dt_sessao)) {
            $erros['dt_sessao'] = 'Formato de data</br>';
            $dt_sessao = '';
        }
    }

    //  //Verifica  Quantidade de assento
    //  if (empty($_POST['qtd_assento_disp'])) {
    //     $erros['qtd_assento_disp'] = 'Digite o dia da Semana <br/>';
    // } else {
    //     $qtd_assento_disp = $_POST['qtd_assento_disp'];
    //     if (!preg_match('/[^0-9]/', $qtd_assento_disp)) {
    //         $erros['qtd_assento_disp'] = 'Digite numero </br>';
    //         $qtd_assento_disp = '';
    //     }
    // }
    //  //Verifica  Valor Ingresso
    //  if (empty($_POST['valor_ingresso'])) {
    //     $erros['valor_ingresso'] = 'Digite o dia da Semana <br/>';
    // } else {
    //     $valor_ingresso= $_POST['valor_ingresso'];
    //     if (!preg_match($float_regex, $valor_ingresso)) {
    //         $erros['valor_ingresso'] = 'Digite numero </br>';
    //         $valor_ingresso = '';
    //     }
    // }


    //Script de Inserção, SALVANDO NO BDADOS ATRAVES DA PAGINA
    if (array_filter($erros)) {
        echo 'Erro no Formulario';
    } else {
        //echo 'Formulario valido'
        // header('Location: index.php');
        //Limpando de codigos suspeitos
        $idFilme = mysqli_real_escape_string($conn, $_POST['id_filme']);
        $num_sala = mysqli_real_escape_string($conn, $_POST['num_sala']);
        $horario = mysqli_real_escape_string($conn, $_POST['horario']);
        $dt_sessao = mysqli_real_escape_string($conn, $_POST['dt_sessao']);
        $qtd_assento_disp = mysqli_real_escape_string($conn, $_POST['qtd_assento_disp']);
        $valor_ingresso = mysqli_real_escape_string($conn, $_POST['valor_ingresso']);



        //Criando Query
        $sql = "INSERT INTO sessao(id_filme,num_sala,horario,data_sessao,qtd_assento_disp,valor_ingresso) VALUES('$idFilme','$num_sala','$horario','$dt_sessao','$qtd_assento_disp','$valor_ingresso')";

        //Salva no bando de dados
        if (mysqli_query($conn, $sql)) {
            //Sucesso
            header('Location: cadastrarSessao.php?msg=Sessão+cadastrada+com+sucesso');
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
                <span class="card-title center">Cadastrar Sessão</span>
                <div class="row">
                    <form class="col s12" method="POST" action="cadastrarSessao.php">
                        <!--Input do ID Filme--->
                        <div class="row">
                            <div class="input-field col s12">
                            <!---datalist com código para gerar combobox dos valores no banco ---->
                                <datalist name="id_filme" id="id_filme">
                                    <option></option>
                                    <?php
                                    $result = "SELECT id FROM filmes";
                                    $resultado = mysqli_query($conn, $result);

                                    while ($row = mysqli_fetch_assoc($resultado)) {
                                        echo '<option value="' . $row['id'] . '"> ' . $row['id'] . ' </option>';
                                    }
                                    ?>
                                </datalist>
                                <input name="id_filme" id="id_filme" type="text" list="id_filme" value="<?php echo $idFilme ?>">
                                <label for="id_filme">ID do filme</label>
                            </div>
                        </div>
                        <!--Input do Numero da sala--->
                        <div class="row">
                            <div class="input-field col s12">
                            <!---datalist com código para gerar combobox dos valores no banco ---->
                            <datalist name="num_sala" id="num_sala">
                                    <option></option>
                                    <?php
                                    $result = "SELECT num_sala FROM sala";
                                    $resultado = mysqli_query($conn, $result);

                                    while ($row = mysqli_fetch_assoc($resultado)) {
                                        echo '<option value="' . $row['num_sala'] . '"> ' . $row['num_sala'] . ' </option>';
                                    }
                                    ?>
                                </datalist>                                                  
                                <input name="num_sala" id="num_sala" type="text" list = "num_sala" value="<?php echo $num_sala ?>">
                                <label for="num_sala">Numero da sala</label>
                            </div>
                        </div>
                        <!--Input da hora--->
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="horario" name="horario" type="time" value="<?php echo $horario ?>">
                                <label for="horario">Horário</label>
                                <div class="red-text"><?php echo $erros['horario'] . '</br>'; ?></div>
                            </div>
                        </div>
                        <!--Input da data--->
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="dt_sessao" id="dt_sessao" type="date" value="<?php echo $dt_sessao ?>">
                                <label for="dt_sessao">Data</label>
                                <div class="red-text"><?php echo $erros['dt_sessao'] . '</br>'; ?></div>
                            </div>
                        </div>
                        <!--Input Assento disponiveis--->
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="qtd_assento_disp" id="qtd_assento_disp" type="number" step="0.1" value="<?php echo $qtd_assento_disp ?>">
                                <label for="qtd_assento_disp">Quantidade de Assentos Disponiveis</label>
                            </div>
                        </div>
                        <!--Input Valor do Ingresso--->
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="valor_ingresso" id="valor_ingresso" type="number" step="0.1" value="<?php echo $valor_ingresso ?>">
                                <label for="valor_ingresso">Valor do Ingresso</label>
                            </div>
                        </div>
                        <div class="card-action">
                            <a class="btn waves-effect waves-light grey btn " href="mostrar_Sessao.php">Cancelar</a>
                            <button class="btn waves-effect waves-light green " type="reset" name="action">Limpar
                                <i class="material-icons right">send</i>
                            </button>
                            <button class="btn waves-effect waves-light light-blue darken-2" value="enviar" type="submit" name="enviar">Cadastrar
                                <i class="material-icons right">send</i>
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
<!--script para gerar alerta após submit Linha 97--->
<?php if (isset($_GET["msg"])) : ?>
    <script>
        M.toast({
            html: '<?= $_GET["msg"] ?>'
        });
    </script>
<?php endif ?>