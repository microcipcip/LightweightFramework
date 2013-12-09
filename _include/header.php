<?php
	
?>
<!-- [Header Main] -->
<div class="header-wrap">
	<header id="header">
	
		<!-- [Logo] -->
		<div id="header-logo">
			<a href="index.php"><?php echo e($site_name) ?></a>
		</div>
		<!-- [/End Logo] -->
		
		<!-- [SignUp] -->
		<div id="header-signup">
			<ul>
				<li><a href="#" class="header-signup-register"><span aria-hidden="true" data-icon="&#xe60d;"></span> Register</a></li>
				<li><a href="#" class="header-signup-login popup-ajax" data-effect="mfp-zoom-in"><span aria-hidden="true" data-icon="&#xe610;"></span> LogIn</a></li>
			</ul>
		</div>
		<!-- [/End SignUp] -->	
		
		<!-- [Header Search] -->			
		<div id="header-search">
			<form name="some_name" action="#" method="post">
				<input type="text" placeholder="" />
				<input type="submit" value="Search" />
			</form>					
		</div>
		<!-- [/End Header Search] -->
		
		<!-- [Mobile Navigation] -->
		<div id="mobile-nav">
			<div id="mobile-nav-menu"><span aria-hidden="true" data-icon="&#xe608;"></span></div>
			<div id="mobile-nav-search"><span aria-hidden="true" data-icon="&#xe609;"></span></div>
		</div>
		<!-- [/End Mobile Navigation] -->
		
		<!-- [Menu] -->
		<nav id="header-menu">		
			<?php echo loadMenu() ?>
		</nav>
		<!-- [/End Menu] -->
		
	</header>
</div>
<!-- [/End Header Main] -->