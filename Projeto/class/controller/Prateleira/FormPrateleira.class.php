<?php

class FormPrateleira {
    public function controller() {
        try {
            $template = new Template("view/Prateleira/InserePrateleira.tpl");
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
