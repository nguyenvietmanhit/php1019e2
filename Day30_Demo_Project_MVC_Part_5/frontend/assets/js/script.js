"use strict";

//sidebar navigation close method.
var closeNavigate = function () {
    $('.overlay').hide();
    $('.sidebar').removeClass('opened');
    $('body').removeClass('fixed');
}

//sidebar navigation close method.
var openNavigate = function () {
    if ($(window).width() < 760)
        $('body').addClass('fixed');
    $('.overlay').show();
    $('.sidebar').addClass('opened');
}

//creating mobile menu from header menu
var createMobileMenu = function () {
    var newMenu = '<ul class="sidebar-menu">';
    var menuContent = $('[data-show-menu-on-mobile]').html();
    menuContent = menuContent.replace(/<div class="header-submenu">/g, "");
    menuContent = menuContent.replace(/<\/div>/g, "");
    newMenu = newMenu + menuContent + '</ul>';
    $('#mobileMenu').prepend(newMenu);

    $('#mobileMenu li a').each(function () {
        var t = $(this).text().trim();

        if ($(this).find('i').length) {
            $(this).html('<span class="menu-label">' + t.slice(0, -1) + '</span><span class="multimenu-icon"><i class="material-icons">&#xE313;</i></span>')
        }
        else
            $(this).html('<span class="menu-label">' + t + '</span>');
    });


}


var scrollPos = 0, scrollTime;
//show or hide header with scroll position.
var showHideHeader = function (e) {
    clearTimeout(scrollTime);

    var currentScroll = $(this).scrollTop();

    if (currentScroll < 60) {
        $('header').removeClass('hide');
    } else {
        if (currentScroll <= scrollPos) {
            $('header').removeClass('hide');
        }
        else {
            $('header').addClass('hide');
            $('.search-bar').removeClass('active');
        }
    }

    scrollTime = setTimeout(function () {
        scrollPos = $(window).scrollTop();
    }, 100);
}

//add material wave effect to element
var addWaveEffect = function (self, e) {
    var wave = '.wave-effect',
        btnWidth = self.outerWidth(),
        x = e.offsetX,
        y = e.offsetY;

    self.prepend('<span class="wave-effect"></span>')

    $(wave).css({'top': y, 'left': x}).animate({
        opacity: '0',
        width: btnWidth * 2,
        height: btnWidth * 2
    }, 500, function () {
        self.find(wave).remove()
    })
}

//making sidebars fix to screen top.
var setStickySidebar = function () {
    //if window screen < 960 sidebar hiding.
    // if (window.outerWidth > 960) {
    //     var sidebar = $('.sidebar_inner');
    //     var sidebarHeight = sidebar.outerHeight();
    //     var windowHeight = $(window).height();
    //     var wrapperTopPos = $('.main-content').position().top;
    //     var scrollTop = $(this).scrollTop();
    //
    //     if ((sidebarHeight + 30) < windowHeight) {
    //         if ((scrollTop + 30) > wrapperTopPos)
    //             sidebar.css({'position': 'fixed', 'top': 30});
    //         else
    //             sidebar.css({'position': 'absolute', 'top': 0});
    //     }
    //     else {
    //         if (scrollTop > (wrapperTopPos + 30 + sidebarHeight - windowHeight))
    //             sidebar.css({'position': 'fixed', 'top': -(sidebarHeight + 30 - windowHeight)});
    //         else
    //             sidebar.css({'position': 'absolute', 'top': 0});
    //
    //     }
    //
    //     if ($('.article-left-box-inner').length) {
    //
    //         var leftSidebar = $('.article-left-box-inner');
    //         var leftSidebarH = leftSidebar.outerHeight();
    //         var endOfTheArticlePos = $('#endOfTheArticle').offset().top;
    //
    //         if ((scrollTop + 30) > wrapperTopPos) {
    //             if ((scrollTop + leftSidebarH + 80) > endOfTheArticlePos)
    //                 leftSidebar.css({'position': 'absolute', 'top': 'auto', 'bottom': 10});
    //             else
    //                 leftSidebar.css({'position': 'fixed', 'top': 70, 'bottom': 'auto'});
    //         }
    //         else
    //             leftSidebar.css({'position': 'absolute', 'top': 0, 'bottom': 'auto'});
    //
    //
    //     }
    // }
}


/*detail page parallax effect script */
var makeParallax = function () {
    var scrollTop = $(this).scrollTop();
    if (scrollTop < 300)
        $('.parallax-box .parallax-image').css({'transform': 'translate3d(0px, ' + (scrollTop / 2) + 'px, 0px)'});

    var opacity = 1;
    if (scrollTop > 10 && scrollTop < 50)
        opacity = 0.9;
    else if (scrollTop >= 50 && scrollTop < 100)
        opacity = 0.8;
    else if (scrollTop >= 100 && scrollTop < 150)
        opacity = 0.7;
    else if (scrollTop >= 150 && scrollTop < 200)
        opacity = 0.6;
    else if (scrollTop >= 200 && scrollTop < 250)
        opacity = 0.5;
    else if (scrollTop >= 250 && scrollTop < 300)
        opacity = 0.4;
    else if (scrollTop >= 300 && scrollTop < 350)
        opacity = 0.3;
    else if (scrollTop >= 350 && scrollTop < 400)
        opacity = 0.2;
    else if (scrollTop >= 400)
        opacity = 0;

    $('.parallax-box .post-overlay-inner').css({'opacity': opacity});
}


//Browser is IE check
var GetIEVersion = function () {
    var sAgent = window.navigator.userAgent;
    var Idx = sAgent.indexOf("MSIE");

    // If IE, return version number.
    if (Idx > 0)
        return parseInt(sAgent.substring(Idx + 5, sAgent.indexOf(".", Idx)));
    // If IE 11 then look for Updated user agent string.
    else if (!!navigator.userAgent.match(/Trident\/7\./))
        return 11;
    else
        return 0; //It is not IE
}


$(document).ready(function () {

    //initialize zebra tooltip plugin.
    new $.Zebra_Tooltips($('[data-zebra-tooltip]'), {
        'animation_speed': 50,
        'animation_offset': 10,
        'hide_delay': 0,
        'show_delay': 0
    });

    //first creating mobile menu for mobile screen sizes
    createMobileMenu();

    //first show header submenus
    $('.header-submenu').show();

    //close sidebar panel, clicked overlay and close sidebar button.
    $('.overlay, .sidebar-toggle-button').on('click', function () {
        closeNavigate();
    });

    //sidebar menu click event. open when clicked.
    $('.toggle-sidebar').on('click', function () {
        openNavigate();
    });

    //search panel toggler
    $('.search-toggle').on('click', function (e) {
        e.preventDefault();
        $('.search-bar').toggleClass('active');
    });

    //playerlist height setting. for internet explorer
    if (GetIEVersion() > 0) {
        $('.playerlist').height($('.player-box').outerHeight());
        $('.timeline-item').each(function () {
            var rightH = $(this).find('.timeline-right').outerHeight();
            $(this).find('.timeline-left-wrapper').height(rightH);
        });
    }

    $('.header-submenu').parent().find('a:first').on('click', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(this).parents('.header-navigation').find('.header-submenu').not($(this).parents('li').find('.header-submenu')).removeClass('active');
        $(this).parents('li').find('.header-submenu').show().toggleClass('active');

    });

    $('.sidebar-menu > li > a').on('click', function (e) {
        var firstSubMenu = $(this).parent().find('ul:first');
        var that = $(this);
        if (firstSubMenu.length) {
            e.stopPropagation();
            e.preventDefault();
            that.parent().parent().find('li').removeClass('active');
            if (firstSubMenu.css('display') == 'block')
                that.parent().removeClass('active');
            else
                that.parent().addClass('active');

            firstSubMenu.slideToggle(100);

        }
    });

    $('.article-left-box').css('height', $('.article-inner').outerHeight())

    setStickySidebar.call($(window));

    makeParallax.call($(window));

    $('.material-button').on('click', function (e) {
        addWaveEffect($(this), e);
    });

    $(document).on('click', function (event) {
        //close submenu on anywhere
        var clickover = $(event.target);
        var _opened = $(".header-submenu").hasClass("active");
        if (_opened === true && !clickover.hasClass("submenu-toggle")) {
            $(".header-submenu").removeClass('active');
        }

        //close searchbar on click anywhere
        if (clickover.parents('.search-bar').length < 1 && !clickover.hasClass("search-bar") && !clickover.parent().hasClass("search-toggle") && !clickover.hasClass("search-toggle")) {
            $('.search-bar').removeClass('active');
        }
    });

    //trigger scrollable elements actions
    $(window).on('scroll', function () {
        showHideHeader.call(this);
        setStickySidebar.call(this);
        makeParallax.call(this);
    });

    //sidebar boxed posts scripts    
    $('.w-boxed-post ul li').on('mouseover', function (e) {
        $(this).parent().find('li').removeClass();
    });

    $('.w-boxed-post ul li').on('mouseleave', function (e) {
        $(this).addClass('active');
    });

    //article share emoticons action
    $('.article-emoticons>li').on('mouseover', function (e) {
        $(this).parent().addClass('active');
    });
    $('.article-emoticons>li').on('mouseleave', function (e) {
        $(this).parent().removeClass('active');
    });


});


/*live event triggers*/
/*open popup modal from data attribute*/
$(document).on('click', '[data-modal]', function (e) {
    e.preventDefault();
    $('.m-modal-box').hide();
    var modalId = $(this).attr('data-modal');
    $('#' + modalId).show();
});
/*close popup modal clicked close button*/
$(document).on('click', '.m-modal-close, .m-modal-overlay', function (e) {
    $(this).parents('.m-modal-box').hide();
});

//Owl carousel initializing
$('#postCarousel').owlCarousel({
    loop: true,
    dots: true,
    nav: true,
    navText: ['<span><i class="material-icons">&#xE314;</i></span>', '<span><i class="material-icons">&#xE315;</i></span>'],
    items: 1,
    margin: 20
})

//widget carousel initialize
$('#widgetCarousel').owlCarousel({
    dots: true,
    nav: false,
    items: 1
})

$(document).ready(function(){

    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

});