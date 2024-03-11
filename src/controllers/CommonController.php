<?php

namespace controllers;

class CommonController {

    public function __construct($action) {
        switch ($action) {
            case "connexion":
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    $this->afficherPageConnexion();
                } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->verifierEmailPassword();
                }
                break;
            case "modifierPassword":
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    $this->afficherPagePassword();
                } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->modifierPassword();
                }
                break;
            default:
                \Tools::makeError("Action non traitée dans le controleur commun", "index.php") ;
                break;
        }
    }

    private function afficherPageConnexion() {
        include_once 'login.php';
    }

    private function verifierEmailPassword() {
        $mail = filter_input(INPUT_POST, 'mail');
        $password = filter_input(INPUT_POST, 'password');

        $utilisateur = \daos\UtilisateurDAO::getByMailAndPass($mail, $password);
        if ($utilisateur) {
            $_SESSION['utilisateur'] = array();
            $_SESSION['utilisateur']['mail'] = $utilisateur->getMail();
            $_SESSION['utilisateur']['typeUtilisateur'] = $utilisateur->getType_utilisateur();
            switch ($utilisateur->getType_utilisateur()) {
                case 'ADMIN':
                    header('Location: admin.php');
                    break;
                case 'BE':
                    header('Location: be.php');
                    break;
                case 'CLIENT':
                    header('Location: client.php');
                    break;
                default:
                    session_destroy();
                    \Tools::makeError("Type d'utilisateur non reconnu", "index.php?action=connexion");
                    break;
            }
        } else {
            \Tools::makeError("Erreur mail/password", "index.php?action=connexion");
        }
    }

    private function afficherPagePassword() {
        include_once 'views/common/div_modifier_password.php';
    }

    private function modifierPassword() {
        $password = filter_input(INPUT_POST, 'password');
        if (isset($password)) {
            \daos\UtilisateurDAO::updatePassword($password);
        }
    }
}
