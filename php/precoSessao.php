<?php

  include "includes/precos.php";
  include "includes/header.php";
?>

<body>
    <header>
        <nav class="nav-extended light-blue darken-2">
            <div class="nav-wrapper ">
                <ul id="nav-mobile" class="right">
                    <li><a href="index.php" class="">Página de Filmes</a></li>
                    <li><a href="alterarFilme.php">Alterar Filmes</a></li>
                    <li><a href="removerFilme.php">Remover Filmes</a></li>
                </ul>
            </div>
            <div class="nav-header center ">
                <h1>JBCine</h1>
            </div>
            <div class="nav-content">
                <ul class="tabs tabs-transparent  blue-grey darken-4">
                    <li class="tab"><a href="index.php">Home</a></li>
                    <li class="tab"><a  href="cartaz.php">Em cartaz</a></li>
                    <li class="tab"><a href="precoSessao.php" class ="active">Preços</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="row">
      <h3>Preços</h3>
      <div class="flex collection grey darken-2 white-text">
        <ul>
          <?php foreach ($prices as $type => $price): ?>
            <li><?=$type?> : <?=number_format($price, 2, ",", " ")?> R$;</li>
          <?php endforeach; ?>
        </ul>
        <ul>
          <?php foreach ($subscriptions as $type => $reduction): ?>
            <li><?=$type?> : <?=$reduction?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <p>
      Taxa reduzida para maiores de 60 anos e menores de 16 anos<br>
      Taxa para crianças menores de 14 anos
      </p>

      <h4 class="center">Tabela de preços de acordo com sua Idade</h4>

      <table class="centered grey darken-2 white-text col s6 offset-m3">
        <thead>
          <th>Idade</th>
          <th>Preço Unitário</th>
          <th>Reserva de 5 Lugares</th>
        </thead>
        <tbody>
          <?php for ($age = 1; $age <= 99; $age++):
          
            // Preços por restrição de idade
            if ($age < 14) { 
              $price = $prices['Preço Infantil'];
            } elseif ($age < 16 || $age > 60) {
              $price = $prices['Preço Reduzido'];
            } else {
              $price = $prices['Preço Total'];
            }

            // preço por 5 Reservas
            $priceFive = 5 * $price;

            // Desconto
            if ($age < 25) {
              $priceFive *= .8;
            } else {
              $priceFive *= .9;
            }
            ?>

            <tr>
              <td><?=$age?> anos</td>
              <td><?=number_format($price, 2, ",", " ")?> R$</td>
              <td><?=number_format($priceFive, 2, ",", " ")?> R$</td>
            </tr>
          <?php endfor; ?>
        </tbody>
      </table>
    </div>
<?php include "includes/footer.php"?>