<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminDB
 *
 * @author Linda TEMGOUA
 */
class AdminDB extends Admin {

    private $_db;
    private $_array = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    function isAdmin($login, $password) {
        $login = $login;
        $password = $password;
        try {
            $query = "select * from ADMIN where LOGIN=:login and PASSWORD=:password";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':login', $login);
            $resultset->bindValue(':password', $password);
            $resultset->execute();
            $data = $resultset->fetch();
            //var_dump($data);
            if (!empty($data)) {
                try {
                    $_admin[] = new Admin($data);
                    if ($_admin[0]->LOGIN == "$login" && $_admin[0]->PASSWORD == $password) {
                        return $_admin;
                    } else {
                        return null;
                    }
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
            }
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te." . $e->getMessage();
        }
    }

}
