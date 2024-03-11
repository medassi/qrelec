<?php

namespace entities;

class Utilisateur {

    private $mail;
    private $nom ;
    private $type_utilisateur ;
    function __construct() {
        
    }
    public function getMail() {
        return $this->mail;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getType_utilisateur() {
        return $this->type_utilisateur;
    }

}