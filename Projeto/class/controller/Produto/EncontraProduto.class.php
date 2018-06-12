<?php

class EncontraProduto {
    public function controller() {
        try {
            $consultaPrateleira = ORM::for_table("produto_prateleira")->join('prateleira', array('produto_prateleira.id_prateleira', '=', 'prateleira.id'))->where(array('id_produto' => $_POST["produtosListBusca"]))->find_array();
            $retorno["erro"] = false;
            $retorno["msg"] = $consultaPrateleira;
        } catch (Exception $ex) {
            $retorno["erro"] = true;
            $retorno["msg"] = "Erro ao buscar produto\n" . $ex->getMessage() . "\n";
        }
        return $retorno;
    }
}

?>
