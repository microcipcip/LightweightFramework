<?php
	
	// Load LightweightFramework
	require_once 'engine.php';
	
?>
<?php echo loadSection('head') ?> 
<body class="<?php echo (empty($body_class) ? '' : $body_class) ?>">
	<?php echo loadSection('header') ?> 
	<?php echo loadSection('content') ?> 
	<?php echo loadSection('footer') ?> 
</body>
</html>