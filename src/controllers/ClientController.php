<?php

namespace controllers;

class ClientController {

    public function __construct($action) {
        switch ($action) {
            case "listeSchemas":
                $this->afficherPageSchemas();
                break;

            default:
                \Tools::makeError("Action non traitée dans le controleur Client", "client.php");
        }
    }

    private function afficherPageSchemas() {
        include_once 'views/client/div_liste_schemas.php';
    }
}
