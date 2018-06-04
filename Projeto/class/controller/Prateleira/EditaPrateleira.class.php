<?php

class EditaPrateleira {
    public function controller() {
        $valores = array();
        $valores["andar"] = $_POST["andar"];
        $valores["produtoAndar"] = $_POST["produtoAndar"];
        return Altera::alterarRegistro("prateleira", 0, $valores);
    }
}

?>