<?php

class EditaPrateleira {
    public function controller() {
        $valores = array();
        $valores["andar"] = $_POST["andar"];
        $valores["produtoAndar"] = $_POST["produtoAndar"];
        $consultaPrateleira = ORM::for_table("prateleira")->where(array(
            'andar' => $valores["andar"],
            'produtoAndar' => $valores["produtoAndar"]))->find_array();
        return Altera::alterarRegistro("prateleira", 0, $consultaPrateleira[0]["id"]);
    }
}

?>