<?php

class RemovePrateleira {
    public function controller() {
        $posY = $_GET["posY"];
        $posX = $_GET["posX"];
        $consultaPrateleira = ORM::for_table("prateleira")->where(array(
            'andar' => $posX,
            'produtoAndar' => $posY))->find_array();
        $remove = ORM::for_table("produto_prateleira")
            ->where_equal("id_prateleira", $consultaPrateleira[0]["id"])->delete_many();
        return Remove::removePorId("prateleira", $consultaPrateleira[0]["id"]);
    }
}

?>
