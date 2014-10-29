var $j = jQuery.noConflict();
// custom js
$j(document).ready(function(){
	$j('.menu-item-has-children').on('click', function(e) {
		//e.preventDefault();
		
		console.log($j(e.target).attr('href'))
			if( $j(e.target).attr('href')  && $j(e.target).attr('href') == '#' ) {
			$j(this).find('ul.sub-menu').toggle();
			if($j(this).find('ul.sub-menu').is(':hidden')){
			$j(this).find('ul.sub-menu').parent().addClass("uparrow").removeClass('downarrow');
			}else{
			$j(this).find('ul.sub-menu').parent().addClass("downarrow").removeClass('uparrow'); 
		}
}else{
return;
	}
		
	});
	
	if ($j(window).width() < 797) {
		  $j('#mapplic1').remove();
		   $j('.urban-design').remove();
		    $j('.ecology-design').remove();
		$j('.substainability').remove();
			$j('.mobile-hide').remove();
		}
		
	
        $j(".contact").click(function () {
            $j("#scrolltriggered").show();
	$j('#scrolltriggered').css({bottom:'0px',visibility:'visible'});
        });

   
		
});
