<?php
	
	// =======================================
	// LIGHTWEIGHTFRAMEWORK - Initialization
	// =======================================
	
	ob_start();
	session_start();
	
	// Define root absolute path
	$root = dirname(__FILE__);
	
	// Load configuration
	require_once "$root/_config/website.php";
	require_once "$root/_config/javascript.php";
	
	// =========================================
	// LIGHTWEIGHTFRAMEWORK - Public functions
	// =========================================
	
	// Strings escaping (UTF-8 to HTML)
	function e($string) { 
		return htmlentities($string, ENT_COMPAT, 'UTF-8'); 
	}
	
	// Return an HTML menu reading files structure in pages/
	function loadMenu($from = null) {
		global $root;
		global $page;
		global $menu;
		return loadMenuRecursion(ls("$root/pages", true, false, true), '', $page, $menu);
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
	
	// Re-defines menu options over default ones
	function overrideMenuOptions($options) {
		global $menu;
		foreach ($options as $k => $s) if ($s != 'inherit') $menu[$k] = $s;
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
	
	// =========================================
	// LIGHTWEIGHTFRAMEWORK - Pages setup
	// =========================================
	
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
	$page_path = explode('/', $page);
	foreach (array_slice($page_path, 0, -1) as $i => $page_parent) { // For each parent path
		$page_parent_folder = "$root/pages/" . implode('/', array_slice($page_path, 0, $i));
		foreach (ls($page_parent_folder) as $page_parent_candidate) { // Search for parent file
			if ($page_parent . '.' == substr($page_parent_candidate, 0, strlen($page_parent) + 1)) {
				$page_parent_path = str_replace('//', '/', $page_parent_folder . '/' . $page_parent_candidate);
				ob_start();
				include "$page_parent_path"; // Include parent to make configuration overriding
				ob_end_clean(); // Discard parent output
			}
		}
	}
	$page_file_path = "$root/pages/$page";
	if (!is_file($page_file_path . '.php')) { // File not found? Try appending numbers...
		for ($i = 0; $i < 100; $i++) for ($j = ''; $j !== '000'; $j .= '0') {
			if (is_file($page_file_path . ".$j$i.php")) {
				$page_file_path = $page_file_path . ".$j$i";
				break 2;
			}
		}
	}
	include "$page_file_path.php";
	$content_buffer = ob_get_clean(); // Fill page content buffer
	
	// =========================================
	// LIGHTWEIGHTFRAMEWORK - Private functions
	// =========================================
	
	// Menu recursive builder (used by loadMenu())
	function loadMenuRecursion($files, $prefix = '', $active_page, $o, $level = 0, &$active_flag) {
		$h = '';
		if (!is_null($o['max_depth']) && $o['max_depth'] == 0) return $h;
		$l = '';
		if (!empty($o['1st_level_class']) && $level == 0) $l = ' class="' . $o['1st_level_class'] . '"';
		if (!empty($o['2nd_level_class']) && $level == 1) $l = ' class="' . $o['2nd_level_class'] . '"';
		$h .= "<{$o[wrapper]}$l>";
		$active_flag = false;
		uasort($files, 'loadMenuSort');
		foreach ($files as $m) {
			if (is_array($m)) continue;
			$page = parsePageFile("$prefix$m");
			$h_children = '';
			$active_flag_local = false;
			if (!empty($files[$page[0]])) {
				$o['max_depth'] = is_null($o['max_depth']) ? null : $o['max_depth'] - 1;
				$h_children = loadMenuRecursion($files[$page[0]], $page[1] . '/', $active_page, $o, $level + 1, $active_flag_local);
			}
			$active_flag_local = ($active_flag_local && $o['copy_active_class_to_parent']) || $page[1] == $active_page;
			$active_flag = $active_flag || $active_flag_local;
			$c = $active_flag_local ? ' class="' . $o['active_class'] . '"' : '';
			$h .= "<{$o[items]}$c>";
			$h .= '<a href="index.php?page=' . e($page[1]) . '">' . $o['pre_html'] . e($page[2]) . $o['post_html'] . '</a>';
			$h .= $h_children;
			$h .= "</{$o[items]}>";
		} 
		$h .= "</{$o[wrapper]}>";
		return $h;
	}
	
	// Sort page files (used by loadMenu())
	function loadMenuSort($a, $b) {
		if (is_array($a)) return 1;
		if (is_array($b)) return -1;
		$ap = parsePageFile($a);
		$bp = parsePageFile($b);
		if ($ap[3] == $bp[3]) return strcmp($a, $b);
		elseif ($ap[3] >= $bp[3]) return -1;
		else return 1;
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
	
	// Parse a page file retrieving page name, full name, title and sorting (used by loadMenu() and page inclusion)
	function parsePageFile($path) {
		if (is_array($path)) {
			$ret = array();
			foreach ($path as $p) $ret[] = parsePageFile($p);
		} else {
			$m = array();
			preg_match('|^(.+/)?([^/.]+)(?:\\.([0-9]+))?\\.php$|', $path, $m);
			return array($m[2], $m[1] . $m[2], ucfirst(trim(str_replace("_", " ", $m[2]))), intval($m[3]));
		}
	}
	
?>
