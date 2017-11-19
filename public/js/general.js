$('#myCarousel').carousel({
    interval: 10000
})

if ($(window).width() > 767) {
    $('.carousel .item').each(function() {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length > 0) {
            next.next().children(':first-child').clone().appendTo($(this));
        } else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });
}


$('.lqt-masonry').masonry({
    // options
    itemSelector: '.lqt-masonry-item'
});

$('.lqt-btn-edit-password').click(function() {
    $('.lqt-user-edit-password').toggle();
});

$('.lqt-nav-dropdown').click(function() {
    $('.lqt-nav-content-dropdown').toggle();
});

$('input.datepicker').datepicker();
