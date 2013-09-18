<?php
	
	// JAVASCRIPT CONFIGURATION
	
	// Settings
	$js_path = "/js"; // Main JS folder (set permissions to 777)
	$js_sources_path = "$js_path/javascript"; // Uncompressed sources and settings folder 
	$js_output = "$js_path/javascript.js"; // Single-file (compressed) output
	$js_settings_output = "$js_path/settings.js"; // Single-file (compressed) output for settings
	
	// Javascript sources [enable/disable, minify (bool), path]
	$js_sources = array(
		'jquery' => array('enabled', false, "$js_sources_path/jquery-1.10.2.min.js")
	);
	
	// Javascript settings on jQuery DOM Ready [enable/disable/inherit, minify (bool), path]
	$js_settings_sources = array(
		'jquery' => array('inherit', false, "$js_sources_path/jquery_settings.js")
	);
	
?>