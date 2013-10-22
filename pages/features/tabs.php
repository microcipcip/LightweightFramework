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
<div class="tabs-horizontal">

	<ul class="resp-tabs-list">
	<?php	for ($x=1; $x<=4; $x++) : ?>	
		<li>Tab <?php echo $x; ?></li>
	<?php endfor; ?>
	</ul>	

	<div class="resp-tabs-container">
	<?php	for ($x=1; $x<=4; $x++) : ?>	
		<div>
			<p><strong>Tab <?php echo $x; ?>:</strong> Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse, aliquam ipsum ante morbi sed ipsum mollis. Sollicitudin viverra, vel varius eget sit mollis. Commodo enim aliquam suspendisse tortor cum diam, commodo facilisis, rutrum et duis nisl porttitor, vel eleifend odio ultricies ut, orci in adipiscing felis velit nibh. Consectetuer porttitor feugiat vestibulum sit feugiat, voluptates dui eros libero. Etiam vestibulum at lectus.</p>
		</div>	
	<?php endfor; ?>	
	</div>
	
</div>			   
<!-- [/End Tabs] -->

<br /><br />

<!-- [Tabs] -->
<div class="tabs-vertical">

	<ul class="resp-tabs-list">
	<?php	for ($x=1; $x<=4; $x++) : ?>	
		<li>Tab <?php echo $x; ?></li>
	<?php endfor; ?>
	</ul>	

	<div class="resp-tabs-container">
	<?php	for ($x=1; $x<=4; $x++) : ?>	
		<div>
			<p><strong>Tab <?php echo $x; ?>:</strong> Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse, aliquam ipsum ante morbi sed ipsum mollis. Sollicitudin viverra, vel varius eget sit mollis. Commodo enim aliquam suspendisse tortor cum diam, commodo facilisis, rutrum et duis nisl porttitor, vel eleifend odio ultricies ut, orci in adipiscing felis velit nibh. Consectetuer porttitor feugiat vestibulum sit feugiat, voluptates dui eros libero. Etiam vestibulum at lectus.</p>
		</div>	
	<?php endfor; ?>	
	</div>
	
</div>			   
<!-- [/End Tabs] -->