<?php

class InserePrateleira {
    public function controller() {
        try {
            $existeprateleira = Lista::verificarExiste("prateleira");
            alert("oioi");
            if($existeprateleira) {
                $retorno["erro"] = true;
                $retorno["msg"] = "Erro ao criar a Prateleira, já existe uma prateleira no sistema\n";
                return $retorno;
            }
            $prateleira = ORM::for_table("prateleira")->create();
            $prateleira->andar = $_POST["andar"];
            $prateleira->produtoAndar = $_POST["produtoAndar"];
            $prateleira->save();
            $retorno["erro"] = false;
            $retorno["msg"] = "prateleira criado com sucesso";
        } catch (Exception $ex) {
            $retorno["erro"] = true;
            $retorno["msg"] = "Erro ao criar a prateleira\n".$ex->getMessage()."\n";
        }
        return $retorno;
    }
}

?>
