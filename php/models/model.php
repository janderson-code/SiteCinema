<?php

class model
{

    public function deleteFilme($conexao, $id)
    {
        $query = "DELETE FROM filmes WHERE id = '{$id}'";
        return mysqli_query($conexao, $query);
    }


}
