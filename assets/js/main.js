(function($) {
    "use strict";

    jQuery(document).ready(function($) {

        $('p > a.report-cmn-btn').unwrap();

        /*
        ========================================
          faq accordion
        ========================================
        */
        // $('.faq-contents .faq-title').on('click', function(e) {
        //     var Faq = $(this).parent('.faq-item');
        //     if (Faq.hasClass('open')) {
        //         Faq.removeClass('open');
        //         Faq.find('.faq-panel').removeClass('open');
        //         Faq.find('.faq-panel').slideUp(300, "swing");
        //     } else {
        //         Faq.addClass('open');
        //         Faq.children('.faq-panel').slideDown(300, "swing");
        //         Faq.siblings('.faq-item').children('.faq-panel').slideUp(300, "swing");
        //         Faq.siblings('.faq-item').removeClass('open');
        //         Faq.siblings('.faq-item').find('.faq-title').removeClass('open');
        //         Faq.siblings('.faq-item').find('.faq-panel').slideUp(300, "swing");
        //     }
        // });
        
        /* ===============================================
                Sticky menu js
        ===============================================
        */
        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            if (scroll >= 800) {
                $("#stickynav").addClass("sticky_nav");
            } else {
                $("#stickynav").removeClass("sticky_nav");
            }
        });

        /* 
        =====================================================
            Start active menu
        ======================================================
        */
        var sections = jQuery('section'),
            nav = jQuery('nav'),
            nav_height = nav.outerHeight();

        jQuery(window).on('scroll', function() {
            var cur_pos = jQuery(this).scrollTop();

            sections.each(function() {
                var top = jQuery(this).offset().top - nav_height,
                    bottom = top + jQuery(this).outerHeight();

                if (cur_pos >= top && cur_pos <= bottom) {
                    nav.find('a').removeClass('active');
                    sections.removeClass('active');

                    jQuery(this).addClass('active');
                    nav.find('a[href="#' + jQuery(this).attr('id') + '"]').addClass('active');
                }
            });
        });

        /* 
        ========================================
            Side Open Close Shop Top
        ========================================
        */

        // $(document).on('click', '.product-details-left-title .title', function(e) {
        //     var st = $(this).parent('.product-details-left-title');
        //     if (st.hasClass('open')) {
        //         st.removeClass('open');
        //         st.find('.product-details-left-list').removeClass('open');
        //         st.find('.product-details-left-list').slideUp(300, "swing");
        //     } else {
        //         st.addClass('open');
        //         st.children('.product-details-left-list').slideDown(300, "swing");
        //         st.siblings('.product-details-left-title').children('.product-details-left-list').slideUp(300, "swing");
        //         st.siblings('.product-details-left-title').removeClass('open');
        //     }
        // });

        /* 
        ========================================
            Product Details Responsive Sidebar
        ========================================
        */

        // $(document).on('click', '.close-bars, .body-overlay', function() {
        //     $('.product-details-close-main, .body-overlay').removeClass('active');
        // });
        // $(document).on('click', '.sidebar-icon', function() {
        //     $('.product-details-close-main, .body-overlay').addClass('active');
        // });
        /* 
        // ========================================
        //     Pagination On Click Js
        // ========================================
        // */

        // $(document).on('click', '.pagination-list-item', function() {
        //     $(this).siblings().children().removeClass('active');
        //     $(this).children().addClass('active');
        // });

        // $(document).on('click', '.pagination-list-item-next', function() {
        //     // count length of a element
        //     let index = 0;
        //     let el = $(".pagination-list-item-link");
        //     let elArray = Array.from(el);

        //     for (let i = 0; i < el.length; i++) {
        //         if ($(elArray[i]).hasClass('active')) {
        //             break;
        //         } else {
        //             index++;
        //         }
        //     }

        //     el.removeClass('active');
        //     // check index length is should be less then el length
        //     let nextIndex = (function() {
        //         if (index == (el.length - 1)) {
        //             return 0;
        //         } else {
        //             return index + 1;
        //         }
        //     })();

        //     $(elArray[nextIndex]).addClass('active');
        // });

        // $(document).on('click', '.pagination-list-item-prev', function() {
        //     // count length of a element
        //     let index = 0;
        //     let el = $(".pagination-list-item-link");
        //     let elArray = Array.from(el);

        //     for (let i = 0; i < el.length; i++) {
        //         if ($(elArray[i]).hasClass('active')) {
        //             break;
        //         } else {
        //             index++;
        //         }
        //     }

        //     el.removeClass('active');
        //     // check index length is should be less then el length
        //     let nextIndex = (function() {
        //         if (index == 0) {
        //             return (el.length - 1);
        //         } else {
        //             return index - 1;
        //         }
        //     })();

        //     $(elArray[nextIndex]).addClass('active');
        // });

        /*--------------------------------
         *  Enable Tooltip
         * -------------------------------*/
        $('[data-toggle="tooltip"]').tooltip();

        /* 
        ========================================
            Password Show Hide On Click
        ========================================
        */
        // $(document).on("click", ".toggle-password", function(e) {
        //     e.preventDefault();
        //     $(this).toggleClass("show-pass");
        //     let input = $(this).parent().find("input");
        //     if (input.attr("type") == "password") {
        //         input.attr("type", "text");
        //     } else {
        //         input.attr("type", "password");
        //     }
        // });

        /*
        ========================================
            input search open item
        ========================================
        */
        // $(document).on('keyup change', '#search_form_input', function(event) {

        //     let input_values = $(this).val();

        //     if (input_values.length > 0) {
        //         $('#search_suggestions_wrap, .search-suggestion-overlay').addClass("show");
        //     } else {
        //         $('#search_suggestions_wrap, .search-suggestion-overlay').removeClass("show");
        //     }
        // });
        // $(document).on('click', '.search-suggestion-overlay', function() {
        //     $('#search_suggestions_wrap, .search-suggestion-overlay').removeClass('show')
        // })

        /*
        ========================================
            Nice Scroll js
        ========================================
        */
        // $(".search-suggestions-list").niceScroll({});

        /* 
        ========================================
            Nice Select
        ========================================
        */
        // $('.nice-select').niceSelect();

        /*--------------------------------
         *   Edd Cart Item
         * -------------------------------*/
        $('body').on('click', '.edd-remove-from-cart', function(e) {
            e.preventDefault();
            $(this).parent().hide();
            resetCartData()
        });

        $('.edd-add-to-cart').on('click', function() {
            resetCartData()
        });

        function resetCartData() {
            setTimeout(function() {
                $('.cart-item-wrap ul').load(xgenious.ajaxUrl + '?action=xgenious_cart_load&_wpnonce=' + xgenious.xgNonce);
            }, 1000);
        }
         $("._video_url_btn").magnificPopup({type: "video"})
        /*---------------------------------
         *   Item Support Form Submit
         * --------------------------------*/
        $(document).on('click', '.item-support-form-submit-btn', function(e) {
            e.preventDefault();
            var fromData = $('.item-support-mail-form').serialize();
            $.ajax({
                type: 'POST',
                url: xgenious.ajaxUrl,
                data: fromData,
                success: function(data) {
                    console.log(data);
                }
            });
        });


        /*-------------------------------
            back to top
        ------------------------------*/
        $(document).on('click', '.back-to-top', function() {
            $("html,body").animate({
                scrollTop: 0
            }, 100);
        });

    });

    //define variable for store last scrolltop

    var lastScrollTop = '';
    $(window).on('scroll', function() {

        var StickySocial = $('.blog-details-page');
        if ($(window).scrollTop() > 500) {
            StickySocial.addClass('social-sticky');
        } else {
            StickySocial.removeClass('social-sticky');
        }
        /*---------------------------
            back to top show / hide
        ---------------------------*/
        var ScrollTop = $('.back-to-top');
        if ($(window).scrollTop() > 1000) {
            ScrollTop.fadeIn(500);
        } else {
            ScrollTop.fadeOut(100);
        }
        /*--------------------------
         sticky menu activation
        ---------------------------*/
        var st = $(this).scrollTop();
        var mainMenuTop = $('.navbar-area');
        if ($(window).scrollTop() > 1000) {
            if (st > lastScrollTop) {
                // hide sticky menu on scrolldown
                mainMenuTop.removeClass('nav-fixed');

            } else {
                // active sticky menu on scrollup
                mainMenuTop.addClass('nav-fixed');
            }

        } else {
            mainMenuTop.removeClass('nav-fixed ');
        }
        lastScrollTop = st;

    });

    $(window).on('load', function() {
        /*-----------------------------
            preloader
        -----------------------------*/
        var preLoder = $("#preloader");
        preLoder.fadeOut(1000);
        /*-----------------------------
            back to top
        -----------------------------*/
        var backtoTop = $('.back-to-top')
        backtoTop.fadeOut(100);
    });


})(jQuery);