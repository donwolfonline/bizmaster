/**
 * Theme Main Scripts
 * @since 1.0.0
 */
;(function ($) {
    "use strict";

    jQuery(document).ready(function ($) {

        // Default Navigation Bar
        $(".navbar-toggler").on("click", function () {
            $(".navbar-nav").toggleClass("show", 1000);
        });

        $("#nav-icon3").on("click", function () {
            $(this).toggleClass('open', 1000);
        });

        // navbar-click
        $(".menu-item-has-children a").on("click", function () {
            var element = $(this).parent("li");
            if (element.hasClass("show")) {
                element.removeClass("show");
                element.children("ul").slideUp(500);
            }
            else {
                element.siblings("li").removeClass('show');
                element.addClass("show");
                element.siblings("li").find("ul").slideUp(500);
                element.children('ul').slideDown(500);
            }
        });

        window.addEventListener('resize', function () {
            if (screen.width > 991) {
                $('.sub-menu').show();
            }else{
                $('.sub-menu').hide();
            }
        }, true);

        //sidebar Menu
        $(document).on('click', '.header-toggle-area', function () {
            $('.page-wrapper').toggleClass('show');
        });

        //Cross Menu
        $('.nav-menu-close').on('click', function () {
            $('.page-wrapper').removeClass('show');
        });

        /*----------------------
           Search Popup
       -----------------------*/
        var bodyOvrelay = $('#body-overlay');
        var searchPopup = $('#search-popup');

        bodyOvrelay.on('click', function (e) {
            e.preventDefault();
            bodyOvrelay.removeClass('active');
            searchPopup.removeClass('active');
        });
        $(document).on('click','#body-overlay',function(e){
            e.preventDefault();
            bodyOvrelay.removeClass('active');
            searchPopup.removeClass('active');
            sidebarMenu.removeClass('active');
        });
        $(document).on('click', '#search', function (e) {
            e.preventDefault();
            searchPopup.addClass('active');
            bodyOvrelay.addClass('active');
        });

        var bodyOvrelay = $('#body-overlay');
        var sidebarMenu = $('#sidebar-menu');

        // sidebar menu 
        $(document).on('click', '.sidebar-menu-close', function (e) {
            e.preventDefault();
            bodyOvrelay.removeClass('active');
            sidebarMenu.removeClass('active');
        });
        $(document).on('click', '#navigation-button', function (e) {
            e.preventDefault();
            sidebarMenu.addClass('active');
            bodyOvrelay.addClass('active');
        });

        /*----------------------------------
           Magnific popup activation
       ----------------------------------*/
        $('.video-play-btn').magnificPopup({
            type: 'video',
            removalDelay: 400,
            preloader: false,
        });

        /* -----------------------------------------
            fact counter
        ----------------------------------------- */
        if ($('.counter').length){
            $('.counter').counterUp({
                delay: 15,
                time: 2000
            });
        }

        /*===========================================
            =         Search Box Popup         =
        =============================================*/
        function popupSarchBox($searchBox, $searchOpen, $searchCls, $toggleCls) {
            $($searchOpen).on("click", function (e) {
                e.preventDefault();
                $($searchBox).addClass($toggleCls);
            });
            $($searchBox).on("click", function (e) {
                e.stopPropagation();
                $($searchBox).removeClass($toggleCls);
            });
            $($searchBox)
                .find("form")
                .on("click", function (e) {
                    e.stopPropagation();
                    $($searchBox).addClass($toggleCls);
                });
            $($searchCls).on("click", function (e) {
                e.preventDefault();
                e.stopPropagation();
                $($searchBox).removeClass($toggleCls);
            });
        }
        popupSarchBox(
            ".popup-search-box",
            ".searchBoxToggler",
            ".searchClose",
            "show"
        );

        /*===========================================
            =         Popup Sidemenu         =
        =============================================*/
        function popupSideMenu($sideMenu, $sideMunuOpen, $sideMenuCls, $toggleCls) {
            // Sidebar Popup
            $($sideMunuOpen).on('click', function (e) {
            e.preventDefault();
            $($sideMenu).addClass($toggleCls);
            });
            $($sideMenu).on('click', function (e) {
            e.stopPropagation();
            $($sideMenu).removeClass($toggleCls)
            });
            var sideMenuChild = $sideMenu + ' > div';
            $(sideMenuChild).on('click', function (e) {
            e.stopPropagation();
            $($sideMenu).addClass($toggleCls)
            });
            $($sideMenuCls).on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $($sideMenu).removeClass($toggleCls);
            });
        };
        popupSideMenu('.sidemenu-wrapper', '.sideMenuToggler', '.sideMenuCls', 'show');

        /*-------------------------------------------------
            wow js init
        --------------------------------------------------*/
        if ($('.counter').length){
            new WOW().init();
        }

        /*-------------------------------
            back to top
        ------------------------------*/
        $(document).on('click', '.back-to-top', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 500);
        });
        /*-------------------------------
            Navbar Fix
        ------------------------------*/
        if ($(window).width() < 991) {
            navbarFix()
        }

    });

    $(window).on('resize', function () {
        /*-------------------------------
            Navbar Fix
        ------------------------------*/
        if ($(window).width() < 991) {
            navbarFix()
        }
    });


    //define variable for store last scrolltop
    var lastScrollTop = '';
    $(window).on('scroll', function () {
        /*---------------------------
            back to top show / hide
        ---------------------------*/
        var ScrollTop = $('.back-to-top');
        if ($(window).scrollTop() > 1000) {
            ScrollTop.fadeIn(1000);
        } else {
            ScrollTop.fadeOut(1000);
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

    $(window).on('load', function () {
        /*-----------------------------
            preloader
        -----------------------------*/
        var preLoder = $(".preloader");
        preLoder.fadeOut(1000);
        /*-----------------------------
            back to top
        -----------------------------*/
        var backtoTop = $('.back-to-top')
        backtoTop.fadeOut(100);
    });

    function navbarFix() {
        $(document).on('click', '.navbar-area .navbar-nav li.menu-item-has-children>a', function (e) {
            e.preventDefault();
        })
    }

})(jQuery);
