<?php

class EditaPrateleira {
    public function controller() {
        $posX = $_POST["posX"];
        $posY = $_POST["posY"];
        $xAntigo = $_POST["xAntigo"];
        $yAntigo = $_POST["yAntigo"];
        $valores = array();
        $valores["andar"] = $posX;
        $valores["produtoAndar"] = $posY;
        $consultaPrateleira = ORM::for_table("prateleira")->where(array(
            'andar' => $xAntigo,
            'produtoAndar' => $yAntigo))->find_array();
        $retorno = Altera::alterarRegistro("prateleira", $consultaPrateleira[0]["id"], $valores);
        if($retorno["erro"]) {
            $retorno["msg"] = "Erro na movimentação da prateleira";
        } else {
            $retorno["msg"] = "Prateleira movimentada com sucesso";
        }
        return $retorno;
    }
}

?>