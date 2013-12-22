<?php
	
	// JAVASCRIPT CONFIGURATION
	
	// Settings
	$js_path = "js"; // Main JS folder (set permissions to 777)
	$js_plugin_path = "$js_path/javascript/plugins"; // Uncompressed sources and settings folder 
	$js_settings_path = "$js_path/javascript/settings"; // Uncompressed sources and settings folder 
	$js_output = "$js_path/javascript.js"; // Single-file (compressed) output
	$js_settings_output = "$js_path/settings.js"; // Single-file (compressed) output for settings
	
	// Javascript sources [enable/disable, minify (bool), path]
	$js_sources = array(
		'modernizr'          => array('enabled', false, "$js_plugin_path/modernizr.js"),
		'mediamatch'         => array('enabled', false, "$js_plugin_path/mediamatch.js"),
		'enquire'            => array('enabled', false, "$js_plugin_path/enquire.js"),
		'responsivetooltip'  => array('enabled', false, "$js_plugin_path/responsivetooltip.js"),
		'responsiveslides'   => array('enabled', false, "$js_plugin_path/responsiveslides.js"),
		'fitvids'            => array('enabled', false, "$js_plugin_path/fitvids.js"),
		'easyresponsivetabs' => array('enabled', false, "$js_plugin_path/easyresponsivetabs.js"),
		'faq'                => array('enabled', false, "$js_plugin_path/faq.js"),
		'magnificpopup'      => array('enabled', false, "$js_plugin_path/magnificpopup.js"),
		'validationplugin'   => array('enabled', false, "$js_plugin_path/validationplugin.js"),
		'placeholderplugin'  => array('enabled', false, "$js_plugin_path/placeholderplugin.js")
	);
	
	// Javascript settings on jQuery DOM Ready [enable/disable/inherit, minify (bool), path]
	$js_settings_sources = array(
		'responsiveslides'   => array('inherit', false, "$js_settings_path/responsiveslides.js"),
		'fitvids'            => array('inherit', false, "$js_settings_path/fitvids.js"),
		'easyresponsivetabs' => array('inherit', false, "$js_settings_path/easyresponsivetabs.js"),
		'faq'                => array('inherit', false, "$js_settings_path/faq.js"),
		'magnificpopup'      => array('inherit', false, "$js_settings_path/magnificpopup.js"),
		'validationplugin'   => array('inherit', false, "$js_settings_path/validationplugin.js"),
		'social'             => array('enabled', false, "$js_settings_path/social.js"),
		'menu'               => array('enabled', false, "$js_settings_path/menu.js"),
		'enquire'            => array('inherit', false, "$js_settings_path/enquire.js"),
		'default'            => array('enabled', false, "$js_settings_path/default.js")
	);
	
?>