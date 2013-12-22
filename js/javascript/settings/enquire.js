enquire.register("only screen and (min-width: 0) and (max-width: 50em)", {
	setup : function() {
		// Show/Hide Mobile Menu	
		$('#mobile-nav-menu span').click(function () {
			// Toggle is-menu-open class
			$('#header').toggleClass('is-menu-open');
		});
		$('#mobile-nav-search span').click(function () {
			// Toggle is-search-open class
			$('#header').toggleClass('is-search-open');				
		});				
	},
	match : function() {
		// Slide Down/Up the secondary nav for mobile
		$('#header-menu > ul > li.has-children a span').click(function(e) {
			e.preventDefault();
			$(this).parent().parent().toggleClass('is-expanded');				
		});			
	},
	unmatch : function() {
		// Disable Slide Down/Up if you exit Mobile view
		$('#header-menu > ul > li.has-children a span').unbind();
	}  
}).register("only screen and (min-width: 50em)", {
	match : function() {
		// Dropdown Menu (delay)
		$('#header-menu > ul > li').hover(function () { 
			$(this).addClass('hovering'); 
		},
		function () { 
			$(this).removeClass('hovering');
		});			
	},
	unmatch : function() {
		// Disable dropdown menu (for mobile)
		$('#header-menu > ul > li').unbind('mouseenter mouseleave');
	} 
});