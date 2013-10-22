<?php
	
?>
<!-- [Header Main] -->
<div class="header-wrapper">
	<header id="header">
	
		<!-- [Logo] -->
		<div id="header_logo">
			<a href="index.php"><?php echo e($site_name) ?></a>
		</div>
		<!-- [/End Logo] -->
		
<<<<<<< 7a058007c6330143bd640e1c9bf7e1eb20526b34
    <!-- [/End LogIn] -->
    <div id="header-main_login">
			<ul>
				<li><a href="#">Register</a></li>
				<li><a href="#" class="popup-external" data-effect="mfp-zoom-in">LogIn</a></li>
			</ul>
    </div>
    <!-- [/End LogIn] -->	
=======
    <!-- [SignUp] -->
    <div id="header_signup">
			<ul>
				<li><a href="#" class="header_signup_register"><span aria-hidden="true" data-icon="&#xe60d;"></span> Register</a></li>
				<li><a href="#" class="popup-external header_signup_login" data-effect="mfp-zoom-in"><span aria-hidden="true" data-icon="&#xe610;"></span> LogIn</a></li>
			</ul>
    </div>
    <!-- [/End SignUp] -->	
>>>>>>> b23032f377f6b97b68f09b35e66b32085fafa8e0
		
		<!-- [Header Search] -->			
		<div id="header_search">
			<form name="some_name" action="#" method="post">
				<input type="text" placeholder="" />
				<input type="submit" value="Search" />
			</form>					
		</div>
		<!-- [/End Header Search] -->
		
		<!-- [Mobile Navigation] -->
		<div id="mobile-nav">
			<div id="mobile-nav_menu"><span aria-hidden="true" data-icon="&#xe608;"></span></div>
			<div id="mobile-nav_search"><span aria-hidden="true" data-icon="&#xe609;"></span></div>
		</div>
		<!-- [/End Mobile Navigation] -->
		
		<!-- [Menu] -->
		<nav id="header_menu">		
			<?php echo loadMenu() ?>
		</nav>
		<!-- [/End Menu] -->
		
	</header>
</div>
<!-- [/End Header Main] -->