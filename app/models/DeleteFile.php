<?php

/**
 * Description of DeleteFile : to delete libarary files
 *
 * @author Ali7amdi
 */
class DeleteFile {

    private $files;

    public function __construct($filesToDelete) {
        if (!is_array($filesToDelete)) {
            throw new Exception("Data Must be in an array.");
        }
        
        $this->files = $filesToDelete;
        
        $this->delteFiles();
    }
    
    // delete files function
    function delteFiles() {
        foreach ($this->files as $file) {
            if(file_exists($file))
            {
                unlink($file);
            }
            else
                throw new Exception("Invalid File name");
        }
        return TRUE;
    }
}

?>
