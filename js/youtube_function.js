
$(document).ready(function(){
	$('.videoOfList').click(function(){
		var videoID = $(this).attr('id');
		new_url = 'https://www.youtube.com/embed/'+videoID+'?rel=0&amp;showinfo=0'
		$('#MainVideo').attr('src', new_url);
		$('.videoOfList').removeClass('box-scroller-section-left').addClass('box-scroller-section-middle');
		$(this).removeClass('box-scroller-section-middle').addClass('box-scroller-section-left');
	});

});


