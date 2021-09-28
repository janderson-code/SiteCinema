<?php include('includes/header.php'); ?>

<?php
include('../config/conexao.php');

//Query de busca
$sql = 'SELECT id ,titulo ,sinopse, genero, capa FROM filmes Order BY titulo';

//Resultado como um conjunto de linhas
$result = mysqli_query($conn, $sql);

//Busca a Query

$filmes = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Limpa a memoria do $result
mysqli_free_result($result);

//fecha conexão
mysqli_close($conn);

?>

<body>
    <header>
        <nav class="nav-extended light-blue darken-2">
            <div class="nav-wrapper ">
                <ul id="nav-mobile" class="right">
                    <li><a href="index.php" class ="active">Pagina de Filmes</a></li>
                    <li><a href="cadastrarFilme.php" >Cadastrar Filme</a></li>
                    <li><a href="cadastrarSessao.php" >Cadastrar Sessão</a></li>
            </div>
            <div class="nav-header center ">
                <h1>JBCine</h1>
            </div>
            <div class="nav-content">
                <ul class="tabs tabs-transparent  blue-grey darken-4">
                    <li class="tab "><a href="index.php" class ="active">Home</a></li>
                    <li class="tab"><a  href="cartaz.php">Em cartaz</a></li>
                    <li class="tab"><a href="precoSessao.php">Preços</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <section class="galeria">
            <div class="fotos">
                <img src="../images/carrosel/item01.jpg" alt="">
                <img src="../images/carrosel/item02.png" alt="">
                <img src="../images/carrosel/item03.png" alt="">
                <img src="../images/carrosel/item04.jpg" alt="">
                <img src="../images/carrosel/item01.jpg" alt="">
            </div>
        </section>
        <div class="row">
            <?php foreach($filmes as $filme){?>
            <!---CARD COM IMAGENS -->
            <div class="col s3">
                <div class="card hoverable">
                    <div class="card-image">
                        <img class="card-img" src="<?=$filme["capa"]?>" alt="Venom capa" />
                    </div>
                    <div class="card-content">
                        <p class="valign-wrapper"><i class="material-icons amber-text">star</i>9,5</p>
                        <span class="card-title"><?=$filme["titulo"]?></span>
                        <p><?=$filme["sinopse"]?>.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">Comprar</a>
                    </div>
                </div>
            </div>
        <?php } ?>
            <!-- <div class="col s3">
                <div class="card hoverable">
                    <div class="card-image">
                        <img class="card-img" src="https://www.themoviedb.org/t/p/original/9cH7ZjFbZ3JQCQ8LfoFeze3259m.jpg" alt="Abelha Maya capa" />
                    </div>
                    <div class="card-content">
                        <p class="valign-wrapper"><i class="material-icons amber-text">star</i>9,5</p>
                        <span class="card-title">Abelinha Maya</span>
                        <p>Quando Maya, uma abelhinha teimosa, e seu melhor amigo Willi resgatam uma formiga princesa, eles se encontram no meio de uma batalha épica de insetos que os levará a estranhos mundos e testará sua amizade até o limite.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
        </div> -->
    </main>
    <?php include('includes/footer.php'); ?>
</body>
</html>