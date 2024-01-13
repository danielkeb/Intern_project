document.addEventListener('DOMContentLoaded', function() {
    var clickableIcon = document.querySelector('.clickable-icon');
    var adminDetails = document.querySelector('.admin-details');

    clickableIcon.addEventListener('click', function() {
        if (adminDetails.style.display === 'none') {
            adminDetails.style.display = 'block';
        } else {
            adminDetails.style.display = 'none';
        }
    });


});

$(document).ready(function() {
    $('.angle-icon').click(function() {
        $(this).toggleClass('active');
        $(this).siblings('.stretched-link').toggle();
        $(this).closest('.card').find('.additional-content').slideToggle();
    });
});
