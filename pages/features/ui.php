<?php
	
	// Page settings (override defaults in config/website.php)
	$page_title = "User Interface";
	$page_h1 = "Test: UI";
	
?>
<h1><?php echo e($page_h1) ?></h1>
<p>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae sapien justo, sagittis lacinia tortor. Etiam et est vel turpis condimentum faucibus. Curabitur adipiscing mollis felis in convallis. Aliquam erat volutpat. Fusce convallis fringilla ante, at iaculis neque interdum a. Sed nec enim in purus lobortis tempor ac nec lectus. Aenean eget nunc eros. Fusce tempor lacus aliquet quam lacinia fermentum.
</p>

<h2>Alert Boxes</h2>
<div class="alert-b">
	This is a standard alert (div.alert-box).
	 <a href="#">test</a>
</div>

<div class="alert-b alert-success">
	This is a success alert (div.alert-box.success).
	<a href="#">test</a>
</div>

<div class="alert-b alert-wrong">
	This is an alert (div.alert-box.alert).
	 <a href="#">test</a>
</div>

<div class="alert-b alert-secondary">
	This is a secondary alert (div.alert-box.secondary).
	 <a href="#">test</a>
</div>
<br />

<h2>Link Buttons</h2>
<p><a href="#" class="btn">Button</a> class="btn"</p>
<p><a href="#" class="btn btn-tiny">Button</a> class="btn btn-tiny"</p>
<p><a href="#" class="btn btn-small">Button</a> class="btn btn-small"</p>
<p><a href="#" class="btn btn-large">Button</a> class="btn btn-large"</p>
<p><a href="#" class="btn btn-secondary">Button</a> class="btn btn-secondary"</p>
<p><a href="#" class="btn btn-success">Button</a> class="btn btn-success"</p>
<p><a href="#" class="btn btn-alert">Button</a> class="btn btn-alert"</p>
<p><a href="#" class="btn btn-inverse">Button</a> class="btn btn-inverse"</p>
<p><a href="#" class="btn btn-info">Button</a> class="btn btn-info"</p>
<p><a href="#" class="btn btn-disabled">Button</a> class="btn btn-disabled"</p>	
<br />

<h2>Link and Input Buttons</h2>
<p><input type="submit" value="button" class="btn" /></p>
<p><a href="#" class="btn">Tutton</a></p>

<p><input type="submit" value="button" class="btn btn-tiny" /></p>
<p><a href="#" class="btn btn-tiny">Tutton</a></p>

<p><input type="submit" value="button" class="btn btn-small" /></p>
<p><a href="#" class="btn btn-small">Tutton</a></p>

<p><input type="submit" value="button" class="btn btn-large" /></p>
<p><a href="#" class="btn btn-large">Tutton</a></p>

<p><input type="submit" value="button" class="btn btn-secondary" /></p>
<p><a href="#" class="btn btn-secondary">Tutton</a></p>

<p><input type="submit" value="button" class="btn btn-success" /></p>
<p><a href="#" class="btn btn-success">Tutton</a></p>

<p><input type="submit" value="button" class="btn btn-alert" /></p>
<p><a href="#" class="btn btn-alert">Tutton</a></p>

<p><input type="submit" value="button" class="btn btn-inverse" /></p>
<p><a href="#" class="btn btn-inverse">Tutton</a></p>

<p><input type="submit" value="button" class="btn btn-disabled" /></p>	
<p><a href="#" class="btn btn-disabled">Tutton</a></p>