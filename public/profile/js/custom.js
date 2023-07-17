jQuery(document).ready(function(){
           jQuery(".toggle_nav, .close").click(function(){
               jQuery("body").toggleClass("show_menu");
           });

          jQuery(window).scroll(function(){
              if (jQuery(window).scrollTop() >= 100) {
                 jQuery('header').addClass('fixed-header');
              }
              else {
                  jQuery('header').removeClass('fixed-header');
              }
          });
           
          $('.logo-slider').owlCarousel({
  			    
  			    loop:true,
  			    margin:30,
  			    nav:true,
  			    responsive:{
  			        0:{
  			            items:1
  			        },

  			        600:{
  			            items:3
  			        },
  			       
  			        1000:{
  			            items:6,
  			        }
  			    }
  			});


        $('.sidebar .cat_filter h3').click(function(){
            $(this).siblings().slideToggle('slide');
            $(this).parent().toggleClass('active');
            $(this).parent().parent().siblings().removeClass('active');
           
        });

       
        
        $('.accordion-wrapper .btn-wrapper button').click(function(){
            $(this).parent().siblings().slideToggle('slide');
            $(this).parent().parent().toggleClass('active');
            
            $(this).parent().parent().siblings().removeClass('active');
            $(this).parent().parent().siblings().children('.collepsing-div').slideUp('medium');
        });

    });
         