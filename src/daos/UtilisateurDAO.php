<?php

namespace daos;



class UtilisateurDAO {

    /**
     * @param string $mail
     * @param string $password
     * @return \entities\Utilisateur
     */
    public static function getByMailAndPass($mail, $password) {
        $sql = "SELECT * FROM utilisateurs where mail=:mail and sha1_pass=sha1(:password)";
        $stmt = PdoBD::getInstance()->getPdo()->prepare($sql);
        $stmt->bindValue(":mail", $mail);
        $stmt->bindValue(":password", $password);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\Utilisateur');
        $utilisateur = $stmt->fetch();
        return $utilisateur;
    }

     /**
     * @param string $mail
     * @return \entities\Utilisateur
     */
    public static function getById($mail) {
        $sql = "SELECT * FROM utilisateurs where mail=:mail";
        $stmt = PdoBD::getInstance()->getPdo()->prepare($sql);
        $stmt->bindValue(":mail", $mail);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\Utilisateur');
        $utilisateur = $stmt->fetch();
        return $utilisateur;
    }

    public static function updatePassword($password) {
        $sql = "UPDATE utilisateurs set sha1_pass=sha1(:p) where mail=:mail";
        $stmt = PdoBD::getInstance()->getPdo()->prepare($sql);
        $stmt->bindValue(":p", $password);
        $stmt->bindValue(":mail", $_SESSION['utilisateur']['mail'] );
        return $stmt->execute();
    }
}
