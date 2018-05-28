<?php

class BuscaMapa {
    public function controller(){
        $id = $_POST["id"];
        $tabela = "mapa";
        return Lista::buscaPorId($id, $tabela);
    }
}

?>