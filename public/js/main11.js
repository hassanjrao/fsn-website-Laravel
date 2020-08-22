
'use strict';

(function ($) {



    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");

        /*------------------
            Gallery filter
        --------------------*/
        $('.featured__controls li').on('click', function () {
            $('.featured__controls li').removeClass('active');
            $(this).addClass('active');
        });
        if ($('.featured__filter').length > 0) {
            var containerEl = document.querySelector('.featured__filter');
            var mixer = mixitup(containerEl);
        }

    });



    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Humberger Menu
    $(".humberger__open").on('click', function () {
        $(".humberger__menu__wrapper").addClass("show__humberger__menu__wrapper");
        $(".humberger__menu__overlay").addClass("active");
        $("body").addClass("over_hid");
    });

    $(".humberger__menu__overlay").on('click', function () {
        $(".humberger__menu__wrapper").removeClass("show__humberger__menu__wrapper");
        $(".humberger__menu__overlay").removeClass("active");
        $("body").removeClass("over_hid");
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*-----------------------
        Categories Slider
    ------------------------*/
    $(".categories__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 4,
        dots: false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {

            0: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 3,
            },

            992: {
                items: 3,
            }
        }
    });


    $('.hero__categories__all').on('click', function () {
        $('.hero__categories ul').slideToggle(400);
    });

    $('.slider23').slick({
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 1000,
        adaptiveHeight: true,
        fade: true,
        easing: 'ease-in-out',
        dots: true,
        arrows: true,
        prevArrow: '<span class="slider-navigation-arrow slider-navigation-prev"><i class="ion ion-ios-arrow-back"></i></span>',
        nextArrow: '<span class="slider-navigation-arrow slider-navigation-next"><i class="ion ion-ios-arrow-forward"></i></span>',

    });


    if (document.cookie.indexOf('collapsed_Nodes') >= 0) {
        var getCollapsed = Cookies.get('collapsed_Nodes');
        var checkCollapsed = getCollapsed.split('|');
        var arrayLength = checkCollapsed.length;
        for (var i = 0; i < arrayLength; i++) {
            $('[data-node="#' + checkCollapsed[i] + '"]').next('.accordion_body').addClass('hide');
            $('[data-node="#' + checkCollapsed[i] + '"]').children('.plusminus').children('i').attr('class', 'fas fa-plus-square');
        }
    }

    var adjustCookie = function () {
        var tags = [];
        $('.accordion_container .hide').each(function () {
            var tag = $(this).prev('.accordion_head').data('node');
            tags.push(tag.replace('#', ''));
        });

        if (tags.length) {
            Cookies.set('collapsed_Nodes', tags.join('|'), {
                expires: 7,
                path: window.location.pathname
            });
        } else {
            Cookies.remove('collapsed_Nodes', {
                path: window.location.pathname
            });
        }
    }

    $('.accordion_head').click(function () {
        if ($(this).next('.accordion_body').is(':visible')) {
            $(this).next('.accordion_body').slideUp(300);
            $(this).next('.accordion_body').addClass('hide');
            $(this).children('.plusminus').children('i').attr('class', 'fas fa-plus-square');
        } else {
            $(this).next('.accordion_body').slideDown(300);
            $(this).next('.accordion_body').removeClass('hide');
            $(this).children('.plusminus').children('i').attr('class', 'fas fa-minus-square');
        }
        adjustCookie();
    });


    $(".contact-btn").click(function () {
        $('html,body').animate({
            scrollTop: $(".footer").offset().top
        },
            'slow');

    });

    $('#l-name').on('focus', function() {
		// trigger loading api.js (recaptcha.js) script
		var head = document.getElementsByTagName('head')[0];
		var script = document.createElement('script');
		script.type = 'text/javascript';
		script.src = 'https://www.google.com/recaptcha/api.js';
		

		head.appendChild(script);

		// remove focus to avoid js error:
		// Uncaught Error: reCAPTCHA has already been rendered in this element at Object.kh
		$('#l-name','#f-name').off('focus');
	});
	
	
	 $('#f-name').on('focus', function() {
		// trigger loading api.js (recaptcha.js) script
		var head = document.getElementsByTagName('head')[0];
		var script = document.createElement('script');
		script.type = 'text/javascript';
		script.src = 'https://www.google.com/recaptcha/api.js';
		

		head.appendChild(script);

		// remove focus to avoid js error:
		// Uncaught Error: reCAPTCHA has already been rendered in this element at Object.kh
		$('#l-name','#f-name').off('focus');
	});



    $("#enquiry-submit").click(function () {

        if ($("#l-name").val() == "" || $("#l-email").val() == "" || $("#l-mob").val() == "" || $("#l-city").val() == "" || $("#l-sub").val() == "" || $("#l-comm").val() == "") {
            $("#success").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'> Please fill the <strong>form!</strong></div>")
            return false;
        }

        else {

            event.preventDefault();

            $.ajax({
                type: "POST",
                url: "{{ route('contact') }}",
                data: $("#enquiry-form").serialize(),
                success: function (response) {
                    console.log(response);
                    $("#success").html(response);
                }
            })
        }
    });

    $("#enquiry-submit-f").click(function () {

       
        if ($("#f-name").val() == "" || $("#f-email").val() == "" || $("#f-mob").val() == "" || $("#f-city").val() == "" || $("#f-sub").val() == "" || $("#f-comm").val() == "") {
            $("#success-f").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'> Please fill the <strong>form!</strong></div>")
            return false;
        }
        else {

            event.preventDefault();

            $.ajax({
                type: "POST",
                url: "contact",
                data: $("#captcha-form").serialize(),
                success: function (response) {
                    console.log(response);
                    $("#success-f").html(response);
                }
            })
        }

    });
















})(jQuery);