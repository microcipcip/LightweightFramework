// Add Class "has-children" if parent "li" has children "ul"
$('#header-menu > ul > li:has(ul)').addClass('has-children');
// Add span to "a" if parent "li" has children "ul", this will be used to build
// a button to expand the menu when viewing the website on Mobiles phones
$('#header-menu > ul > li:has(ul) > a').append('<span aria-hidden="true" class="icon"></span>');