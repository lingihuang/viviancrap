$(function () {
	$('.navbar-btn').on('click', function (e) {
		var navbarSel = $('.navbar');
		if (navbarSel.hasClass('is-show')) {
			navbarSel.removeClass('is-show');
		} else {
			navbarSel.addClass('is-show');
		}
		e.preventDefault();
	});
});