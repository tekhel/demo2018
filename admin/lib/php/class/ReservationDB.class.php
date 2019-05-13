<?php

class ReservationDB extends Reservation {

    private $_db;
    private $_voyagesImagesArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getAllImages() {
        $query = "select * FROM RESERVATION";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                //$_clientArray[] = new Client ($data);
                $_reservationArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_reservationArray;
    }

    public function addReservation(array $data) {
        $query = "insert into RESERVATION (NOM_CLIENT,EMAIL_CLIENT,TEL_CLIENT,PAYS_CLIENT,VILLE_CLIENT,DESTINATION,DATE,NBR_PERSONNES,BUDGET) values (:NOM_CLIENT,:EMAIL_CLIENT,:TEL_CLIENT,:PAYS_CLIENT,:VILLE_CLIENT,:DESTINATION,:DATE,:NBR_PERSONNES,:BUDGET)";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->execute($data);
            return true;
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
            return false;
        }
    }
}
