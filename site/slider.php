<?php
// display exist banners    
$tablename = "banners";
$type = 'slider';

$displaybanner = new Display($tablename);
$BannerDataDisplay = $displaybanner->getAllDataByStatusType($type);
//`id`, `bannerName`, `bannerUrl`, `status`, `createdBy`, `CreatedDate`
echo '<div id="slider">';
for($i =0; $i < count($BannerDataDisplay); $i++)
{
    echo '<img src="app/'.$BannerDataDisplay[$i]['bannerUrl'].'" width="810" height="330" />';
}
echo '</div>';

?>