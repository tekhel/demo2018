<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactDB
 *
 * @author Fabrice
 */
class ContactDB  {

    private $_db;
    private $_clientArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getClient($email) {
        $query = "select * from CONTACT where email=:email";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':email', $email, PDO::PARAM_STR);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                //$_clientArray[] = new Client ($data);
                $_clientArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_clientArray;
    }

    public function addContact(array $data) {
        $query = "insert into CONTACT (NOM,MAIL,TEL,TEXTE,DATE_DEMANDE) values (:nom,:mail,:tel,:texte,NOW())";

        try {
            $resultset = $this->_db->prepare($query);
            
            /*$resultset->bindValue(':nom', $data['name'], PDO::PARAM_STR);
            $resultset->bindValue(':mail', $data['email'], PDO::PARAM_STR);
            $resultset->bindValue(':tel', $data['tel'], PDO::PARAM_STR);
            $resultset->bindValue(':texte', $data['texte'], PDO::PARAM_STR);*/
            $resultset->execute($data);
            return true;
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
            return false;
        }
    }

    function getVue_contact() {
        try {
            $query = "SELECT * FROM CONTACT ";
            $resultset = $this->_db->prepare($query);

            $resultset->execute();
            $data = $resultset->fetchAll();
            //var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }

}
