<?php
/*
 * file controller: to control sections 
 *  - add -> connect with the add() model, class 
 *  - display -> display() model 
 *  - update -> update() model
 *  - delete -> delete() model
 */
?>
<!--  add new section ::
sections: sectionId, sectionName, sectionStaus, sectionLocation, sectionDesc, sectionDate, username
-->
<h3>Sections</h3>
<h2><a href="?page=Sections&action=add">Add New Section</a></h2>
<?php
if ($_POST OR @$_GET['action']) {

    if (isset($_GET['action']) AND $_GET['action'] == "add") {
        include 'veiws/addSection.php';
    }

    if (isset($_POST['submit']) && $_POST['submit'] == "Add") {

        $Data['sectionName'] = $_POST['sectionName'];
        $Data['sectionStaus'] = $_POST['sectionStaus'];
        $Data['sectionLocation'] = $_POST['sectionLocation'];
        $Data['sectionDesc'] = $_POST['sectionDesc'];
        $Data['username'] = $_POST['username'];

        try {
            include 'model/Awebarts.php';
            include 'model/Add.php';
            
            if($add = new Add($Data, "sections"))
            {
                echo 'Done';
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
}