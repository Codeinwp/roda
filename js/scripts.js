
//Sidebar sizing

jQuery(function($) {
	var height = $(window).height(); 
	$('.widget-area').css('height', height);
	$(window).resize(function() {
		var height = $(window).height(); 
		$('.widget-area').css('height', height);
	});
});

//Toggle sidebar
jQuery(function($) {
	$('.sidebar-toggle').click(function()
	{
		$('.widget-area').toggleClass('widget-area-visible');
		$('.toggles').toggleClass('toggles-push');
		$('.sidebar-toggle').find('i').toggleClass('fa-angle-double-right fa-angle-double-left');		
	});
	$('.sidebar-toggle-inside').click(function()
	{
		$('.widget-area').toggleClass('widget-area-visible');
		$('.sidebar-toggle').find('i').toggleClass('fa-angle-double-right fa-angle-double-left');
	});	
});

//Toggle social
jQuery(function($) {
	$('.social-toggle').click(function()
	{
		$('.social-navigation').toggleClass('social-display');		
	});
	$('.social-close').click(function()
	{
		$('.social-navigation').toggleClass('social-display');		
	});	
});

//Toggle slider
jQuery(function($) {
	$('.slider-toggle').click(function()
	{
		$('#slides').slideToggle();		
	});
	$('.slider-close').click(function()
	{
		$('#slides').slideToggle();	
	});	
});

//Menu dropdown animation
jQuery(function($) {
	$('.sub-menu').hide();
	$('.main-navigation .children').hide();
	$('.menu-item').hover( 
		function() {
			$(this).children('.sub-menu').slideDown();
		}, 
		function() {
			$(this).children('.sub-menu').hide();
		}
	);
	$('.main-navigation li').hover( 
		function() {
			$(this).children('.main-navigation .children').slideDown();
		}, 
		function() {
			$(this).children('.main-navigation .children').hide();
		}
	);	
});

//Fit Vids
jQuery(function($) {
  
  $(document).ready(function(){
    $("body").fitVids();
  });
  
});


//Trigger popovers
jQuery(function($) {
 	 $("[data-toggle=popover]").popover({
        html : true, 
    });
});

//Trigger tooltips
jQuery(function($) {
	$('[data-toggle=tooltip]').tooltip()
});

jQuery(function($) {
	$('.main-navigation .menu').slicknav({
		label: '<i class="fa fa-bars"></i>',
		prependTo: '.mobile-nav',
		closedSymbol: '&#43;',
		openedSymbol: '&#45;'
	});
	$('.info-close').click(function(){
		$(this).parent().fadeOut();
		return false;
	});
});	

//Footer nav
jQuery(function($) {
	var width = $(window).width();
	var contentWidth = $('.content-area').width();
	var margin = (width - contentWidth)/2;
	$('.paging-navigation, .nav-separator').css('margin', -margin);

	$(window).resize(function(){
		var width = $(window).width();
		var contentWidth = $('.content-area').width();
		var margin = (width - contentWidth)/2;
		$('.paging-navigation, .nav-separator').css('margin', -margin);
	});

});