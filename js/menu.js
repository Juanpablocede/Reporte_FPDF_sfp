$(document).ready(function(){
	// Mostrando Menu
	$('#button-menu').click(function(){
		if($('#button-menu').attr('class') == 'fa fa-bars'){
			$('#button-menu').removeClass('fa fa-bars').addClass('fa fa-close');
			$('.navegacion .menu').css({'left':'0px'});
			$('.navegacion').css({'width':'100%', 'background':'rbga(0,0,0,.3)'});
		} else {
			$('#button-menu').removeClass('fa fa-close').addClass('fa fa-bars');
			$('.navegacion .menu').css({'left':'-355px'});
			$('.navegacion .submenu').css({'left':'-355px'});
			$('.navegacion').css({'width':'0%', 'background':'rbga(0,0,0,.0)'});
		}
	});

	// Mostrar Submenu
	$('.navegacion .menu > .item-submenu a').click(function(){
		var positionMenu = $(this).parent().attr('menu');
		$('.item-submenu[menu='+positionMenu+'] .submenu').css({'left':'0px'});
	});

	$('.navegacion .submenu li.go-back').click(function(){
		$(this).parent().css({'left':'-355px'})
	});

});
