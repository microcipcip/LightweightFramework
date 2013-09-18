<?php
	
	// LightweightFramework ENGINE
	
	ob_start();
	session_start();

	// Define root absolute path
	$root = dirname(__FILE__);
	
	// Load configuration
	require_once "$root/config/website.php";
	require_once "$root/config/javascript.php";

	// UTF-8 stuffs
	setlocale(LC_CTYPE, 'en_US.utf8');
	header('Content-Type: text/html; charset=utf-8');
	
	// Simulate register_globals = Off when it's actived (security)
	if (ini_get('register_globals')) {
		if (isset($_REQUEST['GLOBALS']) || isset($_FILES['GLOBALS'])) die('GLOBALS overwrite attempt detected');
		$urgNoUnset = array('GLOBALS', '_GET', '_POST', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
		$urgInput = array_merge($_GET, $_POST, $_COOKIE, $_SERVER, $_ENV, $_FILES, isset($_SESSION) && is_array($_SESSION) ? $_SESSION : array());
		foreach ($urgInput as $k => $v) if (!in_array($k, $urgNoUnset) && isset($GLOBALS[$k])) unset($GLOBALS[$k]);
	}
	
	// Perform stripslashes() and trim() on Request data
	function striptease(&$arg = null) {
		if (is_array($arg)) {
			foreach ($arg as $k => $v) striptease($arg[$k]);
		} else {
			if (!get_magic_quotes_gpc()) $arg = trim($arg); 
			else $arg = trim(stripslashes($arg));
		}
	}
	striptease($_GET);
	striptease($_POST);
	striptease($_REQUEST);
	
	// Load page
	if (!empty($_GET['page'])) $page = str_replace('/..', '', $_GET['page']); // Remove .. from path for security
	ob_start();
	include "$root/pages/$page.php";
	$content_buffer = ob_get_clean();
	
	// Strings escaping (UTF-8 to HTML)
	function e($string) { 
		return htmlentities($string, ENT_COMPAT, 'UTF-8'); 
	}
	
	// List files in a directory (used by loadMenu())
	function ls($path, $show_folders = false, $show_hidden = false, $recursive = false) {
		$ls = array();
		if (($dh = @opendir($path)) === false) return $ls;
		$path = substr($path, -1) == '/' ? $path : $path . '/';
		while (($file = readdir($dh)) !== false) {
			if (!$show_hidden) if (substr($file, 0, 1) == '.') continue;
			if (!$show_folders) if (is_dir($path.$file)) continue;
			if ($recursive && ($file != '.') && ($file != '..') && is_dir($path.$file)) $ls[$file] = ls($path.$file, $ext_filter, $show_folders, $show_hidden, $recursive);
			else $ls[] = $file;
		}
		return $ls;
	}
	
	// Return an HTML menu reading files structure in pages/
	// - $wrapper Wrapper tag for menu, default "ul" 
	// - $items Items tag, default "li"
	// - $active Class name for active item, default is "active"
	// - $max_depth Max depth for menu, default is NULL (no maximum)
	function loadMenu($wrapper = "ul", $items = "li", $active = 'active', $max_depth = null) {
		global $root;
		// TODO: loadMenu()
		
		// Get and parse files list
		$menu = array();
		$ls = ls("$root/pages", true, false, true);
		
		
		return '<p><i>[TODO: menu]</i></p>';
		
	}
	
	// Returns page content
	function loadContent() {
		global $content_buffer;
		return $content_buffer;
	}
	
	// Returns custom section content
	function loadSection($name) {
		// TODO: loadSection()
		return '<p><i>[TODO: section "' . e($name) . '"]</i></p>';
	}
	
?>
