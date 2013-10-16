<?php
	
?>
<!-- [Header Main] -->
<div class="wrapper-header">
	<header id="header-main">
	
		<!-- [Logo] -->
		<div id="header-logo">
			<a href="index.php"><?php echo e($site_name) ?></a>
		</div>
		<!-- [/End Logo] -->
		
    <!-- [/End LogIn] -->
    <div id="header-login">
     	<a href="#popup-login" class="popup-inline">
        Login
      </a>
    </div>
    <!-- [/End LogIn] -->		
		
		<!-- [Header Search] -->			
		<div id="header-search">
			<form name="some_name" action="#" method="post">
				<input type="text" placeholder="" />
				<input type="submit" value="Search" />
			</form>					
		</div>
		<!-- [/End Header Search] -->
		
		<!-- [Mobile Navigation] -->
		<div id="mobile-navigation">
			<div id="mobile-menu"><span aria-hidden="true" data-icon="&#xf039;"></span></div>
			<div id="mobile-search"><span aria-hidden="true" data-icon="&#xe005;"></span></div>
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