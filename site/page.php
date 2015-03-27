<?php

// header.php
include 'site/header.php';

// contents start
echo '<div id="contents">';

// sider bar
include 'site/sidebar.php';

echo '<div id="conts">';

echo '<div id="page">';

/*
 * id = $_GET['id']
 */

$id = $_GET['id'];
$tablename = "pages";
$displaypages = new Display($tablename);
$PagesDataDisplay = $displaypages->getRecordByID($id);



echo'    
<h1>' . $PagesDataDisplay['page_name'] . '</h1>
<img style="max-width:300px; margin:20px 0;" src="app/' . $PagesDataDisplay['page_image'] . '">
<p>
    ' . $PagesDataDisplay['page_content'] . '
</p>
    
    ';

echo '</div>';
echo '</div>';

echo '</div>';

// footer.php
include 'site/footer.php';
?>