$(document).ready(function() {
	$('#login-trigger').click(function() {
		$(this).next('#login-content').slideToggle();
		$(this).toggleClass('active');

		if ($(this).hasClass('active'))
			$(this).find('span').html('&#x25B2;')
		else
			$(this).find('span').html('&#x25BC;')
	})
});

$(document).ready(function() {
	$('#user-trigger').click(function() {
		$(this).next('#user-content').slideToggle();
		$(this).toggleClass('active');

		if ($(this).hasClass('active'))
			$(this).find('span').html('&#x25B2;')
		else
			$(this).find('span').html('&#x25BC;')
	})
});

$(document).ready(function() {
	$('#loc-trigger').click(function() {
		$(this).next('#loc-content').slideToggle();
		$(this).toggleClass('active');

		if ($(this).hasClass('active'))
			$(this).find('span').html('&#x25B2;')
		else
			$(this).find('span').html('&#x25BC;')
	})
});