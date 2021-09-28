<?php include('header.php'); ?>

<body>
    <header>
        <nav class="nav-extended light-blue darken-2">
            <div class="nav-wrapper ">
                <ul id="nav-mobile" class="right">
                    <li><a href="index.php" class="">Página Inicial</a></li>
                    <li><a href="cadastrar.php" class="active">Cadastrar Filme</a></li>
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
                    <span class="card-title center">Cadastrar Filme</span>
                    <div class="row">
                        <form class="col s12" method="POST">

                            <!--Input do Titulo--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="titulo" id="titulo" type="text" class="validate" required>
                                    <label for="titulo">Titulo do Filme</label>
                                </div>
                            </div>

                            <!--Input da Sinopse--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="sinopse" class="materialize-textarea"></textarea>
                                    <label for="sinopse">Sinopse</label>
                                </div>
                            </div>
                            <!--Input do Gênero--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="genero" type="text">
                                    <label for="genero">Gênero</label>
                                </div>
                            </div>
                            <!--Input da Capa--->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="capa" type="text">
                                    <label for="capa">Capa URL</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-action">
                    <a class="btn waves-effect waves-light grey btn " href="index.php">Cancelar</a>
                    <a href="#" class="waves-effect waves-light btn light-blue darken-2">Cadastrar</a>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>