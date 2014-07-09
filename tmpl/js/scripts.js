jQuery(document).ready(function($){
    $('img').one('error', function() {
        $(this).parent().addClass("noimage");
        $(this).remove();
    });

    if(!$("div.carousel.df .buttons").is(":visible")){
        $("div.carousel.df, div.carousel.df div.viewport, div.carousel.df div.viewport ul.overview li, div.carousel.df div.viewport ul.overview li div.carousel.df-item, div.carousel.df div.viewport ul.overview li").width($(window).width());
    }

    $('.carousel.df').tinycarousel({
    	button: true,
    	bullets: false,
    	infinite: true,
    	animation: true,
    	interval: true,
        intervalTime: 5000,
    	axis: "x"
    });

    $(window).resize(function(){
        if(!$("div.carousel.df .buttons").is(":visible")){
            $("div.carousel.df, div.carousel.df div.viewport, div.carousel.df div.viewport ul.overview li, div.carousel.df div.viewport ul.overview li div.carousel.df-item, div.carousel.df div.viewport ul.overview li").width($("body").width());
        } else {
            $("div.carousel.df, div.carousel.df div.viewport, div.carousel.df div.viewport ul.overview li, div.carousel.df div.viewport ul.overview li div.carousel.df-item, div.carousel.df div.viewport ul.overview li").width(643);
        }
    });
});

