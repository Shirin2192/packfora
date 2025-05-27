// Smooth Scroll nav
$.scrollIt({
    upKey: 38,                // key code to navigate to the next section
    downKey: 40,              // key code to navigate to the previous section
    easing: 'linear',          // the easing function for animation
    scrollTime: 600,          // how long (in ms) the animation takes
    activeClass: 'active',    // class given to the active nav element
    onPageChange: null,       // function(pageIndex) that is called when page is changed
    topOffset: -75            // offste (in px) for fixed top navigation
});

// Navbar Menu 

$('.navbar .dropdown').hover(function () {
    $(this).find('.dropdown-menu').addClass('show');
}, function () {
    $(this).find('.dropdown-menu').removeClass('show')
});

$('.navbar .dropdown-item').hover(function () {
    $(this).find('.dropdown-side').addClass('show');
}, function () {
    $(this).find('.dropdown-side').removeClass('show')
});

$(".navbar .search-form").on("click", ".search-icon", function () {

    $(".navbar .search-form").toggleClass("open");

    if ($(".navbar .search-form").hasClass('open')) {

        $(".search-form .close-search").slideDown();

    } else {

        $(".search-form .close-search").slideUp();
    }
});

$(".navbar").on("click", ".navbar-toggler", function () {

    $(".navbar .navbar-collapse").toggleClass("show");
});

$(window).on("scroll", function () {

    var bodyScroll = $(window).scrollTop(),
        navbar = $(".navbar"),
        logo = $(".navbar.change .logo> img");

    if (bodyScroll > 300) {

        navbar.addClass("nav-scroll");
        logo.attr('src', 'assets/imgs/logo-dark.png');

    } else {

        navbar.removeClass("nav-scroll");
        logo.attr('src', 'assets/imgs/logo-light.png');
    }
});

function noScroll() {
    window.scrollTo(0, 0);
}

$('.navbar .menu-icon').on('click', function () {

    $('.hamenu').addClass("open");

    $('.hamenu').animate({ left: 0 });

});

$('.hamenu .close-menu, .one-scroll .menu-links .main-menu > li').on('click', function () {

    $('.hamenu').removeClass("open").delay(300).animate({ left: "-100%" });
    $('.hamenu .menu-links .main-menu .dmenu, .hamenu .menu-links .main-menu .sub-dmenu').removeClass("dopen");
    $('.hamenu .menu-links .main-menu .sub-menu, .hamenu .menu-links .main-menu .sub-menu2').slideUp();

});

$('.hamenu .menu-links .main-menu > li').on('mouseenter', function () {
    $(this).removeClass('hoverd').siblings().addClass('hoverd');
});

$('.hamenu .menu-links .main-menu > li').on('mouseleave', function () {
    $(this).removeClass('hoverd').siblings().removeClass('hoverd');
});


$('.main-menu > li .dmenu').on('click', function () {
    $(this).parent().parent().find(".sub-menu").toggleClass("sub-open").slideToggle();
    $(this).toggleClass("dopen");
});

$('.sub-menu > ul > li .sub-dmenu').on('click', function () {
    $(this).parent().parent().find(".sub-menu2").toggleClass("sub-open").slideToggle();
    $(this).toggleClass("dopen");
});

$('.submenu-toggle').click(function () {
    $(this).next('.inner-sub-menu').slideToggle(200);
    $(this).find('i').toggleClass('fa-angle-down fa-angle-up');
});

// Home Page
$(document).ready(function () {
    $(".hero-slider").owlCarousel({
        items: 1,
        loop: true,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: false,
        animateOut: 'fadeOut',
        responsive: {
            0: {
                items: 1
            }
        }
    });

    $(".blogs-slider").owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        navText: ["<span>‹</span>", "<span>›</span>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
});

$(document).ready(function () {
    $(".clientOwl").owlCarousel({
        dots: false,
        nav: true,
        loop: true,
        margin: 10,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 4
            },
            1000: {
                items: 5
            }
        }
    });
    $(".owl-prev").html('<i class="fa-solid fa-arrow-left"></i>');
    $(".owl-next").html('<i class="fa-solid fa-arrow-right"></i>');
});

$(document).ready(function () {
    $(".case-study-carousel").owlCarousel({
        loop: true,
        center: true,
        margin: 10,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            0: {
                items: 1.2
            },
            768: {
                items: 1.2
            },
            1000: {
                items: 1.2,
            }
        },
    });
});


$(window).on('scroll', function () {
    var windowHeight = $(window).height();
    var scrollTop = $(window).scrollTop();

    var client = $('#client');
    var clientTop = client.offset().top;
    var clientHeight = client.outerHeight();

    var clientVisible = (scrollTop + windowHeight) - clientTop;
    var visibleRatio = clientVisible / clientHeight;

    if (visibleRatio >= 0.5 && scrollTop < clientTop + clientHeight) {
        client.addClass('gray-bg');
    } else {
        client.removeClass('gray-bg');
    }
});

$(window).on('scroll', function () {
    var windowHeight = $(window).height();
    var scrollTop = $(window).scrollTop();

    var blogs = $('#blogs');
    var blogsTop = blogs.offset().top;
    var blogsHeight = blogs.outerHeight();

    var blogsVisible = (scrollTop + windowHeight) - blogsTop;
    var visibleRatio = blogsVisible / blogsHeight;

    if (visibleRatio >= 0.5 && scrollTop < blogsTop + blogsHeight) {
        blogs.addClass('blue-bg');
    } else {
        blogs.removeClass('blue-bg');
    }
});

// About Us Page
document.addEventListener('DOMContentLoaded', function () {
    // Add interactive ripple effect on map click
    const mapContainer = document.querySelector('.world-map-container');
    mapContainer.addEventListener('click', function (e) {
        const rect = this.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const ripple = document.createElement('div');
        ripple.classList.add('ripple');
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.style.width = '100px';
        ripple.style.height = '100px';
        ripple.style.marginLeft = '-50px';
        ripple.style.marginTop = '-50px';

        this.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();
        }, 2000);
    });

    // Counter animation for circles
    const circles = document.querySelectorAll('.circle');
    let animated = false;

    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function animateCounters() {
        if (animated) return;

        if (isInViewport(circles[0])) {
            animated = true;

            circles.forEach(circle => {
                const numberElement = circle.querySelector('.number');
                const targetNumber = parseInt(numberElement.textContent);
                let currentNumber = 0;
                const duration = 2000; // ms
                const interval = 16; // ms
                const steps = duration / interval;
                const increment = targetNumber / steps;

                const counter = setInterval(() => {
                    currentNumber += increment;
                    if (currentNumber >= targetNumber) {
                        numberElement.innerHTML = targetNumber + '<sup>+</sup>';
                        clearInterval(counter);
                    } else {
                        numberElement.innerHTML = Math.floor(currentNumber) + '<sup>+</sup>';
                    }
                }, interval);
            });
        }
    }

    // Initial check
    animateCounters();

    // Check on scroll
    window.addEventListener('scroll', animateCounters);
});

// Service Pages
$(document).ready(function () {
    $('.read-more-toggle').click(function () {
        var $this = $(this);
        var $content = $this.siblings('.more-content');
        var $text = $this.find('.toggle-text');
        var $icon = $this.find('.toggle-icon');

        $content.slideToggle(300, function () {
            if ($content.is(':visible')) {
                $text.text('Read Less');
                $icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
            } else {
                $text.text('Read More');
                $icon.removeClass('fa-chevron-up').addClass('fa-chevron-down');
            }
        });
    });
});


// Leadership Page
window.addEventListener("scroll", function () {
    const scrollY = window.scrollY;
    const heading = document.querySelector(".main-heading");
    const subtext = document.querySelector(".subtext");
    const overlay = document.querySelector(".overlay");

    if (scrollY > 50) {
        heading.style.transform = "translateY(0px)";
        heading.style.fontSize = "35px";
        subtext.style.opacity = 1;
        subtext.style.transform = "translateY(0)";
        overlay.style.backgroundColor = "rgba(68, 59, 59, 0.2)";
    } else {
        heading.style.transform = "translateY(-135px)";
        heading.style.fontSize = "60px";
        subtext.style.opacity = 0;
        subtext.style.transform = "translateY(0)";
        overlay.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
    }
});

// Why Packfora
$(document).ready(function () {
    $(".technocrats-nav").owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        navText: ['<span>&lt;</span>', '<span>&gt;</span>'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
});

// Forms
$(document).ready(function () {
    $('#contact-request').on('submit', function (e) {
        e.preventDefault(); // Stop form from submitting normally

        $.ajax({
            type: 'POST',
            url: 'contact-request.php',  // PHP script that handles the form submission
            data: $(this).serialize(), // Serialize the form data for submission
            success: function (response) {
                if (response.includes('Thank you for contacting us!')) {
                    Swal.fire({
                        title: 'Success!',
                        text: response,
                        icon: 'success'
                    }).then(() => {
                        $('#contact-request')[0].reset(); // Reset form after success
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response,
                        icon: 'error'
                    });
                }
            },
            error: function () {
                Swal.fire({
                    title: 'Error!',
                    text: 'An unexpected error occurred. Please try again later.',
                    icon: 'error'
                });
            }
        });
    });

});

// Packforam Thumbnail Image
document.addEventListener('DOMContentLoaded', () => {
    const thumbnails = document.querySelectorAll('.thumbnail');
    const mainImage = document.getElementById('mainImage');
    const container = document.getElementById('thumbnailContainer');

    let currentIndex = 0;
    let autoChange = true;

    function changeImage(index) {
        const src = thumbnails[index].getAttribute('data-src') || thumbnails[index].src;
        mainImage.src = src;

        thumbnails.forEach(thumb => thumb.classList.remove('active'));
        thumbnails[index].classList.add('active');

        // Scroll thumbnail horizontally inside container only (no vertical scroll)
        const thumb = thumbnails[index];
        const containerWidth = container.offsetWidth;
        const scrollTo = thumb.offsetLeft - (containerWidth / 2) + (thumb.offsetWidth / 2);

        container.scrollTo({
            left: scrollTo,
            behavior: 'smooth'
        });
    }

    function manualChange(index) {
        changeImage(index);
        currentIndex = index;
        autoChange = false;

        setTimeout(() => {
            autoChange = true;
        }, 10000); // Resume auto change after 10s
    }

    thumbnails.forEach((thumb, index) => {
        thumb.addEventListener('click', () => {
            manualChange(index);
        });
    });

    // Initialize first image
    changeImage(currentIndex);

    setInterval(() => {
        if (autoChange) {
            currentIndex = (currentIndex + 1) % thumbnails.length;
            changeImage(currentIndex);
        }
    }, 3000);
});