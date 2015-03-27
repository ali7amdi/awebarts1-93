<?php

/*
 * Description of Delete
 *  to delete the request id
 * @author Ali7amdi
 */
class Delete extends Awebarts {
    
    private $tablename;
    
    public function __construct($tablename) {
        $this->tablename = $tablename;
        $this->connectToDb();
    }
    
    function deletRecordByID($id)
    {
        $id = intval($id);
        $sql = "DELETE FROM `$this->tablename` WHERE `id` = '$id' ";
        $query = $this->cxn->cxn->prepare($sql);
        
        if(!$query->execute())
        {
            throw new Exception("Error: not deleted.");
        }
        else
        {
            return TRUE;
        }
    }
    
}

?>
