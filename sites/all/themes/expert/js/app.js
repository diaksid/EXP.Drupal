$(document).ready(function(){
var jQ = false;
function initJQ() {
	if (typeof(jQuery) == 'undefined') {
		if (!jQ) {
			jQ = true;
			document.write('<script src="js/libs/jquery-1.8.3.min.js"></script>');
		}
			setTimeout('initJQ()', 50);
	} else {
		(function($) {
			$(function() {
				
				if(!Modernizr.input.placeholder){
					$('[placeholder]').focus(function() {
					  var input = $(this);
					  if (input.val() == input.attr('placeholder')) {
						input.val('');
						input.removeClass('placeholder');
						}
					}).blur(function() {
						  var input = $(this);
						  if (input.val() == '' || input.val() == input.attr('placeholder')) {
							input.addClass('placeholder');
							input.val(input.attr('placeholder'));
						  }
					}).blur();
					$('[placeholder]').parents('form').submit(function() {
						$(this).find('[placeholder]').each(function() {
							var input = $(this);
							if (input.val() == input.attr('placeholder')) {
								input.val('');
							}
						})
					});
				};

				
				
				$('#mycarousel-aside #mycarousel-next').text('1');
				$("#mycarousel-aside").jcarousel({
					scroll: 1,
					initCallback: mycarousel_aside,
					// This tells jCarousel NOT to autobuild prev/next buttons
					buttonNextHTML: null,
					buttonPrevHTML: null
				});

				$('#mycarousel #mycarousel-next').text('1');
				$("#mycarousel").jcarousel({
					scroll: 1,
					auto: 5,
					initCallback: mycarousel,
					// This tells jCarousel NOT to autobuild prev/next buttons
					buttonNextHTML: null,
					buttonPrevHTML: null
				});

				var item = $("#mycarousel-foto");
				$("#mycarousel-foto ul li").width(item.width()/3);
				item.height($("#mycarousel-foto ul li").height()+40);
				$('#mycarousel-foto #mycarousel-next').text('1');
				item.jcarousel({
					scroll: 1,
                    auto: 3,
					initCallback: mycarousel_foto,
					// This tells jCarousel NOT to autobuild prev/next buttons
					buttonNextHTML: null,
					buttonPrevHTML: null
				});
			})
		})(jQuery)
   }
}

initJQ();

function mycarousel(carousel) {
	var fotonext = $('#mycarousel #mycarousel-next');
	var fotoprev = $('#mycarousel #mycarousel-prev');
	var siz = $('#mycarousel ul li').size();

    $('#mycarousel .jcarousel-control a').bind('click', function() {
        carousel.scroll(jQuery.jcarousel.intval($(this).text()));
		$(this).addClass('active').siblings().removeClass('active');
        return false;
    });

    fotonext.bind('click', function() {
		if(fotonext.text()>siz-3)
			fotonext.addClass('noact');
		else{
			fotoprev.removeClass('noact');
			fotonext.text(fotonext.text()*1+1);	
		}
        carousel.next();
        return false;
    });

    fotoprev.bind('click', function() {
		if(fotonext.text()<3){
		
			if(fotonext.text()==2){
				fotoprev.addClass('noact');
				fotonext.text(fotonext.text()*1-1);
			}
			if(fotonext.text()==1)
				fotoprev.addClass('noact');
		}else{
			fotonext.removeClass('noact');
			fotonext.text(fotonext.text()*1-1);	
		}
		
        carousel.prev();
        return false;
    });
};

function mycarousel_foto(carousel) {
	var fotonext = $('#mycarousel-foto #mycarousel-next');
	var fotoprev = $('#mycarousel-foto #mycarousel-prev');
	
    $('#mycarousel-foto .jcarousel-control a').bind('click', function() {
        carousel.scroll(jQuery.jcarousel.intval($(this).text()));
		$(this).addClass('active').siblings().removeClass('active');
        return false;
    });
	
	var siz = $('#mycarousel-foto ul li').size();
	
    fotonext.bind('click', function() {
		if($(this).text()==siz-2){
			fotonext.addClass('noact');
			return false;
		}else{
			$(this).text($(this).text()*1+1);
			fotoprev.removeClass('noact');
		}
		if($(this).text()==siz-2)
			fotonext.addClass('noact');
        carousel.next();
        return false;
    });

    fotoprev.bind('click', function() {
		if(fotonext.text()>1){
			fotonext.text(fotonext.text()*1-1);	
			fotonext.removeClass('noact');
		}else fotoprev.addClass('noact');
		if(fotonext.text()==1)
			fotoprev.addClass('noact');
		carousel.prev();
        return false;
    });
};

function mycarousel_aside(carousel) {
	var fotonext = $('#mycarousel-aside #mycarousel-next');
	var fotoprev = $('#mycarousel-aside #mycarousel-prev');
	var siz = $('#mycarousel-aside ul li').size();

    $('#mycarousel .jcarousel-control a').bind('click', function() {
        carousel.scroll(jQuery.jcarousel.intval($(this).text()));
		$(this).addClass('active').siblings().removeClass('active');
        return false;
    });

    fotonext.bind('click', function() {
		if(fotonext.text()>siz-1){
			fotonext.addClass('noact');
		}else{
			fotonext.text(fotonext.text()*1+1);	
		}
		if(fotonext.text()==siz-1){
			fotonext.text(fotonext.text()*1+1);
		}
		if(siz==2){
			fotonext.addClass('noact');
		}
			
		fotoprev.removeClass('noact');
        carousel.next();
        return false;
    });

    fotoprev.bind('click', function() {
		if(fotonext.text()<3){
		
			if(fotonext.text()==2){
				fotonext.text(fotonext.text()*1-1);
			}
			if(fotonext.text()==1){
				fotoprev.addClass('noact');
			}
		}else{
			fotonext.text(fotonext.text()*1-1);	
		}
		fotonext.removeClass('noact');
        carousel.prev();
        return false;
    });
};
});