jQuery(document).ready(function($) {
	 $('ul.main_menu > li').hover(function() {
                jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
            }, function() {
          $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
           });
	 
         
      
    // Вешаем событие прокрутки к нужному месту
    
    	$('#left_menu').on('click','a[href^="#"]',function () {
         
    		$('#left_menu li').each(function(){ $(this).removeClass('pactive');});
                
                $(this).parent('li').addClass('pactive');
    		var target = this.hash;

    		var target_n = $(target);
    
    		$('html, body').stop().animate({
    			'scrollTop': target_n.offset().top - 100
    		}, 900, 'swing', function () {
    			//window.location.hash = target;
    		});
    	});
  
	  //SCROLL UP
	$('.scroll_up').on('click',function(){
		$('body, html').animate({
			scrollTop: 0
		}, 700);
	});
	
	//SCROLL UP SHOW
	window.onscroll = function(){
		if ($(window).scrollTop()>100)
		$('.scroll_up').fadeIn();
		else $('.scroll_up').fadeOut();
	};

	
	//INDEX_CAROUSEL
	$('.index_slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		dots: true,
		infinite: false,
		variableWidth: false
	});
	
	//PRODUCT_USAGE_CAROUSEL
	$('.product_usage_slider').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		prevArrow: '<button class="slick-prev icon-angle-left"></button>',
		nextArrow: '<button class="slick-next icon-angle-right"></button>',
		dots: false,
		infinite: true,
		variableWidth: false,
		responsive: [
			{
			  breakpoint: 620,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 467,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			  }
			}
		]
	});
	
	//PRODUCT_USAGE_TABS
	$('.product_usage_tabs').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		prevArrow: '<button class="slick-prev icon-angle-left"></button>',
		nextArrow: '<button class="slick-next icon-angle-right"></button>',
		dots: false,
		infinite: true,
		variableWidth: false,
		responsive: [
			{
			  breakpoint: 768,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 620,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 467,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
		]
	});
	
	//PRODUCT_USAGE_TABS_NAV
	$('.product_usage_tabs .tab_block a').on('click', function () {
		$(this).closest('.product_usage_tabs').find('.active').removeClass('active');
		$(this).closest('.tab_block').addClass('active');
	})
	$('.product_usage_tabs .slick-slide').on('click', function () {
		$(this).closest('.product_usage_tabs').find('.slick-active').removeClass('slick-active');
		$(this).closest('.product_usage_tabs').addClass('slick-active');
	})
	
	/*RESET CAROUSEL*/
	$('#product_usage a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		$('.look_list').slick('setPosition');
	})
	
	/*PRODUCT POPUP*/
	$('.jsShowFullImages').fancybox({
        fitToView: true,
        width: '100%',
        height: '100%',
        autoSize: true,
        closeClick: true,
        closeBtn : false,
        openEffect: 'none',
        closeEffect: 'none',
        beforeShow: function() {
        	var activeSlide = $('.jsShowFullImages.slick-current').index();
        	var topPicture = $($('.jsShowFullImages.slick-current').attr('href')).find('li:eq('+activeSlide+')').position().top;

        	$('.full-image-popup__list').scrollTop(topPicture + 40)


            $("body").css({ 'overflow-y': 'hidden' });
        },
        afterClose: function() {
            $("body").css({ 'overflow-y': 'visible' });
        },
        helpers: {
           overlay : null
        }
    });
	
	//RESET_CAROUSEL
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		$('.product_usage_slider').slick('setPosition');
	});
	
	//SEARCH
	if (window.innerWidth > 767) {

			if (window.innerWidth >= 1282 && window.innerWidth <= 1400) {
				var outerMargin = 285;
			}
			else {
				var outerMargin = 240;
			}

		$(".js-open-search").on('click', function(){
			if ($(this).data('type') == 'button') {
				var curForm = $(this).closest('form.search');
				var curFormPosition = Math.floor(curForm.offset().left);
				var curFormWidth = curFormPosition - outerMargin - 40;
				if (curFormWidth < 200) { curFormWidth = 200 }
				curForm.addClass('opened');
				curForm.animate({'width' : ''+curFormWidth+'px', 'padding-right' : '40px'}, 300);
				$(this).data('type', 'submit');
				return false;
			}	else {
				$(this).parents('form').trigger('submit');
			}
		});

		$(".js-close-search").on('click', function(){
				var curForm = $(this).closest('form.search');
				curForm.removeClass('opened');
				curForm.animate({'width' : '0px', 'padding-right' : '0px'}, 300);
				curForm.find('.js-open-search').data('type', 'button');
		});

	} 
	
	if (window.innerWidth < 768) {

		var outerMargin = 0;

		$(".js-open-search").on('click', function(){
			if ($(this).data('type') == 'button') {
				var curForm = $(this).closest('form.search');
				var curFormPosition = Math.floor(curForm.offset().left);
				var curFormWidth = curFormPosition - outerMargin - 40;
				if (curFormWidth < 200) { curFormWidth = 100 }
				curForm.addClass('opened');
				$('.header_right').addClass('opened');
				curForm.animate({'width' : ''+curFormWidth+'%', 'padding-right' : '40px'}, 300);
				$(this).data('type', 'submit');
				return false;
			}	else {
				$(this).parents('form').trigger('submit');
			}
		});

		$(".js-close-search").on('click', function(){
				var curForm = $(this).closest('form.search');
				curForm.removeClass('opened');
				$('.header_right').removeClass('opened');
				curForm.animate({'width' : '0px', 'padding-right' : '0px'}, 300);
				curForm.find('.js-open-search').data('type', 'button');
		});

	} 
	
	//MODAL RIGHT
	$(document).on('click', '.header_right .j3, .order_block .j3', function(e) {
		e.preventDefault();
		$('.pp-mod1.m2').addClass('active').siblings().removeClass('active');
		$('#page').addClass('active');
		$('.menu-main1').addClass('active');
		$('.r-head1').addClass('active');
	});
	
	$(document).on('click', '.side-ctrls', function(e) {
		e.preventDefault();
		$('.pp-mod1.m2').addClass('active').siblings().removeClass('active');
		$('#page').addClass('active');
		$('.menu-main1').addClass('active');
		$('.r-head1').addClass('active');
		$('.p_subcr').addClass('active');
		$('#modal_quick_view').modal('hide');
		$('body').removeClass('modal-open');
		$('body').removeAttr('style');
		$('.modal-backdrop').remove();
	});
	
	$(document).on('click', '.pp-mod1 .close2', function() {
		$('.pp-mod1').removeClass('active');
		setTimeout(function() {
			$('#page').removeClass('active');
			$('.menu-main1').removeClass('active');
			$('.p_subcr').removeClass('active');
			$('.r-head1').removeClass('active');
		}, 300);
	});
	
	$(document).on('click', '.pm1', function(e) {
		e.preventDefault();
		$('.pp-mod1.m4').addClass('active').siblings().removeClass('active');
		$('#page').addClass('active');
		$('.menu-main1').addClass('active');
		$('.r-head1').addClass('active');
	});
	
	/*$(document).on('click', '.pp-mod1 .j2', function() {
		$('.pp-mod1').removeClass('active');
		setTimeout(function() {
			$('#page').removeClass('active');
			$('.menu-main1').removeClass('active');
			$('.r-head1').removeClass('active');
		}, 300);
	});*/
	
	$(document).click(function(e){
		if ($(e.target).closest(".pp-mod1,.pm1,.menu-main1,.header_right,.search,.add-cart1.test,.add-cart-t2,.t2-lnk,.side-ctrls,.blocker, .add-cart1, .add-rev, .order_block .j3").length) return;
		$('.pp-mod1').removeClass('active');
		setTimeout(function() {
			$('#page').removeClass('active');
			$('.menu-main1').removeClass('active');
			$('.r-head1').removeClass('active');
		}, 300);
		e.stopPropagation();
	});
	
	$(document).on('click', '.header_right .j2, .t2-lnk a', function(e) {
		e.preventDefault();
		$('.pp-mod1.m3').addClass('active').siblings().removeClass('active');
		$('#page').addClass('active');
		$('.menu-main1').addClass('active');
		$('.r-head1').addClass('active');
	});
	
	$(document).on('click', '.add-rev', function(e) {
		e.preventDefault();
		$('.pp-mod1.m8').addClass('active').siblings().removeClass('active');
		$('#page').addClass('active');
		$('.menu-main1').addClass('active');
		$('.r-head1').addClass('active');
	});
	
	$(document).on('click', '.add-cart1', function(e) {
		e.preventDefault();
		$('.pp-mod1.m3').addClass('active').siblings().removeClass('active');
		$('#page').addClass('active');
		$('.menu-main1').addClass('active');
		$('.r-head1').addClass('active');
		$('#modal_quick_view').modal('hide');
		$('body').removeClass('modal-open');
		$('body').removeAttr('style');
		$('.modal-backdrop').remove();
	});
	
	$('.pp-mod1').on("click", ".ds-l1 .j2", function(e) {
		$('.pp-mod1.m2').removeClass('active');
		$('.pp-mod1.m1').addClass('active');
		e.preventDefault();
	});
	$('.pp-mod1').on("click", ".ds-l1 .j1", function(e) {
		$('.pp-mod1.m1').removeClass('active');
		$('.pp-mod1.m2').addClass('active');
		e.preventDefault();
	});
	
	//COUPON BLOCK
	$('.lnk1').click(function() {
		$('.coupon-block').removeAttr("style");
	});
	//MOBILE MENU
	$('.menu-burger .open_main_menu').click(function() {
		if (!$(this).hasClass('_close')) {
			$(this).addClass('_close');
			$('body').addClass('_no_overflow');
			$('.mobile_menu__box').animate({
				left: 0,
				//height : $(window).height() - 50
			}, 300);
			if (window.pageCatalog) {
				$('.mobile_menu__box .two_lvl').show();
				$('._under_header span').html($(this).text());
				$('.mobile_menu__box .two_lvl').css({left: 0});
				$('.mobile_menu__box ._under').hide();
				$('.mobile_menu__box ._under[data-type=catalog]').show();
				$('.mobile_menu__box ._under_header span').html($('.mobile_menu__box .first_lvl a[data-type=catalog]').text())
				$(".mobile_menu-bottom_text").hide();
			}
		}	else {
			$(this).removeClass('_close');
			$('body').removeClass('_no_overflow');
			$('.mobile_menu__box').animate({
				left: "-200%"
			}, 300);
		}
	});

	$(".mobile_menu__box a").on('click', function(){
		if ($(this).hasClass('is_parent')) {
			$('.mobile_menu__box .two_lvl').show();
			$('._under_header span').html($(this).text());
			$('.mobile_menu__box .two_lvl').animate({
				left: 0
			}, 300);
			$('.mobile_menu__box ._under').hide();
			$('.mobile_menu__box ._under[data-type='+$(this).data('type')+']').show();
			$(".mobile_menu-bottom_text").hide();
			return false;
		}
	});

	$(".mobile_menu__box ._under_header").on('click', function(){
		$('.mobile_menu__box .two_lvl').animate({
			left: "200%"
		}, 300);
		setTimeout(function(){$('.mobile_menu__box .two_lvl').hide();$(".mobile_menu-bottom_text").show();}, 300);
	});

	
	
	if ($(window).width() > 600) {
		$(".catalog_menu").stick_in_parent(
			{parent:'#catalog'}
		);
                $(document.body).trigger("sticky_kit:recalc");
	};
	
	
	// choose sizes
    if ($('#sizes_catalog').length > 0) {
        var sizesCode = $('#sizes_catalog').data('code');
        var sectionUrl = $('#sizes_catalog').data('sectionurl');
        var pageType = $('#sizes_catalog').data('type');
        var startActiveSizes = $('#sizes_catalog a.sizes_catalog__item.active').length;

        if (sectionUrl != undefined && sizesCode != undefined) {
            //chooseSizes();
            $('#sizes_catalog a.sizes_catalog__item').on('click', function(){
                $(this).toggleClass('active');
                chooseSizes();
                return false;
            });
        }

        function chooseSizes() {
            var url = "";

            $('#sizes_catalog a.sizes_catalog__item.active').each(function(){
                if (url == "") url += $.trim($(this).data('size').toLowerCase());
                else url += "-or-" + $.trim($(this).data('size').toLowerCase());
            });
            if (url != "") {
                if (pageType == "selection")
                    $('.sizes_catalog-popup').find('a').attr('href', sectionUrl + "?razmer=" + url);
                else if (pageType == "search")
                    $('.sizes_catalog-popup').find('a').attr('href', sectionUrl + "&razmer=" + url);
                else
                    $('.sizes_catalog-popup').find('a').attr('href', sectionUrl + sizesCode + "-is-" + url + "/");
            }
            else
                $('.sizes_catalog-popup').find('a').attr('href', sectionUrl);

            if ($('#sizes_catalog a.sizes_catalog__item.active').length > 0 || startActiveSizes != 0) {
                $('.sizes_catalog-popup').addClass('active');
            }   else {
                $('.sizes_catalog-popup').removeClass('active');
            }
        }
    }

	
	//PRODUCT SLIDER
	 $('.product_slider_for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: false,
		fade: true,
		infinite: true,
		prevArrow: '<button class="slick-prev icon-angle-left"></button>',
		nextArrow: '<button class="slick-next icon-angle-right"></button>',
		variableWidth: false,
		asNavFor: '.product_slider_nav',
		responsive: [
			{
			  breakpoint: 991,
			  settings: {
				dots: true,
			  }
			}
		]
	});
	$('.product_slider_nav').slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		asNavFor: '.product_slider_for',
		dots: false,
		infinite: true,
		vertical:true,
		prevArrow: '<button class="slick-prev icon-angle-up"></button>',
		nextArrow: '<button class="slick-next icon-angle-down"></button>',
		variableWidth: false,
		focusOnSelect: true
	});
	
	//MODALE QUICK VIEW SLIDER POSITION
	$('#modal_quick_view').on('shown.bs.modal', function () {
	  $('.product_slider_for').slick('setPosition');({
			slidesToShow: 1,
			slidesToScroll: 1,
		});
		$('.product_slider_nav').slick('setPosition');({
			slidesToShow: 5,
			slidesToScroll: 1,
		});
	});
	
	//MOBILE MENU
	$('.mob_close_btn').on('click',function() {
	if ($('body').hasClass('opened_menu')) {
		$('body').removeClass('opened_menu');
	} else {
		$('body').addClass('opened_menu');
		}
	});
	$('.open_main_menu').on('click',function() {
	if ($('body').hasClass('opened_menu')) {
		$('body').removeClass('opened_menu');
	} else {
		$('body').addClass('opened_menu');
		}
	});
	
	//SELECT
	$('.selectpicker').selectpicker({
	});
	
	//MAP BLOCK
	$('.map-container')
	.click(function(){
			$(this).find('iframe').addClass('clicked')})
	.mouseleave(function(){
			$(this).find('iframe').removeClass('clicked')});
			
	//DOUBLE MODAL
	$('#modal_buy_click2').on('hidden.bs.modal', function() {
		$('body').addClass('modal-open');
	});
	
	$('#modal_reserved2').on('hidden.bs.modal', function() {
		$('body').addClass('modal-open');
	});


	



    $(function() {
        $(".dropdown").hover(
            function(){ $(this).addClass('open') },
            function(){ $(this).removeClass('open') }
        );
    });

	
	$("[data-toggle]").click(function() {
		var toggle_el = $(this).data("toggle");
		$(toggle_el).toggleClass("open_sidebar");
	  });

});

/*CHOSE SIZE*/
var chooseSize = function(obj) {
    $(obj).addClass('active').siblings().removeClass('active');
    
    $(document).find('.no-offer-block').hide();
    $(document).find('.reserve-block').hide();
    $(document).find('.showroom-offer-block').hide();
    $(document).find('.buy-offer-block').hide();
        
    if ($(obj).attr("data-show-room")) {
        $(document).find('.showroom-offer-block').show();
    }
	else if ($(obj).hasClass("diss")) {
        $(document).find('.no-offer-block p span').text($(obj).text());
        $(document).find('.no-offer-block a').attr("href", $(obj).attr("data-subscribe-url") );
        $(document).find('.no-offer-block').show();
    }
    else if ($(obj).hasClass("reserved")) {
        //$('.reserve-block  p span').text($(obj).text());
        $(document).find('.reserve-block  a').attr("href", $(obj).attr("data-subscribe-url") );
        $(document).find('.reserve-block ').show();
    }   
    else {
        $(document).find('.buy-offer-block a').attr("href", $(obj).attr("data-buy-url") );
        $(document).find('.buy-offer-block a').attr("data-prod-id", $(obj).attr("data-id") );
        $(document).find('.buy-offer-block a').data("requires-size", "");
        $(document).find('.buy-offer-block').show();
    }
    
    $('.js-size-in-guid').removeClass('active');
    $('.js-size-in-guid[data-id='+$(obj).attr('data-id')+']').trigger('click');
    return false;
};

var showSizeExt = function(size) {
    $(document).find(".tb-size1 tr").removeClass("active");
    $(document).find("#size-row-" + size).addClass("active");
    $(document).find(".size-ext-info").hide();
    $(document).find("#size-ext-" + size).show();
    return false;
};


//Вывод координат любого элемента на странице
function getCoords(elem) {
  // (1)
  var box = elem.getBoundingClientRect();

  var body = document.body;
  var docEl = document.documentElement;

  // (2)
  var scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
  var scrollLeft = window.pageXOffset || docEl.scrollLeft || body.scrollLeft;

  // (3)
  var clientTop = docEl.clientTop || body.clientTop || 0;
  var clientLeft = docEl.clientLeft || body.clientLeft || 0;

  // (4)
  var top = box.top + scrollTop - clientTop;
  var left = box.left + scrollLeft - clientLeft;

  return {
    top: top,
    left: left
  };
}
//var menu = document.getElementById('main_menu');
//var coord_menu = getCoords(menu);

//var w_left_bl = $("#left_menu").width();

//var padding_r_bl = 370 - w_left_bl;
//$("#item_section").css({'padding-left': padding_r_bl});

$(document).ready(function() {

    var curProdLinks = $(document).find(".detail_element_box-sizes_list .chose-sz1 a");

    var wasFindAvailableOffer=false;

    curProdLinks.each(function(){
        if ($(this).attr("data-show-room")=="" && $(this).hasClass('in_stock'))
        {
            wasFindAvailableOffer=true;
            $(this).click();
            return false;
        }
    });

    if (!wasFindAvailableOffer)
    {
        curProdLinks.each(function(){
            if ($(this).hasClass('in_stock'))
            {
                wasFindAvailableOffer=true;
                $(this).click();
                return false;
            }
        });
    }

    if (!wasFindAvailableOffer)
    {
        curProdLinks.first().click();
    }
    
     
     
});



