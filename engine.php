<?php
	
	// LightweightFramework ENGINE
	
	ob_start();
	session_start();

	// Define root absolute path
	$root = dirname(__FILE__);
	
	// Load configuration
	require_once "$root/_config/website.php";
	require_once "$root/_config/javascript.php";

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
			if ($recursive && ($file != '.') && ($file != '..') && is_dir($path.$file)) $ls[$file] = ls($path.$file, $show_folders, $show_hidden, $recursive);
			else $ls[] = $file;
		}
		return $ls;
	}
	
	// Return an HTML menu reading files structure in pages/
	// - $wrapper Wrapper tag for menu, default "ul" 
	// - $items Items tag, default "li"
	// - $active Class name for active item, default is "active"
	// - $max_depth Max depth for menu (1 to n), default is NULL (no maximum)
	function loadMenu($wrapper = "ul", $items = "li", $active = 'active', $max_depth = null) {
		global $root;
		global $page;
		$h = "";
		loadMenuRecursion($h, ls("$root/pages", true, false, true), '', $wrapper, $items, $active, $page, $max_depth);
		return $h;
	}
	
	// Menu recursive builder
	function loadMenuRecursion(&$h, $menu, $prefix = '', $wrapper = "ul", $items = "li", $active = 'active', $active_page = null, $max_depth = null) {
		if (!is_null($max_depth) && $max_depth == 0) return;
		$h .= "<$wrapper>";
		foreach ($menu as $m) {
			if (is_array($m)) continue;
			$h .= "<$items>";
			$pagename = substr($m, 0, -4);
			$pagelink = e(substr($m, 0, -4));
			$pagetitle = e(ucfirst(trim(str_replace("_", " ", substr($m, 0, -4)))));
			$c = "$prefix$pagename" == $active_page ? " class=\"$active\"" : "";
			$h .= "<a$c href=\"index.php?page=$prefix$pagelink\">$pagetitle</a>";
			if (!empty($menu[$pagename])) loadMenuRecursion($h, $menu[$pagename], "$prefix$pagename/", $wrapper, $items, $active, $active_page, is_null($max_depth) ? null : $max_depth - 1);
			$h .= "</$items>";
		} 
		$h .= "</$wrapper>";
	}
	
	// Returns page content
	function loadContent() {
		global $content_buffer;
		return $content_buffer;
	}
	
	// Returns custom section content
	function loadSection($name) {
		global $root;
		global $sections;
		if (empty($sections[$name]) || $sections[$name][0] != 'enabled') return;
		ob_start();
		include "$root/{$sections[$name][1]}";
		return ob_get_clean();
	}
	
	// Returns HTML inclusion of CSS files
	function loadCSS() {
		global $root;
		global $css_files;
		$h = "";
		foreach ($css_files as $c) {
			$mtime = @filemtime("$root/$c");
			if ($mtime) $h .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"$c?t=$mtime\" media=\"all\">\n";
		}
		return $h;
	}
	
	// Re-defines sections over default ones
	function overrideSections($array) {
		global $sections;
		foreach ($array as $k => $s) {
			if (!empty($sections[$k])) { // Overrides
				if ($s[0] != 'enabled' && $s[0] != 'disabled') $s[0] = $sections[$k][0]; // Inherit enable/disable
				if ($s[1] == 'inherit') $s[1] = $sections[$k][1]; // Inherit path
			}
			$sections[$k] = $s;
		}
	}
	
?>
