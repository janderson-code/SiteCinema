<?php

class model
{

    public function deleteFilme($conexao, $id)
    {
        $query = "DELETE FROM filmes WHERE id = '{$id}'";
        return mysqli_query($conexao, $query);
    }
    public function deleteSessao($conexao, $id)
    {
        $query = "DELETE FROM sessao WHERE id_sessao = '{$id}'";
        return mysqli_query($conexao, $query);
    }


}
