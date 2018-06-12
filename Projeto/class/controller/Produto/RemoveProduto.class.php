<?php

class RemoveProduto {
    public function controller() {
	$resposta = Remove::removeListaPorId("produto_prateleira", "id_produto", $_POST["id"]);
        return Remove::removePorId("produto", $_POST["id"]);
    }
}

?>
