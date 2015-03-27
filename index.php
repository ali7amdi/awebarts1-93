<?php

if (@$_GET['page']) {
    $url = "site/".$_GET['page'] . ".php";
    if (is_file($url)) {
        include $url;
    } else {
        echo 'requested file is not found !';
    }
} else {
    include 'site/index.php';
}

