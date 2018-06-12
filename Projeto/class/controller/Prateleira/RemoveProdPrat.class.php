<?php

class RemoveProdPrat
{
    public function controller()
    {
        try {
            $posX = $_GET["posX"];
            $posY = $_GET["posY"];
            $id_produto = $_GET["id_produto"];
            $prateleira = ORM::for_table("prateleira")->where(array(
                'andar' => $posX,
                'produtoAndar' => $posY))->find_array();
            if($prateleira) {
                $produto_prateleira = ORM::for_table("produto_prateleira")->where(array(
                    'id_produto' => $id_produto,
                    'id_prateleira' => $prateleira[0]["id"]))->find_array();
                $retorno = Remove::removePorId("produto_prateleira", $produto_prateleira[0]["id"]);
                if($retorno["erro"]) {
                    
                } else {
                    $retorno["msg"] = "Produto removido da prateleria com sucesso";
                }
                return $retorno;
            }
            $retorno["erro"] = true;
            $retorno["msg"] = "Erro ao remover o produto da prateleria";
            return $retorno;
        } catch (Exception $ex) {
            $retorno["erro"] = true;
            $retorno["msg"] = "Erro ao visualizar o form do curso\n" . $ex->getMessage() . "\n";
        }
        return $retorno;
    }
}
