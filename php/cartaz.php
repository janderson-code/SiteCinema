<?php

// set date
$date = date('d/m/Y');


include('../config/conexao.php');

//Query de busca
$sql = 'SELECT  f.titulo, s.data,s.hora, g.num_sala FROM filmes f, sessao s ,tb_sala g
        WHERE  f.id= g.id_filme AND s.id_sessao = g.id_sessao
        Order BY f.titulo';


//Resultado como um conjunto de linhas
$result = mysqli_query($conn, $sql);


//Busca a Query

$filmes = mysqli_fetch_all($result, MYSQLI_ASSOC);


//Limpa a memoria do $result
mysqli_free_result($result);


//fecha conexão
mysqli_close($conn);



?>
<?php include('includes/header.php'); ?>

<body>
    <header>
        <nav class="nav-extended light-blue darken-2">
            <div class="nav-wrapper ">
                <ul id="nav-mobile" class="right">
                    <li><a href="index.php" class="">Página de Filmes</a></li>
                    <li><a href="alterarFilme.php" >Alterar Filmes</a></li>
                    <li><a href="removerFilme.php">Remover Filmes</a></li>
                </ul>
            </div>
            <div class="nav-header center ">
                <h1>JBCine</h1>
            </div>
            <div class="nav-content">
                <ul class="tabs tabs-transparent  blue-grey darken-4">
                    <li class="tab"><a href="index.php">Home</a></li>
                    <li class="tab"><a  href="cartaz.php" class ="active">Em cartaz</a></li>
                    <li class="tab"><a href="precoSessao.php">Preços</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <section>
        <h2>EM CARTAZ</h2>
        <h5><?= $date ?></h5>
        <table>
            <thead>
                <tr>
                    <th>Titulo
                    <th> Data
                    <th> Horário
                    <th>Sala
                </tr>
            </thead>
            <tbody>
                <?php
                // browse each movie
                for ($i = 0; $i < count($filmes); $i++) : ?>
                    <tr>
                        <th><?= $filmes[$i]["titulo"] ?></th>
                        <th><?= $filmes[$i]["data"] ?></th>
                        <th><?= $filmes[$i]["hora"] ?></th>
                        <th><?= $filmes[$i]["num_sala"] ?></th>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </section>

    <?php include "includes/footer.php"; ?>