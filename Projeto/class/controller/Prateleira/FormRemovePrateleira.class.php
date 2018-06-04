<?php

class FormRemovePrateleira {
    public function controller() {
        try {
            $template = new Template("view/Prateleira/RemovePrateleira.tpl");
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
