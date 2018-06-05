<?php

class EditaPrateleira {
    public function controller() {
        $posX = $_GET["posX"];
        $posY = $_GET["posY"];
        $valores = array();
        $valores["andar"] = $_POST["andar"];
        $valores["produtoAndar"] = $_POST["produtoAndar"];
        $consultaPrateleira = ORM::for_table("prateleira")->where(array(
            'andar' => $posX,
            'produtoAndar' => $posY))->find_array();
        return Altera::alterarRegistro("prateleira", $consultaPrateleira[0]["id"], $valores);
    }
}

?>