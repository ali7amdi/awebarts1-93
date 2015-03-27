<?php

/*
 * Description of Awebarts Class
 *  main class will include the general fuctions 
 * @author Ali7amdi
 */

class Awebarts {  
    
    //class attr
    protected $cxn;  // databse object => connection to Mysql
    
    
    //class methods or functions
    function connectToDb()
    {
        //require_once MODELS.'Database.php';
        $vars = "includes/vars.php";
        $this->cxn = new Database($vars);
    }
    
    function close()
    {
        $this->cxn->close();
    }
    
}


