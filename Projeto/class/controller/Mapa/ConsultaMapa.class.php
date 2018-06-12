<?php

class ConsultaMapa
{
    public function controller()
    {
        try {
            $consulta = ORM::for_table("mapa")->find_array();
            if ($consulta) {
                $mapa = $consulta[0];
                $altura = $mapa["altura"];
                $largura = $mapa["largura"];
                $table = "";
                $texto = "";
                $template = new Template("view/Mapa/ConsultaMapa.tpl");
                $produtos = ORM::for_table("produto")->find_array();
                $echo = "";
                foreach($produtos as $item) {
                    $echo .= "<option value=".$item["id"].">". $item["nome"] ."</option>";
                }
                $template->set("produtos", $echo);
                for ($i = 0; $i < $altura; $i++) {
                    $table .= '<tr>';
                    for ($j = 0; $j < $largura; $j++) {
                        $consultaPrateleira = ORM::for_table("prateleira")->where(array(
                            'andar' => $i,
                            'produtoAndar' => $j))->find_array();
                        if($consultaPrateleira) {
                            //$texto = "Prateleira :". $consultaPrateleira[0]["id"];
                            $table .= '<td class="x-'.$i.' y-'.$j.' tem-prateleira" id="verPrateleira"><a class="table-link" href="?acao=FormProdPrat&produto=0&posX='.$i.'&posY='.$j.'">'.$texto .'</a></td>';
                        } else {
                            //$texto = "&nbsp;";
                            $table .= '<td class="x-'.$i.' y-'.$j.'" id="verPrateleira"><a class="table-link" href="?acao=FormProdPrat&produto=0&posX='.$i.'&posY='.$j.'">'.$texto .'</a></td>';
                        }
                        //$table .= '<td id="verPrateleira"><a class="table-link" href="?acao=FormProdPrat&produto=0&posX='.$i.'&posY='.$j.'"> '.$texto .'</a> </td>';
                    }
                    $table .= '</tr>';
                }
                $template->set("tabela", $table);
                $retorno["erro"] = false;
                $retorno["msg"] = $template->saida();
            } else {
                $retorno["erro"] = true;
                $retorno["msg"] = "Não existe mapa cadastrado\n";
            }
        } catch (Exception $ex) {
            $retorno["erro"] = true;
            $retorno["msg"] = "Erro ao visualizar o mapa\n" . $ex->getMessage() . "\n";
        }
        return $retorno;
    }
}
