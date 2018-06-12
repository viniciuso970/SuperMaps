<?php

class FormProduto {
    public function controller() {
        try {
            $template = new Template("view/Produto/InsereProduto.tpl");
            $template->set("nome", "");
            $template->set("preço", "0.00");
            $retorno["erro"] = false;
            $retorno["msg"] = $template->saida();
        } catch (Exception $ex) {
            $retorno["erro"] = true;
            $retorno["msg"] = "Erro ao visualizar o form do curso\n".$ex->getMessage()."\n";
        }
        return $retorno;
    }
}

?>
