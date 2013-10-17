<?php
	
	// Page settings (override defaults in config/website.php)
	$page_title = "Gallery";
	$page_h1 = "Test: Gallery";
	
?>
<h1><?php echo e($page_h1) ?></h1>
<p>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae sapien justo, sagittis lacinia tortor. Etiam et est vel turpis condimentum faucibus. Curabitur adipiscing mollis felis in convallis. Aliquam erat volutpat. Fusce convallis fringilla ante, at iaculis neque interdum a. Sed nec enim in purus lobortis tempor ac nec lectus. Aenean eget nunc eros. Fusce tempor lacus aliquet quam lacinia fermentum.
</p>

<!-- [Gallery] -->	
<div class="gallery-custom popup-multiple">
	<?php	for ($x=1; $x<=11; $x++) : ?>
	<a href="img/_test/pics/gal<?php echo $x; ?>.jpg" data-effect="mfp-zoom-in"><img src="img/_test/pics/gal<?php echo $x; ?>.jpg" alt="#" /></a>
	<?php endfor; ?>			
</div>			
<!-- [/End Gallery] -->	