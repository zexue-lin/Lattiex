(function ($) {
    "use strict";
    
    new WOW().init();  
    
    
    /*---background image---*/
	function dataBackgroundImage() {
		$('[data-bgimg]').each(function () {
			var bgImgUrl = $(this).data('bgimg');
			$(this).css({
				'background-image': 'url(' + bgImgUrl + ')', // + meaning concat
			});
		});
    }
    
    
    $(window).on('load', function () {
        dataBackgroundImage();
    });
    


    /*---canvas menu activation---*/
    $('.menu_open a').on('click', function(){
        $('.menu_overlay').addClass('active')
    });
    
    $('.menu_close').on('click', function(){
        $('.menu_overlay').removeClass('active')
    });
    

    $(".switcher_language > a").on("click", function() {
        $(this).toggleClass('active');
        $('.lng_dropdown').slideToggle('medium');
    }); 
    
    /*--- Magnific Popup Video---*/
    $('.port_popup').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });
    
    
    $(document).ready(function() {
      $('select,.select_option').niceSelect();
    });
    
      /*---  ScrollUp Active ---*/
    $.scrollUp({
        scrollText: '<i class="ion-android-arrow-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
    
    
    /*blog Isotope activation*/
   $('.blog_page_gallery,.portfolio_page_gallery').imagesLoaded( function() {
        // init Isotope
        var $grid = $('.blog_page_gallery,.portfolio_page_gallery').isotope({
           itemSelector: '.gird_item',
            percentPosition: true,
            masonry: {
                columnWidth: '.gird_item'
            }
        });
            
        // filter items on button click
        $('.blog_messonry_button,.portfolio_messonry_button').on( 'click', 'button', function() {
           var filterValue = $(this).attr('data-filter');
           $grid.isotope({ filter: filterValue });
            
           $(this).siblings('.active').removeClass('active');
           $(this).addClass('active');
        });
       
    });
    
    

    //Tooltip
    tippy("[data-tippy-content]")
   
    
    
    /*---MailChimp---*/
    $('#mc-form').ajaxChimp({
        language: 'en',
        callback: mailChimpResponse,
        // ADD YOUR MAILCHIMP URL BELOW HERE!
        url: 'http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef'

    });
    function mailChimpResponse(resp) {

        if (resp.result === 'success') {
            $('.mailchimp-success').addClass('active')
            $('.mailchimp-success').html('' + resp.msg).fadeIn(900);
            $('.mailchimp-error').fadeOut(400);

        } else if(resp.result === 'error') {
            $('.mailchimp-error').html('' + resp.msg).fadeIn(900);
        }  
    }
 
    /*------------------------------
        Parallax Motion Animation 
    -------------------------------*/
    $('.scene').each(function () {
        new Parallax($(this)[0]);
    });

    
    
})(jQuery);	
