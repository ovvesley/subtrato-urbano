(function ($, window, undefined) {
    "use strict";
    $(function () {
        $('#mainslider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 8000,
            infinite: true,
            dots: true,
            nextArrow: '<i class="nav-arrow nav-main icon-right"></i>',
            prevArrow: '<i class="nav-arrow nav-main icon-left"></i>',
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        arrows: false
                    }
                }
            ]
        });
        $(".gallery-columns-1, ul.wp-block-gallery.columns-1, .wp-block-gallery.columns-1 .blocks-gallery-grid").each(function () {
            $(this).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                autoplay: true,
                autoplaySpeed: 8000,
                infinite: true,
                dots: false,
                nextArrow: '<i class="nav-arrow icon-right"></i>',
                prevArrow: '<i class="nav-arrow icon-left"></i>',
            });
        });
    });
    $(function () {
        $('.widget-area').theiaStickySidebar({
            additionalMarginTop: 30
        });
    });
    $(function () {
        var pageSection = $(".header-image");
        pageSection.each(function (indx) {
            if ($(this).attr("data-background")) {
                $(this).css("background-image", "url(" + $(this).data("background") + ")");
            }
        });
    });
    $(function () {
        $('.icon-search').on('click', function() {
            $('body').toggleClass('united-model');
        });
        $('.cross-exit').on('click', function() {
            $('body').removeClass('united-model');
        });
    });
    $('.gallery, .wp-block-gallery').each(function () {
        $(this).magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
                titleSrc: function (item) {
                    return item.el.attr('title');
                }
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300,
                opener: function (element) {
                    return element.find('img');
                }
            }
        });
    });
    $('.zoom-gallery').each(function () {
        $(this).magnificPopup({
            delegate: 'span',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
                titleSrc: function (item) {
                    return item.el.attr('title');
                }
            },
            zoom: {
                enabled: true,
                duration: 300,
                opener: function (element) {
                    return element.find('img');
                }
            }
        });
    });
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scroll-up').fadeIn();
        } else {
            $('.scroll-up').fadeOut();
        }
    });
    $('.scroll-up').on("click", function (e) {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });
})(jQuery, this);