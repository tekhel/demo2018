<?php

    class Galeriedb extends Gallerie {


        private $_db;
        private $_voyagesImagesArray = array();

        public function __construct($cnx) {
            $this->_db = $cnx;
        }

        public function getAllImages() {
            $query = "select PAYS, VILLE, IMAGE from VOYAGE";
            try {
                $resultset = $this->_db->prepare($query);
                $resultset->execute();
            } catch (PDOException $e) {
                print $e->getMessage();
            }

            while ($data = $resultset->fetch()) {
                try {
                    //$_clientArray[] = new Client ($data);
                    $_voyagesImagesArray[] = $data;
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
            }
            return $_voyagesImagesArray;
        }
    }