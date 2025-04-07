$(document).ready(function() {
    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        
        var target = this.hash;
        var $target = $(target);
        
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 100
        }, 900, 'swing');
    });
    
    // Animation on scroll
    $(window).scroll(function() {
        $('.service-card').each(function() {
            var bottom_of_object = $(this).offset().top + $(this).outerHeight() / 3;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            if (bottom_of_window > bottom_of_object) {
                $(this).addClass('animate__animated animate__fadeInUp');
            }
        });
        
        $('.workshop-card').each(function() {
            var bottom_of_object = $(this).offset().top + $(this).outerHeight() / 3;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            if (bottom_of_window > bottom_of_object) {
                $(this).addClass('animate__animated animate__fadeIn');
            }
        });
    });
});

