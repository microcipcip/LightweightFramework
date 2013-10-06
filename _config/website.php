<?php
	
	// WEBSITE CONFIGURATION
	
	// Site and page
	$site_name = "SiteName";
	$page_title = "Welcome to SiteName";
	$page_h1 = "Welcome to SiteName";
	$page = 'Home'; // Default page file name (homepage)
	
	// Body Class
	$body_class = "is-col2";
	
	// Sections
	$sections = array(
		'sidebar'   => array('enabled', '_include/sidebar-main.php'),
		'slideshow' => array('disabled', '_include/slideshow.php')
	);
	
	// JS files
	$javascript_files = array(
		'js/javascript.js', 
		'js/settings.js'
	);

	// CSS files
	$css_files = array(
		'css/style.css'
	);
	
?>