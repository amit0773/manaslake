var $j = jQuery.noConflict();
// custom js
$j(document).ready(function(){
	$j('.menu-item-has-children').on('click', function(e) {
		e.preventDefault();
		$j(this).find('ul.sub-menu').toggle();
		if($j(this).find('ul.sub-menu').is(':hidden')){
		$j(this).find('ul.sub-menu').parent().addClass("uparrow").removeClass('downarrow');
		}else{
		$j(this).find('ul.sub-menu').parent().addClass("downarrow").removeClass('uparrow'); 
		}
		
	});
});
