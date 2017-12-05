"use strict";

$(document).on('ready', function() { 

	initParallax();
	initEvents();
	initMasonry();
	initMap();
	/* You can disable srollanimation by removing next function */
	initScrollAnimation();
	$(function() { $('.matchHeight').matchHeight(); });	
	$(".accordion").accordion();
	$(".tabs-ui").tabs();

	/* Lightbox plugin */
	$('.swipebox').swipebox();


	initSwiper();
});

$(window).on('scroll', function (event) {

	checkNavbar();
	checkCountUp();
	initProgressBar();
}).scroll();

/* Parallax fix on window resize */ 
$(window).on('resize', function(){

 	initParallax();
});

$(window).on('load', function(){

	initMasonry()
});

/* All keyboard and mouse events */
function initEvents() {

	/* Tabs block on main page */
	$('.block-tabs').on('click', '.item', function() {

		var parentDiv = $(this).closest(".block-tabs");

		parentDiv.find('.active').removeClass('active');
		parentDiv.find('.'+$(this).data('block')).addClass('active');
		$(this).addClass('active');

		return false;
	});

	/* Show/hide search form in navbar */
	var searchDiv = $('#search'), navbarDiv = $('#navbar');
	searchDiv.on('click', '.search-icon', function() {

		searchDiv.toggleClass('show');
		navbarDiv.toggleClass('show-search');
	});

	/* Up/down counter for input numeric box */
	$('.calc').on('click', '.arrow-up, .arrow-down', function() {

		var val = parseInt($(this).parent().find('input').val(), 10);
		if ($(this).hasClass('arrow-up')) val++; else val--;
		$(this).parent().find('input').val(val).change();
		return false;
	});

	/* 
		Perfect wieght formula user in calculator on main page. 
		* For male. (Height - 100 * 1.15 + Age * 0.05)
		* For female. (Height - 110 * 1.15 + Age * 0.05)

		You can use several calculators on a page
	*/
	$('.calculator').on('change keyup keydown keypress', 'input', function() {

		if ($('input[name="sex"]:checked').val() === 'man') {

			var val = parseInt((parseInt($('#height').val(), 10) - 100) * 1.15 + (parseInt($('#age').val(), 10) * 0.05), 10);
		}
			else {

			var val = parseInt((parseInt($('#height').val(), 10) - 110) * 1.15 + (parseInt($('#age').val(), 10) * 0.05), 10);
		}
		$('.calculator .result span').html(val);
	}).change();

	/* Scrolling to navbar from "go top" button in footer */
    $('footer').on('click', '.go-top', function() {

	    $('html, body').animate({ scrollTop: 0 }, 800);
	});
}

/* Masonry initialization */
function initParallax() {

	// Only for desktop
	if (/Mobi/.test(navigator.userAgent)) return false;

	$('.parallax').parallax("50%", 0.1);
}

/* Swiper slider initialization */
function initSwiper() {

	/* Slider for clients on main page */	
    var clientsSwiper = new Swiper('.clients-slider', {
		direction   : 'horizontal',

		speed		: 1000,
		nextButton	: '.arrow-right',
		prevButton	: '.arrow-left',
	
		autoplay    : 7000,
		autoplayDisableOnInteraction	: false,
    });

	/* Slider for inner pages */	
    var innerSwiper = new Swiper('.slider-inner', {
		direction   : 'horizontal',
        pagination: '.swiper-pagination',
        paginationClickable: true,		
		autoplay    : 4000,
		autoplayDisableOnInteraction	: false,        
    });    
}

/* Masonry initialization */
function initMasonry() {

	$('.masonry').masonry({
	  itemSelector: '.item',
	  columnWidth:  '.item'
	});		
}

/* Animated progress bar */
function initProgressBar() {

	var block = $('.progressItems');

    if (block.length) {

	    var scrollTop = block.offset().top - window.innerHeight;

	    if (!block.data('counted') && $(window).scrollTop() > scrollTop) {

	    	/* Initialized once */
			$('.progressBar').each(function(i, el) {
				progressBar(parseInt($(el).find('.value').html(), 10), $(el));
			});

	    	block.data('counted', 1);
	    }  
	}
}

function progressBar(percent, $element) {
    var progressBarWidth = percent * $element.width() / 100;
    $element.find('.bar div').animate({ width: progressBarWidth }, 1000);
}

/* Scroll animation used for landing page */
function initScrollAnimation() {
	window.sr = ScrollReveal();
	var scrollZoomIn = {
		duration: 400,
		scale    : 0.8,
		afterReveal: function (domEl) { $(domEl).css('transition', 'all .3s ease'); }
	};

	var scrollTextFade = {
		duration: 400,
		afterReveal: function (domEl) { $(domEl).css('transition', 'all .3s ease'); }
	}

	var scrollSliderFull = {
		duration: 1200,
		scale : 1,
		easing   : 'ease-in-out',
		distance : '0px',
		afterReveal: function (domEl) { $(domEl).css('transition', 'all .3s ease'); }
	}

	/* Every element initialized once */
	if ($('.slider-full').length) window.sr.reveal('.slider-full h3, .slider-full p, .slider-full a', scrollSliderFull, 400);

	if ($('.block-dark').length) sr.reveal('.block-dark h3, .block-dark p, .block-dark a', scrollTextFade, 200);
	if ($('.block-white').length) sr.reveal('.block-white h3, .block-white p, .block-white a', scrollTextFade, 20);
}

/* Starting countUp function on landing page */
function checkCountUp() {

	var countBlock = $('.skills');

    if (countBlock.length) {

	    var scrollTop = countBlock.offset().top - window.innerHeight;

	    if (!countBlock.data('counted') && $(window).scrollTop() > scrollTop) {

	    	/* Initialized once */
	    	for (var x = 1; x <= 4; x++) {

				var numAnim = new CountUp('countUp-' + x, 1, $('#countUp-' + x).html());
				numAnim.start();
	    	}

	    	countBlock.data('counted', 1);
	    }  
	}
}

/* Navbar is set darker on main page on scroll */
function checkNavbar() {

	var scroll = $(window).scrollTop(),
    	navBar = $('nav.navbar'),
	    slideDiv = $('.slider-full');

    if (scroll > slideDiv.height() - navBar.height()) navBar.addClass('dark'); else navBar.removeClass('dark');
}

/*  maps init */
function initMap() {
	var mapEl = $('#map');
	var lat,lng,key=mapEl.data('key').replace(/\s/g,''),address=mapEl.data('address').replace(/\s/g,'');
	if (mapEl.length && key) {
	    //动态加入地图css
        mapEl.before('<style>\n' +
        '    .info-title{\n' +
        '        color: white;\n' +
        '        font-size: 14px;\n' +
        '        background-color: rgba(0,155,255,0.8);\n' +
        '        line-height: 26px;\n' +
        '        padding: 0px 0 0 6px;\n' +
        '        font-weight: lighter;\n' +
        '        letter-spacing: 1px\n' +
        '    }\n' +
        '    .info-content{\n' +
        '        padding: 4px;\n' +
        '        color: #666666;\n' +
        '        line-height: 23px;\n' +
        '    }\n' +
        '    .info-content img{\n' +
        '        float: left;\n' +
        '        margin: 3px;\n' +
        '    }\n' +
        '    #map,#map div,#map table td,#map table {\n' +
        '        font-size: 13px !important;\n' +
        '    }\n' +
        '</style>');
        mapEl.before('<link rel="stylesheet" type="text/css" href="https://webapi.amap.com/css/v1.4.1/style1509024629605.css">');
        mapEl.before('<script src="http://webapi.amap.com/maps?v=1.4.1&key='+key+'"></script>');

		var location = mapEl.data('location');
        if(location){
            location = location.split(',');
            lat = location[0];
            if(location[1]){
                lng = location[1];
            }
        }
        setMap(lat,lng,mapEl);
        if(!lat || !lng ){
            $.get('http://restapi.amap.com/v3/geocode/geo?parameters',{
                key:'7132e8ff855ea8928e5fb4627d6c0ed4',//高德地图web请求服务key.
                address:address
            },function(d){
                try{
                    d=JSON.parse(d);
                }catch(e){
                    console.log(e);
                }
                if("geocodes" in d && d.geocodes[0] && "location" in d.geocodes[0]){
                    location = d.geocodes[0].location.split(',');
                    lat = location[0];
                    lng = location[1];
                    setMap(lat,lng,mapEl);
                }
            })
		}
	}
}
function setMap(lat,lng,mapEl){
    if(lat && lng){
        var map = new AMap.Map('map', {
            resizeEnable: true,
            zoom:16,
            center: [lat, lng],
            isHotspot:false,
            zoomEnable:false
        });
        var infowindow;
        var infoWindowContent =
            ( mapEl.data('company') ? '<div class="info-title">'+mapEl.data('company')+'</div>' : '' )+
            '<div class="info-content">'+
            ( mapEl.data('logo') ? '<img style="width:68px;max-height: 68px;" src="'+mapEl.data('logo')+'" />' : '' )+
            ( mapEl.data('address') ? ' 地址 <span class="fa fa-map-marker"></span>:'+mapEl.data('address')+'<br />' : '' )+
            ( mapEl.data('fixed') ? ' 电话 <span class="fa fa-fax"></span> :<a href="tel:'+mapEl.data('fixed')+'">'+mapEl.data('fixed')+'<br />' : '' )+
            '</div>';
        map.plugin('AMap.AdvancedInfoWindow', function () {
            infowindow = new AMap.AdvancedInfoWindow({
                panel: 'panel',
                placeSearch: true,
                asOrigin: true,
                asDestination: true,
                content: infoWindowContent
            });
            infowindow.open(map, [lat, lng]);

        });
        var marker = new AMap.Marker({
            position: [lat, lng],
            offset : new AMap.Pixel(-10, 0)
        });
        marker.setMap(map);
    }
}


(function($) {
    "use strict";


    /* ============= Preloader Close on Click ============= */

    if ($('.loader-wrapper').length) {
        $('.loader-wrapper').on('click', function() {
            $(this).fadeOut();
        });
    }

    /* ============= Homepage Slider ============= */
    if ($('.flexslider').length) {
        $('.flexslider').flexslider({
            animation: "fade"
        });
    }
    /* ============= Partner Logo Carousel ============= */
    if ($('.logo-slides').length) {
        $(".logo-slides").owlCarousel({
            autoplay: true,
            autoplayTimeout: 3000,
            loop: true,
            margin: 10,
            nav: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 2
                },
                767: {
                    items: 3
                },
                991: {
                    items: 4
                },
                1199: {
                    items: 5
                }
            }

        });
    }

    /* ============= Percentage Slider ============= */

    if ($('#skills').length) {

        var skillsDiv = $('#skills');

        $(window).on('scroll', function() {
            var winT = $(window).scrollTop(),
                winH = $(window).height(),
                skillsT = skillsDiv.offset().top;
            if (winT + winH > skillsT) {
                $('.skillbar').each(function() {
                    $(this).find('.skillbar-bar').animate({
                        width: $(this).attr('data-percent')
                    }, 2000);
                });
            }
        });

    }

    /* ============= Service Slider ============= */

    if ($('.service-slider').length) {
        $('.service-slider').flexslider({
            animation: "slide",
            controlNav: false,
            directionNav: true,
            touch: true
        });
    }
    /* ============= Blog Slider ============= */
    if ($('.blog-slide').length) {
        $('.blog-slide').flexslider({
            controlNav: false,
            animation: "slide"
        });
    }

    /* ============= Stats Counter ============= */
    if ($('.counter').length) {
        $('.counter').counterUp({
            delay: 10,
            time: 1500
        });
    }


    $(window).load(function() {

        /* ============= Preloader ============= */

        if ($('.loader-wrapper').length) {
            $('.loader-wrapper').fadeOut();
        }


    }); // End Window.Load

})(jQuery);

