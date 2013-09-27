<?php
	
	// Page settings (override defaults in config/website.php)
	$page_title = "Lorem";
	$page_h1 = "Lorem";
	
	// Specify body class
	$body_class = "dark";
	
	// Override sidebars definitions
	overrideSections(array(
		'sidebar1'  => array('inherit', 'include/sidebar_dark.php'), // Change sidebar 1 path
		'sidebar2'  => array('disabled', 'inherit') // Disable sidebar 2
	));
	
?>
<h1><?php echo e($page_h1) ?></h1>
<p>
	This is a sample page.
</p>