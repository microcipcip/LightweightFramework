<?php
	
	// Load LightweightFramework
	require_once 'engine.php';
	
?>
<?php include("_include/head.php") ?>
<body class="<?php echo (empty($body_class) ? '' : $body_class) ?>">

	<?php include("_include/header.php") ?>
	
	<!-- [Content] -->
	<div class="wrapper-content">
		<div id="content">	
			
			<?php echo loadSection('slideshow') ?>
		
			<!-- [Text] -->
			<div id="text">	
				<?php echo loadContent(); ?>
			</div>
			<!-- [/End Text] -->
			
			<?php echo loadSection('sidebar') ?> 
	
		</div>
	</div>
	<!-- [/End Content] -->
		
	<?php include("_include/footer.php") ?> 

</body>
</html>