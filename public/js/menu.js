$(document).ready(function() {
	$('.menu-burger__header').click(function(){
        $('.menu-burger__header').toggleClass('open-menu');
        $('.header__nav').toggleClass('open-menu');
        $('.filter').toggleClass('select_not_active');
        $('body').toggleClass('fixed-page');
	});
});