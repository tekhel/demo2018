$('body').append('<div id="backToTop" class="btn btn-lg"><span class="glyphicon glyphicon-chevron-up"></span></div>');
    $(window).scroll(function () {
		if ($(this).scrollTop() <= 300) {
			$('#backToTop').fadeOut();
		} else {
			$('#backToTop').fadeIn();
		}
	}); 
$('#backToTop').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
});