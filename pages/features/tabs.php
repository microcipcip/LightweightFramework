<?php
	
	// Page settings (override defaults in config/website.php)
	$page_title = "Tabs";
	$page_h1 = "Test: Tabs";
	
?>
<h1><?php echo e($page_h1) ?></h1>
<p>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae sapien justo, sagittis lacinia tortor. Etiam et est vel turpis condimentum faucibus. Curabitur adipiscing mollis felis in convallis. Aliquam erat volutpat. Fusce convallis fringilla ante, at iaculis neque interdum a. Sed nec enim in purus lobortis tempor ac nec lectus. Aenean eget nunc eros. Fusce tempor lacus aliquet quam lacinia fermentum.
</p>

<!-- [Tabs] -->
<div class="tabs minimal hide-title" id="tabs-default">

	<?php	for ($x=1; $x<=4; $x++) : ?>	
	<section>
		<span>Title <?php echo $x; ?></span>	
		<p>
			<strong>Tab <?php echo $x; ?>:</strong> Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse, aliquam ipsum ante morbi sed ipsum mollis. Sollicitudin viverra, vel varius eget sit mollis. Commodo enim aliquam suspendisse tortor cum diam, commodo facilisis, rutrum et duis nisl porttitor, vel eleifend odio ultricies ut, orci in adipiscing felis velit nibh. Consectetuer porttitor feugiat vestibulum sit feugiat, voluptates dui eros libero. Etiam vestibulum at lectus.
		</p>
	</section>	
	<?php endfor; ?>	
			
</div>			   
<!-- [/End Tabs] -->