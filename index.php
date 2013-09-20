<?php
	
	// Load LightweightFramework
	require_once 'engine.php';
	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title><?php echo e($page_title) ?></title>
	<?php echo loadCSS() ?>
</head>

<body class="<?php echo (empty($body_class) ? '' : $body_class) ?>">

	<?php include("include/header.php") ?>
	
	<?php echo loadMenu() ?>
	
	<?php echo loadSection('slideshow') ?>
	
	<div class="content">
		<?php echo loadContent(); ?>
		<?php echo loadSection('sidebar1') ?> 
		<?php echo loadSection('sidebar2') ?>
	</div>
	
	<?php include("include/footer.php") ?> 

</body>

</html>