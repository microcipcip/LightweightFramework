/* [jQuery] */
$(document).ready(function(){
	
	/* [Slideshow] */
	$("#slide-rslides .rslides").responsiveSlides({
		auto: true,             // Boolean: Animate automatically, true or false
		speed: 500,            // Integer: Speed of the transition, in milliseconds
		timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
		pager: true,           // Boolean: Show pager, true or false
		nav: true,             // Boolean: Show navigation, true or false
		random: false,          // Boolean: Randomize the order of the slides, true or false
		pause: false,           // Boolean: Pause on hover, true or false
		pauseControls: true,    // Boolean: Pause when hovering controls, true or false
		prevText: "Previous",   // String: Text for the "previous" button
		nextText: "Next",       // String: Text for the "next" button
		maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
		navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
		manualControls: "",     // Selector: Declare custom pager navigation
		namespace: "rslides",   // String: Change the default namespace used
		before: function(){},   // Function: Before callback
		after: function(){}     // Function: After callback
	});	
	/* [/End Slideshow] */
	
	/* [Tabs] */
	$('#tabs-horizontal').easyResponsiveTabs({
		type: 'default', // Types: default, vertical, accordion
		width: 'auto', // auto or any width like 600px
		fit: true, // 100% fit in a container
		closed: false // Start closed if in accordion view
	});	
	
	$('#tabs-vertical').easyResponsiveTabs({
		type: 'vertical', // Types: default, vertical, accordion
		width: 'auto', // auto or any width like 600px
		fit: true // 100% fit in a container
	});		
	/* [/End Accordion Tabs] */
	
	/* [Accordion FAQ] */
	$('.accordion').makeFAQ({
		indexTitle: "My Index",
		displayIndex: false,
		faqHeader: ".accordion_title"
	});
	/* [/End Accordion FAQ] */		
	
	/* [FitVids] */
	 $("#video").fitVids();
	/* [/End FitVids] */	
	
	/* [Magnific Popup] */
	$('.popup-single').magnificPopup({
		delegate: 'a',
		type:'image',
		gallery:{enabled:false},
		removalDelay: 500,
		callbacks: {
			beforeOpen: function() {
				// just a hack that adds mfp-anim class to markup 
				this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
				this.st.mainClass = this.st.el.attr('data-effect');
			}
		}
	});	
	$('.popup-multiple').magnificPopup({
		delegate: 'a',
		type:'image',
		gallery:{enabled:true},
		removalDelay: 500,
		callbacks: {
			beforeOpen: function() {
				// just a hack that adds mfp-anim class to markup 
				this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
				this.st.mainClass = this.st.el.attr('data-effect');
			}
		}
	});		
	$(".popup-inline").magnificPopup({
		type:"inline",
		midClick: true,
		closeOnBgClick: false,
		removalDelay: 100,
		callbacks: {beforeOpen: function() {this.st.mainClass = this.st.el.attr('data-effect');}}
	});
	$(".popup-external").magnificPopup({
		type:"ajax",
		midClick: true,
		closeOnBgClick: false,
		removalDelay: 100,
		callbacks: {beforeOpen: function() {this.st.mainClass = this.st.el.attr('data-effect');}}
	});	
	/* [/End Magnific Popup] */		

	/* [jQuery Form Validation] */
	// Contact form	
	$("#contactform").validate({
		rules: {
			name: {
				required: true,
				minlength: 2				
			},
			email: {
				required: true,
				email: true
			},
			subjected: {
				required: true,
				minlength: 4
			},		
			message: {
				required: true,
				minlength: 20
			}
		},
		messages: {
			name: {
				required: "Inserisci il tuo nome",
				minlength: "Il tuo nome deve essere lungo almeno 2 caratteri"
			},
			email: {
				required: "Inserisci un indirizzo email",
				email: "Inserisci un indirizzo email valido"
			},
			subjected: {
				required: "Inserisci l'oggetto",
				minlength: "L'oggetto deve essere lungo almeno 4 caratteri"
			},
			message: {
				required: "Inserisci il messaggio",
				minlength: "Il messaggio deve essere lungo almeno 20 caratteri"
			}			
		},
    errorElement: "small",    
    errorPlacement: function(error, element) {
			if (element.attr('type') === 'radio' || element.attr('type') === 'checkbox') {
				error.appendTo(element.parent());
      }
      else {
				error.insertAfter(element);
      }
    },		
		highlight: function(element) {
			$(element).parent('li').addClass('error');
		},
		unhighlight: function(element) {
			$(element).parent('li').removeClass('error');
		}	
	});		
	/* [/End jQuery Form Validation] */			

    /* [Back to top] */
	$('#toTop').click(function () { 
		$('body,html').animate({ scrollTop: 0 }, 800);
		$('#header-main').addClass('is-menu-open');
		if($("#header-main.is-menu-open")[0]) { 
			var escape = $('<div/>').html('&#xe006;').text();
			$('#mobile-nav_menu span').attr("data-icon", escape);		
		} 
		else {
			var escape = $('<div/>').html('&#xf039;').text();
			$('#mobile-nav_menu span').attr("data-icon", escape);					
		}	
	});		
	/* [/End Back to top] */
	
	/* [Social Networks] */	
	if ($('.box-big .box-socials').is('*')) {
		// Add div necessary for facebook like to work
		$('body').prepend('<div id="fb-root"></div>');
		// Asynchronous loading of socials...
		(function(w, d, s) {
		  function go(){
		  var js, fjs = d.getElementsByTagName(s)[0], load = function(url, id) {
		  if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.src = url; js.id = id;
			fjs.parentNode.insertBefore(js, fjs);
		  };
		  load('//connect.facebook.net/en_US/all.js#xfbml=1&status=0', 'fbjssdk');
		  load('//apis.google.com/js/plusone.js', 'gplus1js');
		  load('//platform.twitter.com/widgets.js', 'tweetjs');
		 }
		 if (w.addEventListener) { w.addEventListener("load", go, false); }
		  else if (w.attachEvent) { w.attachEvent("onload",go); }
		 }(window, document, 'script'));	
	}	
	/* [/End Social Networks] */	

	// Add Class "has-children" if parent "li" has children "ul"
	$("#header-main_menu > ul > li:has(ul)").addClass('has-children');
	// Add span to "a" if parent "li" has children "ul", this will be used to build
	// a button to expand the menu when viewing the website on Mobiles phones
	$("#header-main_menu > ul > li:has(ul) > a").append('<span aria-hidden="true" class="icon"></span>');	
	
	/* [Media Queries] */
	enquire.register("only screen and (min-width: 0) and (max-width: 50em)", {
		setup : function() {
			// Show/Hide Mobile Menu	
			$('#mobile-nav_menu span').click(function () {
				// Toggle is-menu-open class
				$('#header-main').toggleClass('is-menu-open');
			});
			$('#mobile-nav_search span').click(function () {
				// Toggle is-search-open class
				$('#header-main').toggleClass('is-search-open');				
			});				
		},
		match : function() {
			// Slide Down/Up the secondary nav for mobile
			$('#header-main_menu > ul > li.has-children a span').click(function(e) {
				e.preventDefault();
				$(this).parent().parent().toggleClass('is-expanded');				
			});			
		},
		unmatch : function() {
			// Disable Slide Down/Up if you exit Mobile view
			$('#header-main_menu > ul > li.has-children a span').unbind();
		}  
	}).register("only screen and (min-width: 50em)", {
		match : function() {
			// Dropdown Menu (delay)
			$("#header-main_menu > ul > li").hover(function () { 
				$(this).addClass('hovering'); 
			},
			function () { 
				$(this).removeClass('hovering');
			});			
		},
		unmatch : function() {
			// Disable dropdown menu (for mobile)
			$("#header-main_menu > ul > li").unbind('mouseenter mouseleave');
		} 
    });
	/* [/End Media Queries] */
	
});
/* [/End jQuery] */