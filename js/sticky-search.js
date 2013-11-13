// JavaScript Document

$(function(){
        // Check the initial Poistion of the Sticky Header
        var stickyHeaderTop = $('#stickyheader').offset().top;

        $(window).scroll(function(){
                if( $(window).scrollTop() > stickyHeaderTop ) {
                        $('#stickyheader').css({position: 'fixed', top: '0px'});
                } else {
                        $('#stickyheader').css({position: 'static', top: '0px'});
                }
        });
  });
  