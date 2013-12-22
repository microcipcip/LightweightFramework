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
$('.popup-inline').magnificPopup({
	type:'inline',
	midClick: true,
	closeOnBgClick: false,
	removalDelay: 100,
	callbacks: {beforeOpen: function() {this.st.mainClass = this.st.el.attr('data-effect');}}
});
$('.popup-ajax').magnificPopup({
	type:'ajax',
	midClick: true,
	closeOnBgClick: false,
	removalDelay: 100,
	callbacks: {beforeOpen: function() {this.st.mainClass = this.st.el.attr('data-effect');}}
});
$('.popup-iframe').magnificPopup({
	type:'iframe',
	midClick: true,
	closeOnBgClick: false,
	removalDelay: 100,
	callbacks: {beforeOpen: function() {this.st.mainClass = this.st.el.attr('data-effect');}}
});	
$('#header .popup-ajax').magnificPopup({
	items: {
		src: 'login.html',
		type: 'ajax'
	},
	midClick: true,
	closeOnBgClick: false,
	removalDelay: 100,
	callbacks: {beforeOpen: function() {this.st.mainClass = this.st.el.attr('data-effect');}}
});