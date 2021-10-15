<?php

	include('../config/conexao.php');

    $numero = $_GET['id_sessao'];

    $num_sala = $_GET['num_sala'];

    $sql_qtdAssentos = "SELECT qtd_assento_disp FROM sessao WHERE num_sala = '$num_sala'";

    //Armazena os resultados da buscar
    $resultado_qtdAssentos = mysqli_query($conn,$sql_qtdAssentos);
  
    //Pega os resultados e coloca em um vetor
    $row_qtdAssentos = mysqli_fetch_assoc($resultado_qtdAssentos);

    $qtdAssentos = $row_qtdAssentos['qtd_assento_disp'];

    //Limpa o resultado da buscar
    mysqli_free_result($resultado_qtdAssentos);

    $sql_assentosVendidos = "SELECT num_assento_vendido FROM vendas WHERE id_sessao = '$numero'";

    //Armazena os resultados da buscar
    $resultado_assentosVendidos = mysqli_query($conn,$sql_assentosVendidos);

    //Pega os resultados e coloca em um vetor
    while ($assentosVendidos = mysqli_fetch_array($resultado_assentosVendidos,MYSQLI_ASSOC)){
        $assentos_ocupados[] = $assentosVendidos['num_assento_vendido'];
    }

    //Limpa o resultado da buscar
    mysqli_free_result($resultado_assentosVendidos);
    
    //Fechar conexão
    mysqli_close($conn);
	
?>

<!DOCTYPE html>
<html>
	<?php include('includes/header.php')?>

    <style>
        .board-blue{
            
            border-radius: 5px;
            width: 20%;
            margin: 0 auto;
            padding: 20px;
            color: #fff;
            margin-top: 50px;

        }
        .board-gray{
          
            border-radius: 5px;
            width: 20%;
            margin: 0 auto;
            margin-top: 7px;
            padding: 20px;
            background: #aaa;
            color: #fff;
        }
        .center{
            justify-content: space-between;

        }
	</style>
	
    <div class="container padding">
        <div class="card-panel">
            <h5 class="center-align">Escolha uma cadeira disponível para <b>Sessão <?php echo $numero?></b></h5>
            
            <div class="center padding" style="margin-top: 10px;">

                <?php for ($i=1; $i < $qtdAssentos+1; $i++){?>

                    <?php if (in_array($i, $assentos_ocupados)){?>
                       
                        <input type="submit" name="sim" value="<?php echo $i?>" class="  waves-effect waves-light btn padding margin grey darken-1">
                       
                    <?php } else {?>
                        <a href="dados_venda.php?num_assento=<?php echo $i?>&id_sessao=<?php echo $numero?>">
                            <input type="submit" name="sim" value="<?php echo $i?>" class=" white-text waves-effect waves-light btn padding margin light-blue darken-2 " >
                        </a>
                    <?php } ?>

                <?php } ?>

                <div class="board-blue light-blue darken-2">
                    Disponível
                </div>
                <div class="board-gray grey darken-1">
                    Indisponível
                </div>

            </div>

        </div>
    </div>	    

	<?php include('includes/footer.php')?>
</html>