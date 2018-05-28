<?php

class ListaMapa {

    public function controller() {
        try {
            $tabela = "mapa";
            $join = false;
            $colunas = array("id",
                             "altura", 
                             "largura");
            $template = "Mapa";
            
            return Lista::criarTabelaPessoa($tabela, $join, $colunas, $template);
        } catch (Exception $ex) {
            $retorno["erro"] = true;
            $retorno["msg"] = "Erro no Mapa";
        }
        return $retorno;
    }

}

?>