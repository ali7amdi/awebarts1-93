<?php

/*
 * Display to get the requested data from the databse
 *
 * @author Ali7amdi
 */

class Display extends Awebarts {

    private $tablename;
    private $recData = array();

    public function __construct($tablename) {
        $this->tablename = $tablename;
        $this->connectToDb();
    }

    function getAllData() {
        $sql = "SELECT * FROM `$this->tablename` ORDER BY `id` ASC";
        $query = $this->cxn->cxn->prepare($sql);
        $query->execute();
        $data = $query->fetchAll();
        
        return @$data;
    }

    function getLastRecordDESC() {

        $sql = "SELECT * FROM `$this->tablename` ORDER BY `id` DESC LIMIT 1";
        $query = $this->cxn->cxn->prepare($sql);
        $query->execute();
        $data = $query->fetch();

        return $data;
    }

    function getRecordByID($id) {
        $id = intval($id);

        $sql = "SELECT * FROM `$this->tablename` WHERE `id`= $id";
        $query = $this->cxn->cxn->prepare($sql);
        $query->execute();
        $this->recData = $query->fetch();
        return $this->recData;
    }

    function getAllDataByID($id, $column = "id") {  // (5 , "sectionID")
        $id = intval($id);

        $sql = "SELECT * FROM `$this->tablename` WHERE `$column`= $id ORDER By `id` ASC";
        $query = $this->cxn->cxn->prepare($sql);
        $query->execute();
        $data = $query->fetchAll();
       
        return $data;
    }

    function getAllDataByStatusType($type) {
        $sql = "SELECT * FROM `$this->tablename` WHERE `status`= 1 AND `type` = '$type' ORDER By `id` DESC";
        $query = $this->cxn->cxn->prepare($sql);
        $query->execute();
        $data = $query->fetchAll();
       
        return $data;
    }

}

?>
