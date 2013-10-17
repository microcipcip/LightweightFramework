<?php
	
	// Page settings (override defaults in config/website.php)
	$page_title = "FAQ";
	$page_h1 = "Test: FAQ";
	
?>
<h1><?php echo e($page_h1) ?></h1>
<p>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae sapien justo, sagittis lacinia tortor. Etiam et est vel turpis condimentum faucibus. Curabitur adipiscing mollis felis in convallis. Aliquam erat volutpat. Fusce convallis fringilla ante, at iaculis neque interdum a. Sed nec enim in purus lobortis tempor ac nec lectus. Aenean eget nunc eros. Fusce tempor lacus aliquet quam lacinia fermentum.
</p>

<!-- [Accordion] -->
<div class="accordion">
					 
	<?php	for ($x=1; $x<=10; $x++) : ?>
	<!-- [Accordion Box] -->
	<div class="accordion_title"><h3><span aria-hidden="true" class="icon"></span>Accordion Title <?php echo $x; ?></h3></div>
	<div class="accordion_content">
		<div>
			<p>
				<strong>Accordion content <?php echo $x; ?>:</strong> lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse, aliquam ipsum ante morbi sed ipsum mollis. Sollicitudin viverra, vel varius eget sit mollis. Commodo enim aliquam suspendisse tortor cum diam, commodo facilisis, rutrum et duis nisl porttitor, vel eleifend odio ultricies ut.
			</p>
		</div>	
	</div>	
	<!-- [/End Accordion Box] -->	
	<?php endfor; ?>		
	
</div>
<!-- [/End Accordion] -->