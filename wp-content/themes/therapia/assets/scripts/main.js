(function ($) {
    //init menu
    var menu = {
        nav: $('.page-header__right-part'),
        openMenuBtn: $('.menu-action'),
        droppBtn: $('.dropper-nav'),
        droppContent: $('.dropdown-content'),
        flag: true,

        menuAction: function () {
            this.openMenuBtn.on('click', function () {
                if(menu.flag) {
                    menu.flag = false;
                    menu.nav.slideToggle();
                    menu.openMenuBtn.toggleClass('menu-action_init');
                    $('body').toggleClass('disabled-scroll');

                    if( menu.openMenuBtn.hasClass('menu-action_init') ) {
                        menu.droppBtn.removeClass('rotateEl');
                    }
                    menu.droppContent.slideUp();
                    setTimeout(function () {
                        menu.flag = true;
                    }, 300);
                }
            });

            this.droppBtn.on('click', function () {
                if (window.innerWidth <= 767) {
                    $(this).toggleClass('rotateEl');
                    var item = $(this).next('.dropdown-content');
                    item.slideToggle();
                }
            });
        },
        init: function () {
            this.menuAction();
        },
        destroy: function () {
            this.nav.removeAttr('style');
            $('body').removeClass('disabled-scroll');
            this.openMenuBtn.removeClass('menu-action_init');
            this.droppBtn.removeClass('rotateEl');
            this.droppContent.removeAttr('style');
        }
    };


    //init on load
    initSliderCounter();
    resizeimage();
    menu.init();
    initHomeSlider();
    initGallerySlider();
    headerWidth();
    woocomerceGallery();
    initParallax();
    $('select[name="orderby"]').niceSelect();
    $('.variations select').niceSelect();


    //init after resize
    var trigger = true;
    $(window).resize(function () {
        clearTimeout(trigger);
        resizeimage();
        headerWidth();
        if (window.innerWidth >= 768) {
            menu.destroy();
        }
    });


    //init home-page slider
    function initHomeSlider() {
        $('.slider_product').slick({
            autoplay: false,
            arrows: false,
            dots: true,
            fade: true
        });
    };


    //init gallery product slider
    function initGallerySlider() {
        $(".gallery-slider").slick({
            autoplay: false,
            arrows: true,
            dots: false,
            slidesToShow: 6,
            centerPadding: "10px",
            draggable: false,
            infinite: true,
            pauseOnHover: false,
            swipe: false,
            touchMove: false,
            vertical: true,
            adaptiveHeight: true,
            nextArrow: '<span class="nav-slider_icon nav-slider_icon-right"><i class="fas fa-sort-down"></i></span>',
            prevArrow: '<span class="nav-slider_icon nav-slider_icon-left"><i class="fas fa-sort-up"></i></span>',
            responsive: [
                {
                    breakpoint: 993,
                    settings: {
                        slidesToShow: 4,
                        vertical: false
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        vertical: false
                    }
                },
                {
                    breakpoint: 375,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        vertical: false
                    }
                }
            ]
        });
    };


    //intro image resize
    function resizeimage() {
        var windowsWidth = parseInt(window.innerWidth);
        var containerWidth = $('.container').width();
        var image = $('.decor-image__intro-left');

        if (windowsWidth >= 1501) {
            var wasteWidth2 = ((windowsWidth - containerWidth) / 2) + 125;
            image.width(windowsWidth - wasteWidth2);
        }
        else if (windowsWidth >= 1200 && windowsWidth <= 1500) {
            var wasteWidth = ((windowsWidth - containerWidth) / 2) + 230;
            image.width(windowsWidth - wasteWidth);
        }
        else if (windowsWidth > 991 && windowsWidth <= 1199) {
            var wasteWidth = ((windowsWidth - containerWidth) / 2) + 150;
            image.width(windowsWidth - wasteWidth);
        }
        else {
            image.removeAttr("style");
        }
    };


    //slider counter
    function initSliderCounter() {
        //init slick slider counter
        var $slider = $('.slider');

        $slider.on('init reInit', function (event, slick, currentSlide, nextSlide) {
            var contentWrapp = $('.slider').find($('.slide-content__wrapp'));
            contentWrapp.addClass('fadeUp');

            //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
            var i = (currentSlide ? currentSlide : 0) + 1;
            var currentSlideWrapper = '<span class="current-slide">' + i + '</span>';
            var counter = '<span class="slick-counter">' + (currentSlideWrapper + '/' + slick.slideCount) + '</span>';
            $slider.append(counter);
        });

        $slider.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
            var contentWrapp = $('.slider').find($('.slide-content__wrapp'));
            contentWrapp.removeClass('fadeUp');
        });

        $slider.on('afterChange', function (event, slick, currentSlide, nextSlide) {
            var contentWrapp = $('.slide-content__wrapp');
            contentWrapp.addClass('fadeUp');

            //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
            var i = (currentSlide ? currentSlide : 0) + 1;
            var currentSlideWrapper = '<span class="current-slide">' + i + '</span>';
            var counter = (currentSlideWrapper + '/' + slick.slideCount);
            var currentWrapper = $('.slick-counter');
            currentWrapper.html(counter);

            var contentWrapp = $('.slide-content__wrapp');
            contentWrapp.removeClass('fadeUp');
            contentWrapp.hide();
            contentWrapp.show();
            contentWrapp.addClass('fadeUp');
        });
    };


    //count product header width
    function headerWidth() {
        var windowsWidth = parseInt(window.innerWidth);
        var containerWidth = $('.container').width();
        var headerProduct = $('#header_product-layer');

        if (windowsWidth >= 1400) {
            headerProduct.width(windowsWidth - ((windowsWidth - containerWidth) / 2) + 100);
        } else {
            var defaultWidth = '100%';
            headerProduct.width(defaultWidth);
        }

    };


    //woocomerce gallery
    function woocomerceGallery() {
        var img = $('.product-gallery__image');
        var activeImg = $('#product-gallery__image_active');

        $('body').on('click', 'img', function (e) {
            var src = $(this).attr('data-src');
            activeImg.attr('src', src);
        });
    };

    //add mask to product counter buttons
    if ( ! String.prototype.getDecimals ) {
        String.prototype.getDecimals = function() {
            var num = this,
                match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
            if ( ! match ) {
                return 0;
            }
            return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
        }
    }

    // Quantity "plus" and "minus" buttons
    $( document.body ).on( 'click', '.plus, .minus', function() {
        var $qty = $( this ).closest( '.quantity' ).find( '.qty'),
            currentVal = parseFloat( $qty.val() ),
            max = parseFloat( $qty.attr( 'max' ) ),
            min = parseFloat( $qty.attr( 'min' ) ),
            step = $qty.attr( 'step' );

        // Format values
        if ( ! currentVal || currentVal === '' || currentVal === isNaN() ) currentVal = 0;
        if ( max === '' || max === isNaN() ) max = '';
        if ( min === '' || min === isNaN() ) min = 0;
        if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === isNaN() ) step = 1;

        // Change the value
        if ( $( this ).is( '.plus' ) ) {
            if ( max && ( currentVal >= max ) ) {
                $qty.val( max );
            } else {
                $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
            }
        } else {
            if ( min && ( currentVal <= min ) ) {
                $qty.val( min );
            } else if ( currentVal > 0 ) {
                $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
            }
        }
        // Trigger change event
        $qty.trigger( 'change' );
    });


    //init parallax effect
    function initParallax() {
        var sceneLeft = document.getElementById('scene_left');
        if(!sceneLeft) {
            return false;
        } else {
            var parallax1 = new Parallax(sceneLeft, {
                relativeInput: true
            });
        }

        var sceneRight = document.getElementById('scene_right');
        if(!sceneLeft) {
            return false;
        } else {
            var parallax2 = new Parallax(sceneRight, {
                relativeInput: true
            });
        }

        var sceneLeftLasted = document.getElementById('scene_left-lastest');
        if(!sceneLeft) {
            return false;
        } else {
            var parallax3 = new Parallax(sceneLeftLasted, {
                relativeInput: true
            });
        }

        var sceneRightLasted = document.getElementById('scene_right-lastest');
        if(!sceneLeft) {
            return false;
        } else {
            var parallax4 = new Parallax(sceneRightLasted, {
                relativeInput: true
            });
        }
    }


    //init popular product animation
    function fadeAnimation(context) {
        var elArray = arguments;
        Object.keys(elArray).forEach(function (key) {
            animateEl(elArray[key]);
        });

        function animateEl(animEl) {
            var popularProduct = $(animEl);
            var flag = $('body').hasClass('home');

            if(!flag) {
                return false;
            } else {
                var targetPos = popularProduct.offset().top;
                var winHeight = $(window).height();
                var scrollToElem = targetPos - (winHeight / 2);
                $(window).scroll(function() {
                    var winScrollTop = $(this).scrollTop();
                    if(winScrollTop > scrollToElem){
                        popularProduct.addClass('fadeIn');
                    }
                });
            }
        }
    }
    //call animation
    fadeAnimation('.section-title_popular', '.product-wrapper__item_intro-1', '.product-wrapper__item_intro-2' , '.product-wrapper__item_intro-3', '.product-wrapper__item_intro-4');


    //init beast deal animation
    function slideAnimation(leftBlock, rightBlock) {
        var leftBlock = $(leftBlock);
        var rightBlock = $(rightBlock);
        leftBlock.css('opacity', '0');
        rightBlock.css('opacity', '0');

        var flag = $('body').hasClass('home');
        if(!flag) {
            return false;
        } else {
            var targetPos = leftBlock.offset().top;
            var winHeight = $(window).height();
            var scrollToElem = targetPos - (winHeight / 2);
            $(window).scroll(function() {
                var winScrollTop = $(this).scrollTop();
                if(winScrollTop > scrollToElem){
                    leftBlock.attr("style","");
                    rightBlock.attr("style","");
                    leftBlock.addClass('animation-left');
                    rightBlock.addClass('animation-right');
                }
            });
        }
    }
    //call animation
    slideAnimation('.best-deal_left', '.best-deal_right');

})(jQuery);
