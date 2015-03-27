<?php
/*
 * awebarts 
 * @author Ali7amdi
 */
class Database 
{
    private $host;
    private $user;
    private $password;
    private $database;
    public $cxn;
            function __construct($filename)
    {
        if(is_file($filename)) include $filename;
        else throw new Exception("Error: Not connected!");
        
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database; 
        
        $this->connect();
    }
    
    private function connect()
    {  
        //connect to the server
        
        $this->cxn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password, 
                array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        
        

        /*
        if(!mysql_connect($this->host,$this->user, $this->password))
            throw new Exception("Error: not connected to the server.");        
        // select the database
        if(!mysql_select_db($this->database))
            throw new Exception("Erro: No database selected");
         */
    }
    
    function close()
    {
        unset($this->cxn);
        $this->cxn = null;
    }
}

?>
