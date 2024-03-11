<?php

namespace daos;



class SchemaDAO {

    /**
     * @return \entities\Schema
     */
    public static function getAll() {
        $sql = "SELECT * FROM utilisateurs where mail=:mail and sha1_pass=sha1(:password)";
        $stmt = PdoBD::getInstance()->getPdo()->prepare($sql);
        $stmt->bindValue(":mail", $mail);
        $stmt->bindValue(":password", $password);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\Utilisateur');
        $utilisateur = $stmt->fetch();
        return $utilisateur;
    }
}

?>
