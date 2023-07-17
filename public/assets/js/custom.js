const heroSlider = new Swiper('.hero-slider .swiper', {

    loop: true,

    // If we need pagination

    pagination: false,

    navigation: false,

    spaceBetween: 20,

    slidesPerView: 1.5,

    centeredSlides: false,

    autoplay: {

        delay: 2000,

    },

});



$('#academicSlider').owlCarousel({

    loop:true,

    margin:30,

    nav:true,

    dots: false,

    autoplay:true,

    autoplayTimeout:3000,

    responsive:{

        0:{

            items:1

        },

        600:{

            items:2

        },

        1000:{

            items:3

        }

    }

})



$('#studentSlider').owlCarousel({

    loop:true,

    margin:0,

    nav:true,

    items: 1,

    dots: false,

});





$('#clientSlider').owlCarousel({

    loop:true,

    margin: 25,

    nav:true,

    dots: false,

    responsive:{

        0:{

            items:2,

            nav:false,

            dots: true,

        },

        600:{

            items:3,

            nav:false,

            dots: true,

        },

        1000:{

            items:6

        }

    }

});

$(document).on('click', '.hasnested a', function(){

    $(this).parent().toggleClass('opened');

    $(this).next('ul').slideToggle();

});