<?php

namespace controllers;

class BEController {

    public function __construct($action) {
        switch ($action) {
            case "listeSchemas":
                $this->afficherPageSchemas();
                break;

            default:
                \Tools::makeError("Action non traitée dans le controleur Bureau d'étude", "be.php");
        }
    }

    private function afficherPageSchemas() {
         include_once 'views/be/div_ajouter_schema.php';
         include_once 'views/be/div_liste_schemas.php';
    }
}
