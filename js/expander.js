// JavaScript Document

function toggleSlides(){
	$('.toggler').click(function(e){
		var id=$(this).attr('id');
		var widgetId=id.substring(id.indexOf('-')+1,id.length);
		$('#'+widgetId).slideToggle();
		$(this).toggleClass('sliderExpanded');
		$('.closeSlider').click(function(){
				$(this).parent().hide('slow');
				var relatedToggler='toggler-'+$(this).parent().attr('id');
				$('#'+relatedToggler).removeClass('sliderExpanded');
		});
	});
};
$(function(){
	toggleSlides();
});