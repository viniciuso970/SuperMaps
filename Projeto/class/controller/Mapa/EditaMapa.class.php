<?php

class EditaMapa {
    public function controller() {
        $valores = array();
        $valores["largura"] = $_POST["largura"];
        $valores["altura"] = $_POST["altura"];
        return Altera::alterarRegistro("mapa", 0, $valores);
    }
}

?>