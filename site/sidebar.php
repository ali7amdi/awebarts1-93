<div id="sidebsr">
    <div class="side">
        <?php
        $tablename = "sections";
        $displaySec = new Display($tablename);
        $SecDataDisplay = $displaySec->getAllData();
        
            for ($i = 0; $i < count($SecDataDisplay); $i++) {
                if($SecDataDisplay[$i]['id'] != 7)
                {
                echo '<div class="side_head"><h1>' . $SecDataDisplay[$i]['sectionName'] . '</h1></div>';

                $id = $SecDataDisplay[$i]['id'];
                $displaypages = new Display('pages');
                $PagesDataDisplay[$i] = $displaypages->getAllDataByID($id, 'sectionId');

                echo "<div class='side_body'><ul>";
                for($j=0; $j < count($PagesDataDisplay[$i]); $j++)
                {
                    echo '<li><a href="?page=page&id='.$PagesDataDisplay[$i][$j]['id'].'">'.$PagesDataDisplay[$i][$j]['page_name'].'</a></li>';
                }
                echo "</ul></div>";

            }
        }
        ?>

    </div>
    <div class="side">
        <div class="side_head"><h1>Newsletter!</h1></div>
        <div class="side_body">
            <form>
                <input type="text" placeholder="write your name here!"  /><br />
                <input type="text" placeholder="write your email here!"  /><br />
                <input type="submit" value="Subscribe" />
            </form>
        </div>
    </div>
</div>