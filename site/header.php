<?php 
include 'includes/functions.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo $siteInfo['site_dcsc'];?>" />
<meta name="keywords" content="<?php echo $siteInfo['site_tags'];?>" />
<title><?php echo $siteInfo['site_name'];?></title>
<link href="<?php echo SITE;?>css/reset-min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo SITE;?>css/fonts-min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo SITE;?>css/style.css" rel="stylesheet" type="text/css" />

        <link href='http://fonts.googleapis.com/css?family=Antic+Slab' rel='stylesheet' type='text/css' />

        <!-- Use jQuery for best compatibility with other CSS3 enabled browsers -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>

        <script src="<?php echo SITE;?>js/flux.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" charset="utf-8">
            $(function() {
                if (!flux.browser.supportsTransitions)
                    alert("Flux Slider requires a browser that supports CSS3 transitions");

                window.f = new flux.slider('#slider', {
                    pagination: false,
                    controls: false,
                    transitions: ['tiles3d', 'bars3d'],
                    autoplay: true
                });

                $('.transitions').click(function(event) {
                    event.preventDefault();
                    window.f.next($(event.target).data('transition'), $(event.target).data('params'));
                });
            });
        </script>

</head>

<body>
<div id="wrapper">
	
    <div id="header">
    	
        <div id="logo"><img src="<?php echo SITE;?>images/logo.png" width="285" height="118" /></div>
        
        <div id="menu">
         	   		 		 	      		
            <ul>
            	<li><a href="http://localhost/awebarts/">Home Page</a></li>
            	<li><a href="?page=section&id=3">Our services</a></li>
            	<li><a href="?page=page&id=15">Portfolio</a></li>
            	<li><a href="?page=page&id=16">Contact Us</a></li>
            </ul>
        	
            <h1>Call us: +201016936293</h1>
            
       	  <div id="slinks">
           	<h1>Follow us:</h1>
                <a href="<?php echo $siteInfo['fb'];?>"><img src="<?php echo SITE;?>images/fb.png" width="31" height="31" /></a>
                <a href="<?php echo $siteInfo['tw'];?>"><img src="<?php echo SITE;?>images/tw.png" width="31" height="31" /></a>
                <a href="<?php echo $siteInfo['yt'];?>"><img src="<?php echo SITE;?>images/yt.png" width="31" height="31" /></a>
                <a href="#"><img src="<?php echo SITE;?>images/sk.png" width="35" height="35" /></a>
                <a href="<?php echo $siteInfo['rss'];?>"><img src="<?php echo SITE;?>images/rss.png" width="31" height="31" /></a>
            </div>
        </div>
    </div>
 
