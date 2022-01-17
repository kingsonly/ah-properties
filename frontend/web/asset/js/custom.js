$( '.nav-primary li.menu-item-has-children > a' ).after( '<span class="sub-menu-toggle icon-caret-down"></span>' );
$( '.sub-menu-toggle').click( function() {
	// var $this = $(this),
	// 	$parent = $this.closest( 'li' ),
	// 	$wrap = $parent.find( '> .sub-menu' );
	// $wrap.toggleClass( 'js-toggled' );
	// $wrap.slideToggle();
	// $this.toggleClass( 'js-toggled' );
	$(this).toggleClass('js-toggled');
	$(this).next().slideToggle();
  $('.sub-menu').not($(this).next()).slideUp();
  $('.sub-menu-toggle').not($(this)).removeClass('js-toggled');
});
$('.menu-toggle').click( function() {
	$('body').toggleClass('overlay-body');
    $('.nav-primary').fadeToggle();
	$(this).toggleClass('menu-toggle-open');
  $(".dashboard-left").toggleClass('dashboard-left-open');
});

$('.dashboard-header-profile').hover( function() {
  $(".das-profile-menu").fadeToggle();
});

$(document).on('click', '.das-notification', function(){

    if ($('#modal').hasClass('in')) {
        $('#modal').find('#modalContent')
                .load($(this).attr('value'));
        document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
    } else {
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
        document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
    }
	
})