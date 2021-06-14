$('.site_tab').on('click', function(e){
	e.preventDefault();
	let dataProfileTab = $(this).data('site_tab');
	console.log(dataProfileTab);
	$('.site_tab').removeClass('active');
	$(this).addClass('active');
	$('.site_tab_content').removeClass('active');
	$('.site_tab_content[data-site_tab="'+dataProfileTab+'"').addClass('active');
})

$('.header_toggle').on('click', function(){
  $(this).toggleClass('open');
  $('body').toggleClass('overflow-hidden');
  $('.mobile-menu').toggleClass('show');
})