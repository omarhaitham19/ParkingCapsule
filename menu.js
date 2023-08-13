$(document).ready(function() {
  $(".menu .account-link").click(function(e) {
    e.preventDefault();
    var $submenu = $(this).closest('.menu').find('.submenu');
    $submenu.slideToggle(200); // Adjust the animation speed as desired
  });
});
