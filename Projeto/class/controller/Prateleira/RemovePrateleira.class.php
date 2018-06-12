<?php

class RemovePrateleira {
    public function controller() {
        $posY = $_POST["posY"];
        $posX = $_POST["posX"];
        $consultaPrateleira = ORM::for_table("prateleira")->where(array(
            'andar' => $posX,
            'produtoAndar' => $posY))->find_array();
        $remove = ORM::for_table("produto_prateleira")
            ->where_equal("id_prateleira", $consultaPrateleira[0]["id"])->delete_many();
        $retorno = Remove::removePorId("prateleira", $consultaPrateleira[0]["id"]);
        if($retorno["erro"]) {
            $retorno["msg"] = "Erro na remoção da prateleira";
        } else {
            $retorno["msg"] = "Prateleira removida com sucesso";
        }
        return $retorno;
    }
}

?>
