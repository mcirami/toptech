jQuery(document).ready(function($){

	var localDev = true;

	if(localDev == true) {
		loadReload();
	}
	
	$(".fancybox").fancybox({
		maxWidth    : 800,
        maxHeight    : 570,
        fitToView    : false,
        width        : '70%',
        height        : '70%',
        autoSize    : false,
        closeClick    : false,
        openEffect    : 'none',
        closeEffect    : 'none'
	});
	
	var i = 0;
	$(window).load(function() {
    	$('.flexslider').flexslider({
	    	animation: "slide",
		    direction: "horizontal",
		    animationSpeed: 600,
		    slideshowSpeed: 7000,
		    useCSS: false,
		    touch: false,
		    animationLoop: true,
		    controlNav: false,
		    directionNav: false,
			startAt: 0,
			initDelay: 0,
			directionNav: true,
			prevText: '',
			nextText: '',
			//controlsContainer: '.home_slider .container',
    	});
	});
	
	$('#gform_4 .gform_fields li').each(function() {
		$(this).find('label').css('display', 'none');
		var label = $(this).find('label').text().replace('*','').replace(':', '');
		$(this).find('input, textarea').attr('placeholder', label);
	});
	
	$("#js-mobile_menu ul").addClass('mm-list');
	
	$("#js-mobile_menu").mmenu({
        // options
        classes: "mm-ismenu",
        position: "right",
    }, {
     	// configuration
    });
    
    tabby.init();
    
    //Quicksand
    var $data = $('.product_grid');
	var $productData = $data.clone();
	
	$('.filter > a').click(function() {
		$('.filter > a').removeClass('active');
		
		var productCategory = $(this).attr('data-type');
		quickSandFilter(productCategory, 700);
		
		$(this).addClass('active');
	});
	
	$('.mobile_filter select').change(function(){
		var productCategory = $(this).children(':selected').attr('data-type');
		quickSandFilter(productCategory, 700);
	});
	
	function quickSandFilter(productCategory, animationSpeed) {
		var $filter;
		
		if (productCategory === 'all') {
			$filter = $productData.find('.product');
		} else {
			$filter = $productData.find('.product[data-type~=' + productCategory + ']');
		}
		
		$data.quicksand($filter, {
			useScaling: false,
			duration: animationSpeed,
			easing: 'easeInOutQuad',
			adjustHeight: true
		});
	}

	try {
		if(typeof filter !== undefined) {
			quickSandFilter(filter, 0);
		}
	} catch(e) {
		//console.log(e);
	}
});