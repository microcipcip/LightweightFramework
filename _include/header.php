<?php
	
?>
<!-- [Header Main] -->
<div class="wrapper-header">
	<header id="header-main">
	
		<!-- [Logo] -->
		<div id="header-main_logo">
			<a href="index.php"><?php echo e($site_name) ?></a>
		</div>
		<!-- [/End Logo] -->
		
    <!-- [/End LogIn] -->
    <div id="header-main_login">
			<ul>
				<li><a href="#">Register</a></li>
				<li><a href="#" class="popup-external" data-effect="mfp-zoom-in">LogIn</a></li>
			</ul>
    </div>
    <!-- [/End LogIn] -->	
		
		<!-- [Header Search] -->			
		<div id="header-main_search">
			<form name="some_name" action="#" method="post">
				<input type="text" placeholder="" />
				<input type="submit" value="Search" />
			</form>					
		</div>
		<!-- [/End Header Search] -->
		
		<!-- [Mobile Navigation] -->
		<div id="mobile-nav">
			<div id="mobile-nav_menu"><span aria-hidden="true" data-icon="&#xf039;"></span></div>
			<div id="mobile-nav_search"><span aria-hidden="true" data-icon="&#xe005;"></span></div>
		</div>
		<!-- [/End Mobile Navigation] -->
		
		<!-- [Menu] -->
		<nav id="header-main_menu">		
			<?php echo loadMenu() ?>
		</nav>
		<!-- [/End Menu] -->
		
	</header>
</div>
<!-- [/End Header Main] -->