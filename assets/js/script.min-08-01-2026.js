document.addEventListener("DOMContentLoaded", function() {
    var lazyImages = document.querySelectorAll('img[data-src][loading="lazy"]');
    var lazyImageObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                var lazyImage = entry.target;
                lazyImage.src = lazyImage.dataset.src;
                lazyImage.alt = lazyImage.dataset.alt;
                lazyImage.removeAttribute("data-src");
                lazyImage.removeAttribute("loading");
                lazyImageObserver.unobserve(lazyImage);
            }
        });
    }
    );
    lazyImages.forEach(function(lazyImage) {
        lazyImageObserver.observe(lazyImage);
    });
});
$(document).ready(function() {
    $(".Brands-logo").slick({
        infinite: true,
        vertical: false,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        dots: false,
        pauseOnHover: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<button class="slide-prev"></button>',
        nextArrow: '<button class="slide-nxt"></button>',
        responsive: [{
            breakpoint: 992,
            settings: {
                arrows: false,
                slidesToShow: 3
            }
        }, {
            breakpoint: 768,
            settings: {
                arrows: false,
                slidesToShow: 2
            }
        }]
    });
    $(".testimonials-slider").slick({
        infinite: true,
        vertical: false,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: false,
        pauseOnHover: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<button class="slide-prev"></button>',
        nextArrow: '<button class="slide-nxt"></button>',
    });
    $(".clients-slider").slick({
        infinite: true,
        vertical: false,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        dots: false,
        pauseOnHover: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<button class="slide-prev"></button>',
        nextArrow: '<button class="slide-nxt"></button>',
        responsive: [{
            breakpoint: 576,
            settings: {
                arrows: false,
                slidesToShow: 2
            }
        }, ]
    });
    $(".Related-product").slick({
        infinite: true,
        vertical: false,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        dots: false,
        pauseOnHover: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<button class="slide-prev"></button>',
        nextArrow: '<button class="slide-nxt"></button>',
        responsive: [{
            breakpoint: 992,
            settings: {
                arrows: false,
                slidesToShow: 3
            }
        }, {
            breakpoint: 768,
            settings: {
                arrows: false,
                slidesToShow: 2
            }
        }]
    });
});
if ($(window).width() >= 992) {
    window.onscroll = function() {
        myFunction();
    }
    ;
    var header = document.getElementById("header");
    var sticky = 300;
    function myFunction() {
        if (window.pageYOffset >= sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
}


// $('#slider-pro').sliderPro();
// if ($('#slider-pro').length > 0) {
//     $('#slider-pro').sliderPro({
//         width: 750,
//         height: 630,
//         fade: true,
//         arrows: true,
//         buttons: false,
//         fullScreen: false,
//         shuffle: false,
//         smallSize: 500,
//         mediumSize: 768,
//         largeSize: 1024,
//         thumbnailArrows: false,
//         autoplay: true,
//         thumbnailWidth: 80,
//         thumbnailHeight: 80,
//         breakpoints: {
//             500: {
//                 thumbnailWidth: 60,
//                 thumbnailHeight: 30
//             }
//         }
//     });
// }

jQuery(function($) {
    // Check if the element exists AND the plugin is loaded
    if ($('#slider-pro').length > 0 && typeof $.fn.sliderPro === 'function') {
        $('#slider-pro').sliderPro({
            width: 750,
            height: 630,
            fade: true,
            arrows: true,
            buttons: false,
            fullScreen: false,
            shuffle: false,
            smallSize: 500,
            mediumSize: 768,
            largeSize: 1024,
            thumbnailArrows: false,
            autoplay: true,
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            breakpoints: {
                500: {
                    thumbnailWidth: 60,
                    thumbnailHeight: 30
                }
            }
        });
    } else {
        console.warn("SliderPro not initialized — missing element or plugin.");
    }
});

$(document).ready(function() {
    $(document).on('submit', '.contact-enquiry', function(e) {
        e.preventDefault();
        var str = $(this).serialize();
        var res = $("#secondCaptcha").val();
        if (res == "" || res == undefined || res.length == 0) {
            e.preventDefault();
            if ($("#RecaptchaField1").next(".validation").length == 0) {
                $("#RecaptchaField1").after("<div class='validation' style='color:#a94442;font-size: 13px;margin-bottom: 14px;'>Please verify that you are not a robot</div>");
            }
        } else {
            $.ajax({
                type: "POST",
                // url: '<?= Yii::$app->homeUrl; ?>site/contact-enquiry',
                url : 'https://www.astropackgulf.com/site/contact-enquiry',
                data: str,
                success: function(data) {
                    if (data == 1) {
                        $("#SuccessModal").addClass("show");
                        $("#SuccessModal").css("display", "block");
                        $('#SuccessModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                    }
                                  // 5) Redirect to thank-you page
                window.location.href = "https://www.astropackgulf.com/thank-you";
                }
            });
        }
    });
    $(document).on('click', '#modal-dismiss', function(e) {
        location.reload();
    });
    $(document).on('submit', '.product-enquiry1', function(e) {
        var res = $("#secondCaptcha").val();
        if (res == "" || res == undefined || res.length == 0) {
            e.preventDefault();
            if ($("#RecaptchaField1").next(".validation").length == 0) {
                $("#RecaptchaField1").after("<div class='validation' style='color:#a94442;font-size: 13px;margin-bottom: 14px;'>Please verify that you are not a robot</div>");
            }
        } else {
            $('.validation').remove();
        }
    });
    $(document).on('submit', '.product-enquiry2', function(e) {
        var res = $("#firstCaptcha").val();
        if (res == "" || res == undefined || res.length == 0) {
            e.preventDefault();
            if ($("#RecaptchaField2").next(".validation").length == 0) {
                $("#RecaptchaField2").after("<div class='validation' style='color:#a94442;font-size: 13px;margin-bottom: 14px;'>Please verify that you are not a robot</div>");
            }
        } else {
            $('.validation').remove();
        }
    });
    $(document).on('submit', '.product-enquiry', function(e) {
        e.preventDefault();
        var str = $(this).serialize();
        $.ajax({
            type: "POST",
            url: '<?= Yii::$app->homeUrl; ?>site/products-enquiry',
            data: str,
            success: function(data) {
                if (data == 1) {
                    $('.prod-success').before('<div id="email-alert" style="color: #28a745;font-weight: 600;">Your Poduct Enquiry Send Successfully</div>');
                }
                $('#name').val("");
                $('#email').val("");
                $('#phone').val("");
                $('#message').val("");
                $('#email-alert').delay(2000).fadeOut('slow');
            }
        });
    });
    $(document).on('click', '.quick-enqiry', function(e) {
        e.preventDefault();
        $("#details14").addClass("show");
        $('html, body').animate({
            scrollTop: $('#details14').offset().top - 200
        }, 'slow');
    });
    // $(document).on('submit', '.brochure-enquiry', function(e) {
    //     e.preventDefault();
    //     var product_id=$('#product_id').val();
    //     var str = $(this).serialize() + '&product_id=' + product_id;
    //     var res = $("#thirdCaptcha").val();
    //     if (res == "" || res == undefined || res.length == 0) {
    //         e.preventDefault();
    //         if ($("#RecaptchaField3").next(".validation").length == 0) {
    //             $("#RecaptchaField3").after("<div class='validation' style='color:#a94442;font-size: 13px;margin-bottom: 14px;text-align: left;'>Please verify that you are not a robot</div>");
    //         }
    //     } else {
    //         $.ajax({
    //             type: "POST",
    //             // url: '<?= Yii::$app->homeUrl; ?>site/brochure-download',
    //             url : 'https://www.astropackgulf.com/site/brochure-download',
    //             data: str,
    //             success: function(data) {
    //                 $('.validation').remove();
    //                 if (data != 0) {
    //                     window.open(data, '_blank');
    //                 }
    //                 $('#name').val("");
    //                 $('#email').val("");
    //                 $('#phone').val("");
    //                 $('#message').val("");
    //                 $('#videopopup').modal('toggle');
    //             }
    //         });
    //     }
    // });
    $(document).on('submit', '.news-letter', function(e) {
        e.preventDefault();
        var str = $(this).serialize();
        $.ajax({
            type: "POST",
            url: '<?= Yii::$app->homeUrl; ?>site/news-letter',
            data: str,
            success: function(data) {
                if (data == 1) {
                    $('.news-letter').append('<div id="newsletter-alert" style="color: #28a745;font-weight: 600;padding-top: 10px;">Your Request Send Successfully</div>');
                } else if (data == 2) {
                    $('.news-letter').append('<div id="newsletter-alert" style="color: #28a745;font-weight: 600;padding-top: 10px;">Already Send Rrequest</div>');
                }
                $('#subscribe-email').val("");
                $('#newsletter-alert').delay(2000).fadeOut('slow');
            }
        });
    });
    $(document).on('click', '.home-page-readmore', function() {
        var url = $(this).data('href');
        window.location.href = '<?= Url::base(); ?>' + url;
    });
});
var Tawk_API = Tawk_API || {}
  , Tawk_LoadStart = new Date();
(function() {
    var s1 = document.createElement("script")
      , s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    // s1.src = 'https://embed.tawk.to/5caf1991d6e05b735b420ad9/default';
    s1.src='https://embed.tawk.to/6710140d2480f5b4f58eb92d/1iabcslja';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
}
)();
var CaptchaCallback = function() {
    var widget1;
    var widget2;
    var widget3;
    if ($('#RecaptchaField1').length > 0) {
        widget1 = grecaptcha.render('RecaptchaField1', {
            'sitekey': '6LeV3s8UAAAAAF-aBw62xSSGAQSbRPvcmrVuAAT1',
            'callback': correctCaptcha_second
        });
    }
    if ($('#RecaptchaField3').length > 0) {
        widget2 = grecaptcha.render('RecaptchaField2', {
            'sitekey': '6LeV3s8UAAAAAF-aBw62xSSGAQSbRPvcmrVuAAT1',
            'callback': correctCaptcha_first
        });
    }
    if ($('#RecaptchaField3').length > 0) {
        widget3 = grecaptcha.render('RecaptchaField3', {
            'sitekey': '6LeV3s8UAAAAAF-aBw62xSSGAQSbRPvcmrVuAAT1',
            'callback': correctCaptcha_third
        });
    }
};
var correctCaptcha_second = function(response) {
    $("#secondCaptcha").val(response);
};
var correctCaptcha_first = function(response) {
    $("#firstCaptcha").val(response);
};
var correctCaptcha_third = function(response) {
    $("#thirdCaptcha").val(response);
};
