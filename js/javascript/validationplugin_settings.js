// Contact form	 
$('#contactform').validate({
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
		$(element).parent().parent('li').addClass('error');
	},
	unhighlight: function(element) {
		$(element).parent().parent('li').removeClass('error');
	}	
});		