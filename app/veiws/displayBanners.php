<table class="table table-hover table-bordered sectionTable">
    <tr class="danger">
        <th>Id</th>
        <!--<th>Banner Name</th>-->
        <th>Status</th>
        <th>Type</th>        
        <th>Banner URL</th>
        <th>Date</th>
        <th>Created By</th>
        <th>Actions</th>
    </tr>
    <?php //`id`, `bannerName`, `bannerUrl`, `status`, `createdBy`, `CreatedDate`
    for ($i = 0; $i < count($BannerDataDisplay); $i++) {
        echo "            
                <tr>
                    <td>{$BannerDataDisplay[$i]['id']}</td>
                    <!--<td>{$BannerDataDisplay[$i]['bannerName']}</td>-->
                    <td>{$BannerDataDisplay[$i]['status']}</td>
                        <td>{$BannerDataDisplay[$i]['type']}</td>
                    <td>{$BannerDataDisplay[$i]['bannerUrl']}</td>
                    <td>{$BannerDataDisplay[$i]['CreatedDate']}</td>
                    <td>{$BannerDataDisplay[$i]['createdBy']}</td>
                    <td>
<a href='?page=Banners&action=delete&id={$BannerDataDisplay[$i]['id']}'><img src='resources/images/delete.png'></a>
                    </td>
                </tr>
            ";
        }
    ?>
    
</table>
