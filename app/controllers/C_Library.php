<h3>Library</h3>
<?php

include '../includes/init.php';
include '../includes/autoloader.php';

if ($_POST) {
    if(isset($_POST['submit']) && $_POST['submit'] == 'Upload')
    {
        if (isset($_FILES)) {
            try {
                $file = $_FILES['image'];
                $allowedExts = array('jpg', 'png');
                $uploadsDirecotry = "resources/uploads/";
                $maxSize = 4000000;
                $upload = new Upload($file, $allowedExts, $uploadsDirecotry, $maxSize);
                $upload->uploadFiles();
                echo $upload->getFileUrl();
            } catch (Exception $exc){
                $exc->getMessage();
            }
        }
    }
    if(isset($_POST['submit']) && $_POST['submit'] == 'Delete')
    {
        //var_dump($_POST['checkimage']);        
        try {
            $filesToDelete = $_POST['checkimage'];
                        
            $delete = new DeleteFile($filesToDelete);
            if($delete == TRUE)
                echo "Files successfuly deleted.";
            
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
            
        
        
    }
} else {
    include 'veiws/addNewFile.php';
    echo '<div class="clear"></div>';
    echo '<hr>';

    $uploadsDirecotry = "resources/uploads/";
    $dir = scandir($uploadsDirecotry);
    $scdir = array_diff($dir, array('..', '.'));
    
    // display images
    echo '
        <div class="imglib">
        <form class="mainSettingsForm add newPage imgs" action="" method="post">
        ';
    foreach ($scdir as $value) {
        echo "
            <p>
                <input type='checkbox' class='checkbox' name='checkimage[]' value='$uploadsDirecotry$value'>
                <img src='$uploadsDirecotry$value' />
            </p>
                ";
    }
    echo '
        <div class="clear"></div>
        <input type="submit" name="submit" value="Delete">
        </form>
        </div>';
}

?>
