<?php
	
	// WEBSITE CONFIGURATION
	
	// Site and page
	$site_name = "Lightweight Framework";
	$page_title = "Welcome to Lightweight Framework";
	$page_h1 = "Welcome to Lightweight Framework";
	$page = 'home'; // Default page file name (homepage)
	
	// Body class
	$body_class = "is-col2";
	
	// Menu options
	$menu = array(
		'wrapper' => 'ul', // Wrapper tag for menu
		'items' => 'li', // Items tag
		'active_class' => 'active', // Class name for active items
		'copy_active_class_to_parent' => true, // Parent items should be active if one of its children is?
		'max_depth' => null, // Max depth for menu (1 to n), default is NULL (no maximum)
		'1st_level_class' => 'header-menu', // Class name for the root wrapper
		'2nd_level_class' => 'header-submenu', // Class name for the first-level submenus wrappers
		'pre_html' => '', // HTML code to be injected before text inside links
		'post_html' => '', // HTML code to be injected after text inside links
		'hide_items' => array() // An array with page full-names that should be not printed, ex: array('home', 'page/subpage')
	);
	
	// Sections
	$sections = array(
		'head'     => array('enabled', '_include/head.php'),
		'header'   => array('enabled', '_include/header.php'),
		'content'  => array('enabled', '_include/content.php'),
		'footer'   => array('enabled', '_include/footer.php'),
		'sidebar1' => array('enabled', '_include/sidebar.php')
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