<div id="latestprojects">
    <!--<h1>Latest Projects:</h1>-->
    <?php
    
    // Our Projects
    // $id = $_GET['id'];
    
    $id = $_GET['id'];
    
    $tablename = "pages";
    $displaypages = new Display($tablename);
    $PagesDataDisplay = $displaypages->getAllDataByID($id, 'sectionId');
    
    //var_dump($PagesDataDisplay);
    
    for($i=0; $i< count($PagesDataDisplay); $i++)
    {
        echo ' 
            <div class="project">
                <img src="app/'.$PagesDataDisplay[$i]['page_image'].'" width="140" height="100" />
                <h2>'.$PagesDataDisplay[$i]['page_name'].'</h2>
                <p>'.substr($PagesDataDisplay[$i]['page_content'], 0, 100).'</p>
                <a href="?page=page&id='.$PagesDataDisplay[$i]['id'].'">Read more »</a>
           </div>
        ';
    }

    
    ?>


    
    
        
        
        
        
    

</div>