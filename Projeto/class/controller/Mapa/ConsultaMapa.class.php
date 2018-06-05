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
                for ($i = 0; $i < $altura; $i++) {
                    $table .= '<tr>';
                    for ($j = 0; $j < $largura; $j++) {
                        $consultaPrateleira = ORM::for_table("prateleira")->where(array(
                            'andar' => $i,
                            'produtoAndar' => $j))->find_array();
                        if($consultaPrateleira) {
                            $texto = "Prateleira :". $consultaPrateleira[0]["id"];    
                        } else {
                            $texto = "Adicionar Prateleira";
                        }
                        $table .= '<td id="verPrateleira"> <a href="?acao=FormProdPrat&produto=0&posX='.$i.'&posY='.$j.'"> '.$texto .'</a> </td>';
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
