<?php

namespace controllers;

class AdminController {

    public function __construct($action) {
        switch ($action) {
            case "listeUtilisateurs":
                $this->afficherPageUtilisateurs();
                break;
            case "ajouterUtilisateur":
                $this->ajouterUtilisateur();
                break;
            case "mailPassword":
                $this->mailPassword();
                break;
            case "supprimerUtilisateur":
                $this->supprimerUtilisateur();
                break;
            case "modifierUtilisateur":
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    $this->afficherModifierUtilisateur();
                } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->modifierUtilisateur();
                }
                break;
            case "listeSchemas":
                $this->afficherPageSchemas();
                break;
            case "modifierSchema":
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    $this->afficherModifierSchema();
                } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->modifierSchema();
                }
                break;
            default:
                \Tools::makeError("Action non traitée dans le controleur Admin", "admin.php");
        }
    }

    private function afficherPageUtilisateurs() {
        include_once 'views/admin/div_ajouter_utilisateur.php';        
        include_once 'views/admin/div_liste_utilisateurs.php';        
    }

    private function ajouterUtilisateur() {
        
    }

    private function mailPassword() {
        
    }

    private function supprimerUtilisateur() {
        
    }

    private function afficherModifierUtilisateur() {
        
    }

    private function modifierUtilisateur() {
        
    }

    private function afficherPageSchemas() {
        
    }

    private function afficherModifierSchema() {
        
    }

    private function modifierSchema() {
        
    }
}
