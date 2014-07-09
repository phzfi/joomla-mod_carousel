jQuery(document).ready(function($){
    $('img').one('error', function() {
        $(this).parent().addClass("noimage");
        $(this).remove();
    });

    // if(!$("div.carousel.fp .buttons").is(":visible")){
    //     $("div.carousel.fp, div.carousel.fp div.viewport, div.carousel.fp div.viewport ul.overview li, div.carousel.fp div.viewport ul.overview li div.carousel.fp-item, div.carousel.fp div.viewport ul.overview li").width($(window).width());
    // }

    $('.carousel.fp').tinycarousel({
    	button: true,
    	bullets: false,
    	infinite: true,
    	animation: true,
    	interval: false,
    	axis: "x",
        bullets: true,
    });
    var timer = setInterval(function(){
        if(viewport().width >= 1024) {
            $(".carousel.fp .buttons.next").click();
        }
    }, 10000);

    var currentSlide = 0;

    $(".buttons").click(function(){
        clearInterval(timer);
        hideCurrentSlideText();
        timer = setInterval(function(){
            if(viewport().width >= 1024) {
                $(".carousel.fp .buttons.next").click();
            }
        }, 10000);
    });

    $('.carousel.fp').bind('move', function(){
        if(viewport().width < 1024) {
            currentSlide = $(this).data("plugin_tinycarousel").slideCurrent;
        } else {
            currentSlide = $(this).data("plugin_tinycarousel").slideCurrent + 1;
        }
        if(currentSlide == 1 || currentSlide == 0) {
            $(this).find("li.mirrored").eq(currentSlide).children('.texts').css("opacity", 1);
            $(this).find("li.mirrored").eq(currentSlide).children('.texts').fadeIn(200);
        }
        $(this).find("li").eq(currentSlide).children('.texts').fadeIn(200);
    });
    $(".carousel.fp").trigger('move');


    function hideCurrentSlideText(){
        $(".carousel.fp").find("li").find(".texts").fadeOut(200);
    }

    function viewport() {
        var e = window, a = 'inner';
        if (!('innerWidth' in window )) {
            a = 'client';
            e = document.documentElement || document.body;
        }
        return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
    }


});

