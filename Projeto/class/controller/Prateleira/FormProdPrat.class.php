<?php

class FormProdPrat {
    public function controller() {
        try {
            $produto = $_GET["produto"];
            $posY = $_GET["posY"];
            $posX = $_GET["posX"];
            if($produto === "0") {
                $template = new Template("view/Prateleira/InserePrateleira.tpl");
            } else {
                $template = new Template("../view/Prateleira/InserePrateleira.tpl");
            }
            $consultaPrateleira = ORM::for_table("prateleira")->where(array(
                'andar' => $posX,
                'produtoAndar' => $posY))->find_array();
            if(!$consultaPrateleira) {
                $prateleira = ORM::for_table("prateleira")->create();
                $prateleira->andar = $posX;
                $prateleira->produtoAndar = $posY;
                $prateleira->save();
                $consultaPrateleira = array(array("id" => $prateleira->id()));
            }
            $produto_prateleira = ORM::for_table("produto_prateleira")->create();
            if($produto !== "0") {
                $buscaProd = ORM::for_table("produto")->where("nome", $produto)->find_array();
                if(!$buscaProd) {
                    $retorno["erro"] = true;
                    $retorno["msg"] = "Não existe produto com esse nome";
                    return $retorno;
                }
                $produto_prateleira->id_produto = $buscaProd[0]["id"];
                $produto_prateleira->id_prateleira = $consultaPrateleira[0]["id"];
                $produto_prateleira->save();
            }
            $produtosNaPrateleira = ORM::for_table("produto_prateleira")->join(
                "produto", array("produto_prateleira.id_produto", "=", "produto.id"))
                ->where("produto_prateleira.id_prateleira", $consultaPrateleira[0]["id"])->find_array();
            $echo = "";
            foreach($produtosNaPrateleira as $html) {
                $echo .= "<li class='list-group-item'>". $html["nome"] ."
                <a href='#' name='deletarProdPrat' data-value=". $html["id_produto"] ." style='float:right; color: red'><i class='fa fa-times'></i></a>
                </li>";
            }
            $template->set("conteudo", $echo);
            $retorno["erro"] = false;
            if($produto === "0") {
                $retorno["msg"] = $template->saida();
            } else {
                $retorno["msg"] = "O produto foi inserido na prateleira com sucesso";
            }
        } catch (Exception $ex) {
            $retorno["erro"] = true;
            $retorno["msg"] = "Erro ao visualizar o form do curso\n".$ex->getMessage()."\n";
        }
        return $retorno;
    }
}

?>
