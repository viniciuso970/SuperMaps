<?php

class FormMapa {
    public function controller() {
        try {
            $template = new Template("view/Telas/InsereMapa.tpl");
            $template->set("largura", 10);
            $template->set("altura", 10);
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
