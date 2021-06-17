$(document).ready(function () {
  $('.menu-btn').click(function () {
    let has = $('.menu-list').hasClass('active');
    if (has) {
      $('.menu-list').removeClass('active');
      $('.bg').removeClass('active');
      $('.non-menu-icon').removeClass('active');
      $('.menu-icon').removeClass('active');
    } else {
      $('.menu-list').addClass('active');
      $('.bg').addClass('active');
      $('.non-menu-icon').addClass('active');
      $('.menu-icon').addClass('active');
    }
  });
});