<?php

namespace entities;

class Schema {

    private $id;
    private $nom ;
    private $dh_depot ;
    private $pour_qui ;
    private $par_qui ;
    function __construct() {
        
    }
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDh_depot() {
        return $this->dh_depot;
    }

    public function getPour_qui() {
        return $this->pour_qui;
    }

    public function getPar_qui() {
        return $this->par_qui;
    }

    public function getPour_qui_Utilisateur() {
        return \daos\UtilisateurDAO::getById( $this->pour_qui );
    }
    
    public function getPar_qui_Utilisateur() {
        return \daos\UtilisateurDAO::getById( $this->par_qui );
    }

}