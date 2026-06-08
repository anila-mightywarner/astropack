document.addEventListener("DOMContentLoaded", function() {var lazyImages = document.querySelectorAll('img[data-src][loading="lazy"]');var lazyImageObserver = new IntersectionObserver(function(entries, observer) {entries.forEach(function(entry) {if (entry.isIntersecting) {var lazyImage = entry.target;lazyImage.src = lazyImage.dataset.src;lazyImage.alt = lazyImage.dataset.alt;lazyImage.removeAttribute("data-src");lazyImage.removeAttribute("loading");lazyImageObserver.unobserve(lazyImage);}});});lazyImages.forEach(function(lazyImage) {lazyImageObserver.observe(lazyImage);});});



    $(document).ready(function () {

        if ($.fn.slick) {
            if ($(".Brands-logo").length > 0) {
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
                        }

                    ]

                });
            }
            if ($(".testimonials-slider").length > 0) {
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
            }
            if ($(".clients-slider").length > 0) {
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
                        },
                    ]

                });
            }
            if ($(".Related-product").length > 0) {
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
                        }

                    ]

                });
            }
        }
    });

    if ($(window).width() >= 992) {
        window.onscroll = function () {
            myFunction();
        };
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


    /***************************SLIDER_PRO**************************/
    if ($.fn.sliderPro && $('#slider-pro').length > 0) {
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
    }


    $(document).ready(function () {
        $(document).on('submit', '.contact-enquiry', function (e) {
            e.preventDefault();
            var form = $(this);
            var submitBtn = form.find('input[type="submit"], button[type="submit"]');
            var originalBtnText = submitBtn.is('input') ? submitBtn.val() : submitBtn.text();

            var res = $("#secondCaptcha").length > 0 ? $("#secondCaptcha").val() : "";
            var res2025 = $("#secondCaptcha2025").length > 0 ? $("#secondCaptcha2025").val() : "";
            
            if (!res && !res2025) {
                currentForm = form;
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LfkXRMtAAAAAD8IXYU1IekcgXB1IfBjUeRLzb4w', {action: 'submit'}).then(function(token) {
                        if ($("#secondCaptcha").length > 0) $("#secondCaptcha").val(token);
                        if ($("#secondCaptcha2025").length > 0) $("#secondCaptcha2025").val(token);
                        currentForm.trigger('submit');
                    });
                });
                return;
            }

            var str = form.serialize() + '&_csrf-frontend=' + encodeURIComponent(APP_CONFIG.csrf);
            
            submitBtn.prop('disabled', true);
            if (submitBtn.is('input')) { submitBtn.val('Submitting...'); } else { submitBtn.text('Submitting...'); }
            
            $.ajax({
                    type: "POST",
                    url: APP_CONFIG.homeUrl + 'site/contact-enquiry',
                    data: str,
                    success: function (data)
                    {
                        if (data == 1) {
                            form.append('<div id="contact-alert" style="color: #28a745;font-weight: 600;margin-top: 10px;">Your Request Sent Successfully</div>');
                            setTimeout(function() { location.reload(); }, 2000);
                        } else {
                            submitBtn.prop('disabled', false);
                            if (submitBtn.is('input')) { submitBtn.val(originalBtnText); } else { submitBtn.text(originalBtnText); }
                            alert("Submission failed. Please try again.");
                        }
                    },
                    error: function () {
                        submitBtn.prop('disabled', false);
                        if (submitBtn.is('input')) { submitBtn.val(originalBtnText); } else { submitBtn.text(originalBtnText); }
                        alert("A server error occurred. Please try again later.");
                        if ($("#secondCaptcha").length > 0) $("#secondCaptcha").val("");
                        if ($("#secondCaptcha2025").length > 0) $("#secondCaptcha2025").val("");
                    }
                });
        });
        
        $(document).on('click', '#modal-dismiss', function (e) {
            location.reload();
        });
        
        $(document).on('submit', '.product-enquiry1', function (e) {
            var form = $(this);
            var submitBtn = form.find('input[type="submit"], button[type="submit"]');
            var originalBtnText = submitBtn.is('input') ? submitBtn.val() : submitBtn.text();

            var res = $("#secondCaptcha").length > 0 ? $("#secondCaptcha").val() : "";
            if (!res)
            {
                e.preventDefault();
                currentForm = form;
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LfkXRMtAAAAAD8IXYU1IekcgXB1IfBjUeRLzb4w', {action: 'submit'}).then(function(token) {
                        if ($("#secondCaptcha").length > 0) $("#secondCaptcha").val(token);
                        currentForm.trigger('submit');
                    });
                });
                return;
            } else {
                $('.validation').remove();
                setTimeout(function() {
                    submitBtn.prop('disabled', true);
                    if (submitBtn.is('input')) { submitBtn.val('Submitting...'); } else { submitBtn.text('Submitting...'); }
                }, 0);
            }
        });

        $(document).on('submit', '.product-enquiry2', function (e) {
            var form = $(this);
            var submitBtn = form.find('input[type="submit"], button[type="submit"]');
            var originalBtnText = submitBtn.is('input') ? submitBtn.val() : submitBtn.text();

            var res = $("#firstCaptcha").length > 0 ? $("#firstCaptcha").val() : "";
            if (!res)
            {
                e.preventDefault();
                currentForm = form;
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LfkXRMtAAAAAD8IXYU1IekcgXB1IfBjUeRLzb4w', {action: 'submit'}).then(function(token) {
                        if ($("#firstCaptcha").length > 0) $("#firstCaptcha").val(token);
                        currentForm.trigger('submit');
                    });
                });
                return;
            } else {
                $('.validation').remove();
                setTimeout(function() {
                    submitBtn.prop('disabled', true);
                    if (submitBtn.is('input')) { submitBtn.val('Submitting...'); } else { submitBtn.text('Submitting...'); }
                }, 0);
            }
        });

        $(document).on('submit', '.product-enquiry', function (e) {
            e.preventDefault();
            var form = $(this);
            var submitBtn = form.find('input[type="submit"], button[type="submit"]');
            var originalBtnText = submitBtn.is('input') ? submitBtn.val() : submitBtn.text();

            submitBtn.prop('disabled', true);
            if (submitBtn.is('input')) { submitBtn.val('Submitting...'); } else { submitBtn.text('Submitting...'); }

            var str = form.serialize() + '&_csrf-frontend=' + encodeURIComponent(APP_CONFIG.csrf);
            $.ajax({
                type: "POST",
                url: APP_CONFIG.homeUrl + 'site/products-enquiry',
                data: str,
                success: function (data)
                {
                    if (data == 1) {
                        $('.prod-success').before('<div id="email-alert" style="color: #28a745;font-weight: 600;">Your Product Enquiry Sent Successfully</div>');
                        setTimeout(function() { location.reload(); }, 2000);
                    } else {
                        submitBtn.prop('disabled', false);
                        if (submitBtn.is('input')) { submitBtn.val(originalBtnText); } else { submitBtn.text(originalBtnText); }
                        alert("Submission failed. Please try again.");
                    }
                },
                error: function() {
                    submitBtn.prop('disabled', false);
                    if (submitBtn.is('input')) { submitBtn.val(originalBtnText); } else { submitBtn.text(originalBtnText); }
                    alert("A server error occurred. Please try again later.");
                }
            });
        });

        $(document).on('click', '.quick-enqiry', function (e) {
            e.preventDefault();
            $("#details14").addClass("show");
            $('html, body').animate({
                scrollTop: $('#details14').offset().top - 200 //#DIV_ID is an example. Use the id of your destination on the page
            }, 'slow');
        });

       $(document).on('submit', '.brochure-enquiry', function (e) {
            e.preventDefault();
            var form = $(this);
            var submitBtn = form.find('input[type="submit"], button[type="submit"]');
            var originalBtnText = submitBtn.is('input') ? submitBtn.val() : submitBtn.text();

            var res = $("#thirdCaptcha").length > 0 ? $("#thirdCaptcha").val() : "";
            if (!res)
            {
                currentForm = form;
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LfkXRMtAAAAAD8IXYU1IekcgXB1IfBjUeRLzb4w', {action: 'submit'}).then(function(token) {
                        if ($("#thirdCaptcha").length > 0) $("#thirdCaptcha").val(token);
                        currentForm.trigger('submit');
                    });
                });
                return;
            }

            var str = form.serialize() + '&_csrf-frontend=' + encodeURIComponent(APP_CONFIG.csrf);
            
            submitBtn.prop('disabled', true);
            if (submitBtn.is('input')) { submitBtn.val('Submitting...'); } else { submitBtn.text('Submitting...'); }

            $.ajax({
                    type: "POST",
                    url: APP_CONFIG.homeUrl + 'site/brochure-download',
                    data: str,
                    success: function (data)
                    {
                        $('.validation').remove();
                        if (data != 0) {
                            window.open(data, '_blank');
                            location.reload();
                        } else {
                            submitBtn.prop('disabled', false);
                            if (submitBtn.is('input')) { submitBtn.val(originalBtnText); } else { submitBtn.text(originalBtnText); }
                            alert("Submission failed. Please try again.");
                        }
                    },
                    error: function() {
                        submitBtn.prop('disabled', false);
                        if (submitBtn.is('input')) { submitBtn.val(originalBtnText); } else { submitBtn.text(originalBtnText); }
                        alert("A server error occurred. Please try again later.");
                        if ($("#thirdCaptcha").length > 0) $("#thirdCaptcha").val("");
                    }
                });
        });

        $(document).on('submit', '.news-letter', function (e) {
            e.preventDefault();
            var form = $(this);
            var submitBtn = form.find('input[type="submit"], button[type="submit"], button');
            var originalBtnText = submitBtn.is('input') ? submitBtn.val() : submitBtn.html();

            submitBtn.prop('disabled', true);
            if (submitBtn.is('input')) { submitBtn.val('Submitting...'); } else { submitBtn.html('Submitting...'); }

            var str = form.serialize() + '&_csrf-frontend=' + encodeURIComponent(APP_CONFIG.csrf);
            $.ajax({
                type: "POST",
                url: APP_CONFIG.homeUrl + 'site/news-letter',
                data: str,
                success: function (data)
                {
                    if (data == 1) {
                        $('.news-letter').append('<div id="newsletter-alert" style="color: #28a745;font-weight: 600;padding-top: 10px;">Your Request Sent Successfully</div>');
                        setTimeout(function() { location.reload(); }, 2000);
                    } else if (data == 2) {
                        $('.news-letter').append('<div id="newsletter-alert" style="color: #28a745;font-weight: 600;padding-top: 10px;">Already Sent Request</div>');
                        setTimeout(function() { location.reload(); }, 2000);
                    } else {
                        submitBtn.prop('disabled', false);
                        if (submitBtn.is('input')) { submitBtn.val(originalBtnText); } else { submitBtn.html(originalBtnText); }
                        alert("Submission failed.");
                    }
                },
                error: function() {
                    submitBtn.prop('disabled', false);
                    if (submitBtn.is('input')) { submitBtn.val(originalBtnText); } else { submitBtn.html(originalBtnText); }
                    alert("A server error occurred. Please try again later.");
                }
            });
        });
        
        $(document).on('click','.home-page-readmore',function(){
           var url = $(this).data('href');
           window.location.href=APP_CONFIG.baseUrl+url;
        });
    });


// <!--Start of Tawk.to Script-->

    // var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    // (function () {
    //     var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
    //     s1.async = true;
    //     s1.src = 'https://embed.tawk.to/5caf1991d6e05b735b420ad9/default';
    //     s1.charset = 'UTF-8';
    //     s1.setAttribute('crossorigin', '*');
    //     s0.parentNode.insertBefore(s1, s0);
    // })();

// <!--End of Tawk.to Script-->

//<!--Start of Tawk.to Script-->

var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6710140d2480f5b4f58eb92d/1iabcslja';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();

//<!--End of Tawk.to Script-->

// <!-- WhatsHelp.io widget -->

   /* (function () {
        var mob = '<?php echo $contact_details->mobile; ?>';
        var options = {
            whatsapp: mob, // WhatsApp number
            call_to_action: "Message us", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () {
            WhWidgetSendButton.init(host, proto, options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    })();*/

// <!-- /WhatsHelp.io widget -->

    var currentForm = null;
