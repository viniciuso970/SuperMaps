<?php

class RemoveMapa {
    public function controller() {
        return Remove::removePorId("mapa", $_GET["id"]);
    }
}

?>