<!--
 `pages` :: `id`, `page_name`, `page_content`, `page_status`, `page_visits`, `sectionId`, `page_image`, `page_date`, `createdBy`
-->

<table class="table table-hover table-bordered sectionTable">
    <tr class="danger">
        <th>Id</th>
        <th>Page Name</th>
        <th>Staus</th>                
        <th>Section Name</th>
        <th>Date</th>
        <th>Created By</th>
        <th>Actions</th>
    </tr>

    <?php
    //$PagesDataDisplay;
    for ($i = 0; $i < count($PagesDataDisplay); $i++) {
        echo"
            <tr>
                <td>{$PagesDataDisplay[$i]['id']}</td>
                <td>{$PagesDataDisplay[$i]['page_name']}</td>
                <td>{$PagesDataDisplay[$i]['page_status']}</td>
                <td>{$sectionNames[$i]['sectionName']}</td>
                <td>{$PagesDataDisplay[$i]['page_date']}</td>
                <td>{$PagesDataDisplay[$i]['createdBy']}</td>
                <td>
                    <a href='?page=Pages&action=delete&id={$PagesDataDisplay[$i]['id']}'><img src='resources/images/delete.png'></a>
                    <a href='?page=Pages&action=edit&id={$PagesDataDisplay[$i]['id']}'><img src='resources/images/edit.png'></a>  
                </td>
            </tr>
";
    }
    ?>

</table>