<?php
	
	// JAVASCRIPT CONFIGURATION
	
	// Settings
	$js_path = "js"; // Main JS folder (set permissions to 777)
	$js_sources_path = "$js_path/javascript"; // Uncompressed sources and settings folder 
	$js_output = "$js_path/javascript.js"; // Single-file (compressed) output
	$js_settings_output = "$js_path/settings.js"; // Single-file (compressed) output for settings
	
	// Javascript sources [enable/disable, minify (bool), path]
	$js_sources = array(
		'modernizr'          => array('enabled', false, "$js_sources_path/modernizr.js"),
		'mediamatch'         => array('enabled', false, "$js_sources_path/mediamatch.js"),
		'enquire'            => array('enabled', false, "$js_sources_path/enquire.js"),
		'responsivetooltip'  => array('enabled', false, "$js_sources_path/responsivetooltip.js"),
		'responsiveslides'   => array('enabled', false, "$js_sources_path/responsiveslides.js"),
		'fitvids'            => array('enabled', false, "$js_sources_path/fitvids.js"),
		'easyresponsivetabs' => array('enabled', false, "$js_sources_path/easyresponsivetabs.js"),
		'faq'                => array('enabled', false, "$js_sources_path/faq.js"),
		'magnificpopup'      => array('enabled', false, "$js_sources_path/magnificpopup.js"),
		'validationplugin'   => array('enabled', false, "$js_sources_path/validationplugin.js"),
		'placeholderplugin'  => array('enabled', false, "$js_sources_path/placeholderplugin.js")
	);
	
	// Javascript settings on jQuery DOM Ready [enable/disable/inherit, minify (bool), path]
	$js_settings_sources = array(
		'jquery' => array('inherit', false, "$js_sources_path/jquery_settings.js")
	);
	
?>