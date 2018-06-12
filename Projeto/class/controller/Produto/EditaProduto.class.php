<?php

class EditaProduto {
    public function controller() {
        $valores = array();
        $valores["nome"] = $_POST["nome"];
        $valores["preco"] = $_POST["preco"];
        return Altera::alterarRegistro("produto", $_POST["id"], $valores);
    }
}

?>
