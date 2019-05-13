<?php

class VoyagesDB extends Voyages {

    private $_db;
    private $_voyagesArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getAllVoyages() {
        $query = "select * from VOYAGE";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                //$_clientArray[] = new Client ($data);
                $_voyagesArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_voyagesArray;
    }

}
