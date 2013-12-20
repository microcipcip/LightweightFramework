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
        function loadMenu($options = null) {
                global $root;
                global $page;
                global $menu;
                $menu_local = $menu;
                if (!empty($options)) foreach ($options as $k => $s) if ($s != 'inherit') $menu_local[$k] = $s;
                return loadMenuRecursion(ls("$root/pages", true, false, true), '', $page, $menu_local);
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
                extract($GLOBALS, EXTR_SKIP);
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
        
        // Returns HTML inclusion of JS files
        function loadJS() {
        	global $root;
        	global $javascript_files;
        	buildJS();
        	$h = "";
        	foreach ($javascript_files as $j) {
        		$mtime = @filemtime("$root/$j");
        		if ($mtime) $h .= "<script src=\"$j?t=$mtime\"></script>\n";
        	}
        	return $h;
        }
        
        // Re-defines menu options over default ones
        function overrideMenuOptions($options, $hereditary = true) {
                global $menu;
                global $includingParent;
                if ($includingParent && !$hereditary) return;
                foreach ($options as $k => $s) if ($s != 'inherit') $menu[$k] = $s;
        }
        
        // Re-defines sections over default ones
        function overrideSections($array, $hereditary = true) {
                global $sections;
                global $includingParent;
                if ($includingParent && !$hereditary) return;
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
        $includingParent = false;
        foreach (array_slice($page_path, 0, -1) as $i => $page_parent) { // For each parent path
                $page_parent_folder = "$root/pages/" . implode('/', array_slice($page_path, 0, $i));
                foreach (ls($page_parent_folder) as $page_parent_candidate) { // Search for parent file
                        if ($page_parent . '.' == substr($page_parent_candidate, 0, strlen($page_parent) + 1)) {
                                $page_parent_path = str_replace('//', '/', $page_parent_folder . '/' . $page_parent_candidate);
                                ob_start();
                                $includingParent = true;
                                include "$page_parent_path"; // Include parent to make configuration overriding
                                $includingParent = false;
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
        function loadMenuRecursion($files, $prefix = '', $active_page, $o, $level = 0, &$active_flag = null) {
                $h = '';
                if (!is_null($o['max_depth']) && $level >= $o['max_depth']) return $h;
                $l = '';
                if (!empty($o['1st_level_class']) && $level == 0) $l = ' class="' . $o['1st_level_class'] . '"';
                if (!empty($o['2nd_level_class']) && $level == 1) $l = ' class="' . $o['2nd_level_class'] . '"';
                $h .= "<{$o['wrapper']}$l>";
                $active_flag = false;
                uasort($files, 'loadMenuSort');
                foreach ($files as $m) {
                        if (is_array($m)) continue;
                        $page = parsePageFile("$prefix$m");
                        if (in_array($page[1], $o['hide_items'])) continue;
                        $h_children = '';
                        $active_flag_local = false;
                        if (!empty($files[$page[0]])) $h_children = loadMenuRecursion($files[$page[0]], $page[1] . '/', $active_page, $o, $level + 1, $active_flag_local);
                        $active_flag_local = ($active_flag_local && $o['copy_active_class_to_parent']) || $page[1] == $active_page;
                        $active_flag = $active_flag || $active_flag_local;
                        $c = $active_flag_local ? ' class="' . $o['active_class'] . '"' : '';
                        $h .= "<{$o['items']}$c>";
                        $h .= '<a href="index.php?page=' . e($page[1]) . '">' . $o['pre_html'] . e($page[2]) . $o['post_html'] . '</a>';
                        $h .= $h_children;
                        $h .= "</{$o['items']}>";
                }
                $h .= "</{$o['wrapper']}>";
                return $h;
        }
        
        // Sort page files (used by loadMenu())
        function loadMenuSort($a, $b) {
                if (is_array($a)) return 1;
                if (is_array($b)) return -1;
                $ap = parsePageFile($a);
                $bp = parsePageFile($b);
                if (empty($ap[3])) $ap[3] = PHP_INT_MAX;
                if (empty($bp[3])) $bp[3] = PHP_INT_MAX;
                if ($ap[3] == $bp[3]) return strcmp($a, $b);
                elseif ($ap[3] >= $bp[3]) return 1;
                else return -1;
        }
        
        // Build Javascript sources
        function buildJS() {
        	global $root;
        	global $js_output;
        	global $js_settings_output;
        	global $js_sources;
        	global $js_settings_sources;
        	
        	// Compute JS sources hash
        	$hash = '';
        	foreach ($js_sources as $k => $v) if ($v[0] == 'enabled') $hash .= basename($v[2]) . '/' . filemtime("$root/{$v[2]}") . '/' . filesize("$root/{$v[2]}") . '/';
        	$hash = md5($hash);
        	
        	// Read the hash from the current build
        	$build = md5('');
        	if (is_file("$root/$js_output")) {
        		$f = fopen("$root/$js_output", 'r');
        		$build = substr(fgets($f), 3, 32);
        		fclose($f);
        	}
        	
        	// Build if something changed
        	if ($hash != $build) {
        		$f = fopen("$root/$js_output", 'w');
        		fputs($f, "/* $hash DO NOT ALTER OR MOVE THIS LINE */\n\n\n");
        		foreach ($js_sources as $k => $v) if ($v[0] == 'enabled') {
        			fputs($f, "/* [$k] */\n\n");
        			fputs($f, file_get_contents("$root/{$v[2]}"));
        			fputs($f, "\n\n/* [/End $k] */\n\n\n");
        		}
        		fclose($f);
        		clearstatcache();
        	}
        	
        	// Compute JS settings-hash
        	$hash = '';
        	foreach ($js_settings_sources as $k => $v) if ($v[0] == 'enabled' || ($v[0] == 'inherit' && isset($js_sources[$k]) && $js_sources[$k][0] == 'enabled')) $hash .= basename($v[2]) . '/' . filemtime("$root/{$v[2]}") . '/' . filesize("$root/{$v[2]}") . '/';
        	$hash = md5($hash);
        	
        	// Read the settings-hash from the current build
        	$build = md5('');
        	if (is_file("$root/$js_settings_output")) {
        		$f = fopen("$root/$js_settings_output", 'r');
        		$build = substr(fgets($f), 3, 32);
        		fclose($f);
        	}
        	
        	// Build if something changed
        	if ($hash != $build) {
        		$f = fopen("$root/$js_settings_output", 'w');
        		fputs($f, "/* $hash DO NOT ALTER OR MOVE THIS LINE */\n\n\n");
        		fputs($f, "$(document).ready(function(){\n\n");
        		foreach ($js_settings_sources as $k => $v) if ($v[0] == 'enabled' || ($v[0] == 'inherit' && isset($js_sources[$k]) && $js_sources[$k][0] == 'enabled')) {
        			fputs($f, "/* [$k] */\n");
        			fputs($f, file_get_contents("$root/{$v[2]}"));
        			fputs($f, "\n/* [/End $k] */\n\n");
        		}
        		fputs($f, "});\n");
        		fclose($f);
        		clearstatcache();
        	}
        	
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
                        return @array($m[2], $m[1] . $m[2], ucfirst(trim(str_replace("_", " ", $m[2]))), intval($m[3]));
                }
        }
        
?>