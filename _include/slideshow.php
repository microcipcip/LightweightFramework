<?php
	
?>
<!-- [Slideshow Responsive] -->
<div id="slide-rslides">
	<ul class="rslides">
		<?php	for ($x=1; $x<=4; $x++) : ?>
		<li>
			<img src="img/_test/slide/<?php echo $x; ?>.jpg" alt="#" />
			<div class="slide-caption">
				<div class="slide-content">
					<strong>Slide <?php echo $x; ?></strong> 
					Lore ipsa ipsum is dummy text that I use here as an example
				</div>
			</div>
		</li>
		<?php endfor; ?>
	</ul>	
</div>	
<!-- [/End Slideshow Responsive] -->