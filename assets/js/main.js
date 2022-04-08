/**
 * Template Name: Flattern - v4.7.0
 * Template URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */
(function() {
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all)
        if (selectEl) {
            if (all) {
                selectEl.forEach(e => e.addEventListener(type, listener))
            } else {
                selectEl.addEventListener(type, listener)
            }
        }
    }

    /**
     * Easy on scroll event listener 
     */
    const onscroll = (el, listener) => {
        el.addEventListener('scroll', listener)
    }

    /**
     * Scrolls to an element with header offset
     */
    const scrollto = (el) => {
        let header = select('#header')
        let offset = header.offsetHeight

        if (!header.classList.contains('header-scrolled')) {
            offset -= 16
        }

        let elementPos = select(el).offsetTop
        window.scrollTo({
            top: elementPos - offset,
            behavior: 'smooth'
        })
    }

    /**
     * Header fixed top on scroll
     */
    let selectHeader = select('#header')
    if (selectHeader) {
        let headerOffset = selectHeader.offsetTop
        let nextElement = selectHeader.nextElementSibling
        const headerFixed = () => {
            if ((headerOffset - window.scrollY) <= 0) {
                selectHeader.classList.add('fixed-top')
                nextElement.classList.add('scrolled-offset')
            } else {
                selectHeader.classList.remove('fixed-top')
                nextElement.classList.remove('scrolled-offset')
            }
        }
        window.addEventListener('load', headerFixed)
        onscroll(document, headerFixed)
    }

    /**
     * Back to top button
     */
    let backtotop = select('.back-to-top')
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add('active')
            } else {
                backtotop.classList.remove('active')
            }
        }
        window.addEventListener('load', toggleBacktotop)
        onscroll(document, toggleBacktotop)
    }

    /**
     * Mobile nav toggle
     */
    on('click', '.mobile-nav-toggle', function(e) {
        select('#navbar').classList.toggle('navbar-mobile')
        this.classList.toggle('bi-list')
        this.classList.toggle('bi-x')
    })

    /**
     * Mobile nav dropdowns activate
     */
    on('click', '.navbar .dropdown > a', function(e) {
        if (select('#navbar').classList.contains('navbar-mobile')) {
            e.preventDefault()
            this.nextElementSibling.classList.toggle('dropdown-active')
        }
    }, true)

    /**
     * Scrool with ofset on links with a class name .scrollto
     */
    on('click', '.scrollto', function(e) {
        if (select(this.hash)) {
            e.preventDefault()

            let navbar = select('#navbar')
            if (navbar.classList.contains('navbar-mobile')) {
                navbar.classList.remove('navbar-mobile')
                let navbarToggle = select('.mobile-nav-toggle')
                navbarToggle.classList.toggle('bi-list')
                navbarToggle.classList.toggle('bi-x')
            }
            scrollto(this.hash)
        }
    }, true)

    /**
     * Scroll with ofset on page load with hash links in the url
     */
    window.addEventListener('load', () => {
        if (window.location.hash) {
            if (select(window.location.hash)) {
                scrollto(window.location.hash)
            }
        }
    });

    /**
     * Hero carousel indicators
     */
    let heroCarouselIndicators = select("#hero-carousel-indicators")
    let heroCarouselItems = select('#heroCarousel .carousel-item', true)

    heroCarouselItems.forEach((item, index) => {
        (index === 0) ?
        heroCarouselIndicators.innerHTML += "<li data-bs-target='#heroCarousel' data-bs-slide-to='" + index + "' class='active'></li>":
            heroCarouselIndicators.innerHTML += "<li data-bs-target='#heroCarousel' data-bs-slide-to='" + index + "'></li>"
    });

    /**
     * Skills animation
     */
    let skilsContent = select('.skills-content');
    if (skilsContent) {
        new Waypoint({
            element: skilsContent,
            offset: '80%',
            handler: function(direction) {
                let progress = select('.progress .progress-bar', true);
                progress.forEach((el) => {
                    el.style.width = el.getAttribute('aria-valuenow') + '%'
                });
            }
        })
    }

    // /**
    //  * Porfolio isotope and filter
    //  */
    // window.addEventListener('load', () => {
    //     let portfolioContainer = select('.portfolio-container');
    //     if (portfolioContainer) {
    //         let portfolioIsotope = new Isotope(portfolioContainer, {
    //             itemSelector: '.portfolio-item',
    //             layoutMode: 'fitRows'
    //         });

    //         let portfolioFilters = select('#portfolio-flters li', true);

    //         on('click', '#portfolio-flters li', function(e) {
    //             e.preventDefault();
    //             portfolioFilters.forEach(function(el) {
    //                 el.classList.remove('filter-active');
    //             });
    //             this.classList.add('filter-active');

    //             portfolioIsotope.arrange({
    //                 filter: this.getAttribute('data-filter')
    //             });
    //             portfolioIsotope.on('arrangeComplete', function() {
    //                 AOS.refresh()
    //             });
    //         }, true);
    //     }

    // });

    // /**
    //  * Initiate portfolio lightbox 
    //  */
    // const portfolioLightbox = GLightbox({
    //     selector: '.portfolio-lightbox'
    // });

    // /**
    //  * Portfolio details slider
    //  */
    // new Swiper('.portfolio-details-slider', {
    //     speed: 400,
    //     loop: true,
    //     autoplay: {
    //         delay: 5000,
    //         disableOnInteraction: false
    //     },
    //     pagination: {
    //         el: '.swiper-pagination',
    //         type: 'bullets',
    //         clickable: true
    //     }
    // });


    /**
     * Porfolio isotope and filter
     */
    // $(document).ready(function() {


    //     window.addEventListener('load', () => {
    //         var kisumu = document.querySelector("#kisumu-cont");
    //         // var kisumu = document.getElementById('kisumu-cont');
    //         // var crawn = document.getElementById('crawn-cont')
    //         kisumu.style.display = "none";
    //         $('#kisumu-cont').hide();
    //         // crawn.style.display = "none";
    //         let portfolioContainer = select('.portfolio-container');
    //         if (portfolioContainer) {
    //             let portfolioIsotope = new Isotope(portfolioContainer, {
    //                 itemSelector: '.portfolio-item'
    //             });

    //             let portfolioFilters = select('#portfolio-flters li', true);
    //             // kisumu.style.display = "block";
    //             $('#kisumu-cont').show();
    //             on('click', '#portfolio-flters li', function(e) {
    //                 e.preventDefault();
    //                 // kisumu.style.display = "block";
    //                 $('#kisumu-cont').show();
    //                 // crawn.style.display = "block";
    //                 portfolioFilters.forEach(function(el) {
    //                     el.classList.remove('filter-active');
    //                     // kisumu.style.display = "block";
    //                     // crawn.style.display = "block";
    //                     $('#kisumu-cont').show();
    //                 });
    //                 this.classList.add('filter-active');

    //                 portfolioIsotope.arrange({
    //                     filter: this.getAttribute('data-filter')
    //                 });

    //                 portfolioIsotope.on('arrangeComplete', function() {
    //                     AOS.refresh()
    //                 });
    //             }, true);

    //         }
    //     });

    //     $('#eoc').on('click', function() {
    //         $('kisumu-cont').show();
    //     })
    // });
    /**
     * Initiate portfolio lightbox 
     */
    const portfolioLightbox = GLightbox({
        selector: '.portfolio-lightbox'
    });

    /**
     * Initiate portfolio details lightbox 
     */
    const portfolioDetailsLightbox = GLightbox({
        selector: '.portfolio-details-lightbox',
        width: '90%',
        height: '90vh'
    });

    /**
     * Portfolio details slider
     */
    new Swiper('.portfolio-details-slider', {
        speed: 400,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        }
    });


    /**
     * Animation on scroll
     */
    window.addEventListener('load', () => {
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        })
    });

})()


/**
 * Testimonials slider
 */
new Swiper('.testimonials-slider', {
    speed: 600,
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false
    },
    slidesPerView: '3',
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
    }
});


/**
 * Events slider
 */
new Swiper('.events-slider', {
    speed: 600,
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
    }
});

/**
 * Initiate gallery lightbox 
 */
const galleryLightbox = GLightbox({
    selector: '.gallery-lightbox'
});


// var min_w = 300;
// var vid_w_orig;
// var vid_h_orig;

// $(function() {

//     vid_w_orig = parseInt($('video').attr('width'));
//     vid_h_orig = parseInt($('video').attr('height'));

//     $(window).resize(function() { fitVideo(); });
//     $(window).trigger('resize');

// });

// function fitVideo() {

//     $('#video-viewport').width($('.fullsize-video-bg').width());
//     $('#video-viewport').height($('.fullsize-video-bg').height());

//     var scale_h = $('.fullsize-video-bg').width() / vid_w_orig;
//     var scale_v = $('.fullsize-video-bg').height() / vid_h_orig;
//     var scale = scale_h > scale_v ? scale_h : scale_v;

//     if (scale * vid_w_orig < min_w) { scale = min_w / vid_w_orig; };

//     $('video').width(scale * vid_w_orig);
//     $('video').height(scale * vid_h_orig);

//     $('#video-viewport').scrollLeft(($('video').width() - $('.fullsize-video-bg').width()) / 2);
//     $('#video-viewport').scrollTop(($('video').height() - $('.fullsize-video-bg').height()) / 2);

// };


/**
 * Hero type effect
 */
// const typed = select('.typed')
// if (typed) {
//     let typed_strings = typed.getAttribute('data-typed-items')
//     typed_strings = typed_strings.split(',')
//     new Typed('.typed', {
//         strings: typed_strings,
//         loop: true,
//         typeSpeed: 100,
//         backSpeed: 50,
//         backDelay: 2000
//     });
// }