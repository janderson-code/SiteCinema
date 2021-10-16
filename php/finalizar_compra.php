<?php

include('../config/conexao.php');

$num_sessao = $_GET['id_sessao'];

$num_assento_vendido = $_GET['num_assento'];



$sql_dadosVenda = "SELECT s.id_sessao,s.num_sala,s.horario,s.data_sessao,s.qtd_assento_disp,s.valor_ingresso,f.titulo, f.capa
FROM sessao s
INNER JOIN filmes f ON s.id_filme = f.id
WHERE s.id_sessao = '$num_sessao'";


//Resultado como um conjunto de linhas
$result = mysqli_query($conn, $sql_dadosVenda);

//Busca a Query

$dados_venda = mysqli_fetch_all($result, MYSQLI_ASSOC);


//Limpa a memoria do $result
mysqli_free_result($result);

//Criando Query
$sql = "INSERT INTO vendas(id_sessao,num_assento_vendido)
VALUES('$num_sessao','$num_assento_vendido')";

//Salva no bando de dados
if (mysqli_query($conn, $sql)) {

} else {
    echo 'query error:' . mysqli_error($conn);
}

  //Fechar conexão
  mysqli_close($conn);

?>
<?php include('includes/header.php'); ?>
<h2 class="header center"><img src="../images/cards/checked.png"> Compra finalizada com sucesso </h2>
<h5 class="header center">Este é o seu ingresso Digital</h5>
<div class="row ">
    <?php foreach ($dados_venda as $dados_vendas) : ?>
        <div class="col offset-s4 offset-m4 offset-l5">

            <div class="card ">
                <div class="card light-blue darken-1 center white-text">
                    <div class="card-content">
                        <p><b>Sessão :</b><?= $dados_vendas["id_sessao"] ?></p>
                        <p><b>Filme: </b><?= $dados_vendas["titulo"] ?></p>
                        <p><b>Sala :</b><?= $dados_vendas["num_sala"] ?></p>
                        <p><b>Horario :</b><?= $dados_vendas["horario"] ?></p>
                        <p><b>data :</b><?= $dados_vendas["data_sessao"] ?></p>
                        <p><b>Poltrona:</b><?= $num_assento_vendido ?></p>
                        <p><b>Valor :</b>R$<?= $dados_vendas["valor_ingresso"] ?></p>
                        <div class="center" style="margin-top: 5px;"><img src="../images/cards/codigo-qr.png"></div>
                        <div class="center" style="margin-top: 5px;"><img src="../images/cards/leitor-de-codigos-de-barr.png"></div>

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<p class="header center">Agradecemos sua Preferência por Assistir no JBCINE, Divirta-se </p>
<?php include('includes/footer.php'); ?>
</body>