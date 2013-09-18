<?php
	
	// WEBSITE CONFIGURATION
	
	// Site and page
	$site_name = "Lightweight Framework test site";
	$page_title = "Lightweight Framework";
	$page_h1 = "Test site";
	$page = 'home'; // Default page file name (homepage)
	
	// Sections
	$sections = array(
		'sidebar1'  => array('enabled', '/include/sidebar1.php'),
		'sidebar2'  => array('enabled', '/include/sidebar2.php'),
		'slideshow' => array('enabled', '/include/slideshow.php')
	);
	
	// JS files
	$javascript_files = array('/js/javascript.js', '/js/settings.js');
	
	// CSS files
	$css_files = array('/css/style.css');
	
?>