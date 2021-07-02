$(document).ready(function() {

	preLoaded = false;
	logoBuzzed = false;


// Preloader ########################################

	function preloader(srcs, callback) {
   		var img;
		var remaining = srcs.length;
		for (var i = 0; i < srcs.length; i++) {
   			img = new Image();
   			img.onload = function() {
				--remaining;
				if (remaining <= 0) {
					callback();
				}
			};
			img.src = srcs[i];
		}
	}
	var imageSrcs = [
			"/images/ingolstadt-webdesign.png",
			"/images/werbeagentur-ingolstadt/werbeagentur-ingolstadt.png",
			"/images/werbeagentur-ingolstadt/webdesign-ingolstadt.png",
			"/images/werbeagentur-ingolstadt/printwerbung-ingolstadt.png",
			"/images/werbeagentur-ingolstadt/werbung-ingolstadt.png",
			"/images/werbeagentur-ingolstadt/design-ingolstadt.png",
			"/images/werbeagentur-ingolstadt/websites-ingolstadt.png",
			"/images/werbeagentur-ingolstadt/homepages-ingolstadt.png",
			"/images/werbeagentur-ingolstadt/webdesign-agentur-ingolstadt.png",
			"/content/de/bdg-grafikdesign-ingolstadt.jpg",
			"/content/de/ihk-mediengestalter-ingolstadt.jpg"
	];
	preloader(imageSrcs, loader);



(function($) {
	var imgList = [];
	$.extend({
		preload: function(imgArr, option) {
			var setting = $.extend({
				init: function(loaded, total) {},
				loaded: function(img, loaded, total) {},
				loaded_all: function(loaded, total) {}
			}, option);
			var total = imgArr.length;
			var loaded = 0;
			
			setting.init(0, total);
			for(var i in imgArr) {
				imgList.push($("<img />")
					.attr("src", imgArr[i])
					.load(function() {
						loaded++;
						setting.loaded(this, loaded, total);
						if(loaded == total) {
							setting.loaded_all(loaded, total);
						}
					})
				);
			}
		}
	});
})(jQuery);


function loader() {

	$('#preloader').delay(500).fadeOut('slow');

	setTimeout(function() {
			$("#logo").fadeIn("slow");
		setTimeout(function() {$("#logo5").css("opacity", "1");}, 500);
		setTimeout(function() {$("#logo1").css("opacity", "1");}, 600);
		setTimeout(function() {$("#logo6").css("opacity", "1");}, 700);
		setTimeout(function() {$("#logo3").css("opacity", "1");}, 800);
		setTimeout(function() {$("#logo7").css("opacity", "1");}, 900);
		setTimeout(function() {$("#logo2").css("opacity", "1");}, 1000);
		setTimeout(function() {$("#logo4").css("opacity", "1");}, 1100);
		setTimeout(function() {$("#claim").fadeIn("slow");}, 1000);
		setTimeout(function() {$("#bdg-ihk").fadeIn("slow");}, 750);
		setTimeout(function() {$("#video-container").fadeIn(500);}, 1000);
		setTimeout(function() {logoBuzz();}, 1700 );
		logoBuzzed = true;
	}, 1000);



		setTimeout(function() {
			$.preload([
	// Base - FERTIG
	"https://www.beckett.de/images/agentur-ingolstadt.png",
	"https://www.beckett.de/images/branding-bayern.png",
	"https://www.beckett.de/images/ingolstadt-webdesign.png",
	"https://www.beckett.de/images/ingolstadt-werbeagentur.png",
	"https://www.beckett.de/images/ingolstadt-werbung.png",
	"https://www.beckett.de/images/webdesign-bayern.png",
	"https://www.beckett.de/images/webdesign-ingolstadt.png",
	"https://www.beckett.de/images/werbeagentur-bayern.png",
	"https://www.beckett.de/images/werbeagentur-ingolstadt.png",
	"https://www.beckett.de/images/werbeagentur.png",
	"https://www.beckett.de/images/werbung-bayern.png",

	// Werbung
	"https://www.beckett.de/images/grafikdesign/glass1.png",
	"https://www.beckett.de/images/grafikdesign/glass2.png",
	"https://www.beckett.de/images/grafikdesign/angel-icon.png",
	"https://www.beckett.de/images/grafikdesign/devil-icon.png",

	// Agentur - FERTIG
	"https://www.beckett.de/images/agentur/werbeagentur-ingolstadt.png",
	"https://www.beckett.de/images/agentur/printwerbung-ingolstadt.gif",
	"https://www.beckett.de/images/agentur/webdesign-ingolstadt.gif",
	"https://www.beckett.de/images/agentur/werbeagentur-ingolstadt.gif",
	"https://www.beckett.de/images/agentur/webdesign-ingolstadt.png",
	"https://www.beckett.de/images/agentur/responsive-webdesign.png",
	"https://www.beckett.de/images/agentur/webdesign-agentur.png",
	"https://www.beckett.de/images/agentur/agentur-head.png",
	"https://www.beckett.de/images/agentur/xray.jpg",
	"https://www.beckett.de/images/agentur/xray.png",
	"https://www.beckett.de/images/agentur/butterfly-body.png",
	"https://www.beckett.de/images/agentur/clock-hours.png",
	"https://www.beckett.de/images/agentur/clock-minutes.png",
	"https://www.beckett.de/images/agentur/clock-seconds.png",

	// Stats
	"https://www.beckett.de/images/werbeagentur/werbeagentur-ingolstadt.png",

	// Design
	"https://www.beckett.de/images/webdesign/bulb.png",
	"https://www.beckett.de/images/webdesign/mint-head.png",
	"https://www.beckett.de/images/webdesign/mint-body.jpg",
	"https://www.beckett.de/images/webdesign/mint-shadow.png",
	"https://www.beckett.de/images/webdesign/rays-left.png",
	"https://www.beckett.de/images/webdesign/rays-right.png",

	// Kunden
//	"https://www.beckett.de/images/kunden/bg-lab-floor.jpg",
//	"https://www.beckett.de/images/kunden/bubble.png",
//	"https://www.beckett.de/images/kunden/chemistry-1.png",
//	"https://www.beckett.de/images/kunden/chemistry-2.png",
//	"https://www.beckett.de/images/kunden/design-werbeagentur-ingolstadt.png",
//	"https://www.beckett.de/images/kunden/instruments.png",

	// Testimonials - FERTIG
//	"https://www.beckett.de/images/testimonials/coffee.jpg",
//	"https://www.beckett.de/images/testimonials/coffee.png",
//	"https://www.beckett.de/images/testimonials/danke-head.png",
//	"https://www.beckett.de/images/testimonials/danke-foot.png",
//	"https://www.beckett.de/images/testimonials/werbeagentur-ingolstadt.png",
//	"https://www.beckett.de/images/testimonials/design-last.png",
//	"https://www.beckett.de/images/testimonials/design-next.png",
//	"https://www.beckett.de/images/testimonials/responsive-webdesign.png",
//	"https://www.beckett.de/images/testimonials/planets-shadow.png",
//	"https://www.beckett.de/images/testimonials/werbeagentur-saturn.png",
//	"https://www.beckett.de/images/testimonials/design-open.png",
//	"https://www.beckett.de/images/testimonials/design-close.png",
//	"https://www.beckett.de/images/testimonials/corporate-design.png",

	// Kontakt / Impressum
//	"https://www.beckett.de/images/kontakt/kontakt-head.png",
	"https://www.beckett.de/images/impressum/footer-header.png"
			], {
			init: function(loaded, total) {
				$("#loadingtext").html("<p>Loading...</p>");
			},
			loaded: function(img, loaded, total) {
				var loader = ((loaded/total)*250)-250;
				var prozent = Math.round(loaded/total*100);
				$("#loadingtext").html("<p>"+prozent+"<span>%</span></p>");
				$("#loadingbar").css({"background-position" : loader+"px 70px"});
			},
			loaded_all: function(loaded, total) {
				$("#loadingtext").delay(0).fadeOut("slow");
//				$("#loadedtext").delay(500).fadeIn("slow");

				setTimeout(function() {
					setTimeout(function() {$("#sprachen").fadeIn("slow");}, 0);
					setTimeout(function() {$(".downlink").fadeIn("slow");}, 0);
					setTimeout(function() {$("#loader").fadeOut("slow");}, 0);
					setTimeout(function() {$("#intronav").fadeIn(1000);}, 0);
				
					setTimeout(function() {$("#intro1 a").show().shuffleLetters();},0);
					setTimeout(function() {$("#intro2 a").show().shuffleLetters();},300);
					setTimeout(function() {$("#intro3 a").show().shuffleLetters();},600);
					setTimeout(function() {$("#intro4 a").show().shuffleLetters();},900);
					setTimeout(function() {$("#intro5 a").show().shuffleLetters();},1200);
					setTimeout(function() {$("html,body").animate({scrollTop: 0}, 100);}, 1200);
					setTimeout(function() {$("#intro").css({"position" : "relative"});}, 1000);
					setTimeout(function() {$('body').addClass('navlaunch');},1500);
					setTimeout(function() {$("#nav-symbol, #nav-dots ul").show();},2000);
				}, 0);
			}
		});
	}, 1500);
};



// ########################################




// Scrolled


// Load at top

	$("html,body").animate({scrollTop: 0}, 100);



// Browser-Höhe ermitteln

	function getBrowserHeight() {
		windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
		sectionBorder = 30;
		jQuery("#werbeagentur, #testimonials").css("height", windowHeight);
		jQuery("#werbung").css("height", windowHeight+sectionBorder);
		jQuery("#hell, #hell-bg").css("height", (windowHeight/2)+sectionBorder);
	}



// Detect IE (All versions) and Mobile

	function checkBrowser() {
		ms_ie = false;
		mobile = false;

	    var ua = window.navigator.userAgent;
    	var msie = ua.indexOf('MSIE ');
		var trident = ua.indexOf('Trident/');
    	var edge = ua.indexOf('Edge/');

	    if (msie > -1 || trident > -1 || edge > -1) {
    	    ms_ie = true;
    	}

		var isiPhone = navigator.userAgent.toLowerCase().indexOf("iphone");
		var isiPad = navigator.userAgent.toLowerCase().indexOf("ipad");
		var isiPod = navigator.userAgent.toLowerCase().indexOf("ipod");
		var isAndroid = /android/i.test(navigator.userAgent.toLowerCase());
		var isBlackberry = navigator.userAgent.toLowerCase().indexOf("BlackBerry");
		var isOpera = /Opera/i.test(navigator.userAgent.toLowerCase());
		var isIE = navigator.userAgent.toLowerCase().indexOf("IEMobile");
 
		if(isiPhone > -1 || isiPad > -1 || isiPod > -1 || isAndroid || isBlackberry > -1 || isOpera || isIE > -1){
			mobile = true;
		}

	    if (mobile) {
    	    $('body').addClass('mobile');
    	}
	}

	checkBrowser();



// Logo Buzz

	function logoBuzz() {
		var logoC = $('#logo-clear');
		var logoB = $('#logo-blur');
		var sound = document.getElementById("logo-sound");

//		sound.play();
		setTimeout(function() {$(logoC).hide();}, 0);
		setTimeout(function() {$(logoB).show();}, 0);
		setTimeout(function() {$(logoB).css("left", "-30px");}, 30);
		setTimeout(function() {$(logoB).css("left", "-20px");}, 60);
		setTimeout(function() {$(logoB).css("left", "-35px");}, 90);
		setTimeout(function() {$(logoB).hide();}, 120);
		setTimeout(function() {$(logoC).show();}, 120);

		setTimeout(function() {$(logoC).hide();}, 200);
		setTimeout(function() {$(logoB).show();}, 200);
		setTimeout(function() {$(logoB).css("left", "-20px");}, 230);
		setTimeout(function() {
			$(logoB).css({
				'-webkit-transform' : 'rotate(-3deg)',
				'-moz-transform'    : 'rotate(-3deg)',
				'-ms-transform'     : 'rotate(-3deg)',
				'-o-transform'      : 'rotate(-3deg)',
				'transform'         : 'rotate(-3deg)'
			});
		}, 230);
		setTimeout(function() {$(logoB).hide();}, 250);
		setTimeout(function() {$(logoC).show();}, 250);

		setTimeout(function() {$(logoC).hide();}, 300);
		setTimeout(function() {$(logoB).show();}, 300);
		setTimeout(function() {$(logoB).css("left", "-35px");}, 330);
			setTimeout(function() {
			$(logoB).css({
				'-webkit-transform' : 'rotate(3deg)',
				'-moz-transform'    : 'rotate(3deg)',
				'-ms-transform'     : 'rotate(3deg)',
				'-o-transform'      : 'rotate(3deg)',
				'transform'         : 'rotate(3deg)'
			});
		}, 360);
		setTimeout(function() {$(logoB).css("left", "-20px");}, 390);
		setTimeout(function() {$(logoB).css("left", "-35px");}, 420);
		setTimeout(function() {$(logoB).hide();}, 450);
		setTimeout(function() {$(logoC).show();}, 450);

		preLoaded = true;
	}



// Logo Buzz Scroll Control

	$(window).scroll(function() {
	 	if($(this).scrollTop() < 200 && !logoBuzzed) {
	 		$('body').addClass('navlaunch');
	 		$('#nav-home').hide();
			setTimeout(function() {logoBuzz();}, 500 );
			logoBuzzed = true;
		} else if($(this).scrollTop() > 200) {
			$('body').removeClass('navlaunch');
			$('#nav-home').show();
			logoBuzzed = false;
		}
	});



// Video Control

	if (!mobile) {
		var video = document.getElementById("video");
		video.pause();
		clearTimeout($.data(this, 'scrollTimer'));
		$.data(this, 'scrollTimer', setTimeout(function() {
			if($(this).scrollTop() < windowHeight-50) {
				if (video.paused) {
					video.play();
				}
			} else if($(this).scrollTop() > windowHeight-50) {
				video.pause();
			}
	    }, 250));
	}



// Bubbles

	var bubbles = $('fn').BubbleEngine({
		particleSizeMin:            0,
		particleSizeMax:            30,
		particleSourceX:            $(window).width()/2-15,
		particleSourceY:            520,
		particleDirection:          'center',
		particleAnimationDuration:  4000,
		particleAnimationVariance:  200,
		particleScatteringX:        150,
		particleScatteringY:        200,
		gravity:                    -100
	});
	bubbles.addBubbles(15);



// Chem Symbols

	var ChemTo = false;
	function changeChemSymbols() {

		var i = chemArray.shift();
		chemArray.push(i);
		chemWord = 0-(i*250);

		$(".chem-symbol").clearQueue();
		setTimeout(function() {
			$("#chem-1 .chem-symbol").fadeOut("slow", function() {});
			$("#chem-2 .chem-symbol").delay(100).fadeOut("slow");
			$("#chem-3 .chem-symbol").delay(200).fadeOut("slow");
			$("#chem-4 .chem-symbol").delay(300).fadeOut("slow");
			$("#chem-5 .chem-symbol").delay(400).fadeOut("slow", function () {

				$('#chem-1 .chem-symbol').css({'background-position': '0px ' + chemWord + 'px'});
				$('#chem-2 .chem-symbol').css({'background-position': '-130px '+ chemWord + 'px'});
				$('#chem-3 .chem-symbol').css({'background-position': '-350px ' + chemWord + 'px'});
				$('#chem-4 .chem-symbol').css({'background-position': '-449px ' + chemWord + 'px'});
				$('#chem-5 .chem-symbol').css({'background-position': '-579px ' + chemWord + 'px'});

				setTimeout( function() {
					$("#chem-1 .chem-symbol").fadeIn("slow");
					$("#chem-2 .chem-symbol").delay(100).fadeIn("slow");
					$("#chem-3 .chem-symbol").delay(200).fadeIn("slow");
					$("#chem-4 .chem-symbol").delay(300).fadeIn("slow");
					$("#chem-5 .chem-symbol").delay(400).fadeIn("slow");
				},200);

				clearTimeout(ChemTo);
				if(kundenBG.hasClass('inview')) {
					ChemTo = setTimeout( function() {
						changeChemSymbols();
					}, 5000);	
				}
			});
		}, 30);
	}

	// Random ChemSymb beim Page-Entry durch Random Array von 0-8 (9x Variationen)
	var chemArray = _.shuffle([0,1,2,3,4,5,6,7,8]);
	changeChemSymbols();



// Hide all animations

	$(document).find(".anibox").hide();



// X-Ray Positioning

	xray = 300;

	jQuery("#agentur-links li").mouseenter(function(e) {
		e.stopPropagation();
		if ( $( this ).hasClass( "hirn" ) ) {
			xray = 180;
		} else if ( $( this ).hasClass( "herz" ) ) {
			xray = 420;
		} else if ( $( this ).hasClass( "bauch" ) ) {
			xray = 550;
		} else {
			xray = 300;
		}
		var t = jQuery('#agentur').scrollTop();
		$('#agentur .anibox').clearQueue().animate({'top': t + xray});
		$('#agentur #organs').clearQueue().animate({'top': t - xray });
	});




// Uhr-Funktionen

	var m2,h2;
	var runClock = function() {
		var hours = new Date().getHours();
		var mins = new Date().getMinutes();
		var seconds = new Date().getSeconds();
		
		var sdegree = seconds * 6;
		var srotate = "translateZ(-0.01px) scale(1) rotate(" + sdegree + "deg)";
		$(".seconds").css({"-ms-transform" : srotate, "-webkit-transform" : srotate, "-moz-transform" : srotate, "-o-transform" : srotate, "transform" : srotate});

		if(h2 != hours) {
			var hdegree = hours * 30 + (mins / 2);
			var hrotate = "translateZ(-0.01px) scale(1) rotate(" + hdegree + "deg)";
			$(".hours").css({"-ms-transform" : hrotate, "-webkit-transform" : hrotate, "-moz-transform" : hrotate, "-o-transform" : hrotate, "transform" : hrotate});			
		}
	
		if(m2 != mins) {
			var mdegree = mins * 6;
			var mrotate = "translateZ(-0.01px) scale(1) rotate(" + mdegree + "deg)";
			$(".minutes").css({"-ms-transform" : mrotate , "-webkit-transform" : mrotate, "-moz-transform" : mrotate, "-o-transform" : mrotate, "transform" : mrotate});
		}
		h2 = hours;
		m2 = mins;
		setTimeout( function() {
			if (jQuery("#agentur").hasClass('inview')) {
				runClock();
			}
		}, 1000 );
	};




// Formular

	jQuery("#kontakt-form input").on("change", function(e) {
 		e.preventDefault();
 		/*form = jQuery("#kontakt-form");
 		form.valid();*/
 	});

	jQuery("#send-form").on("click" , function(e) {
		e.preventDefault();
		tmp_form = jQuery("#kontakt-form");
		if(tmp_form.valid()) {
			action 	 = tmp_form.attr('action');
			formData = tmp_form.serializeArray();
			jQuery.post( action, formData, function(data) {
				if(data.status == "OK") {
					tmp_form.hide();
					jQuery("#kontaktformular #thank-you").fadeIn();
				}
			}, "json" );
		} else {
			return false;
		}
	}); 



// Toplink

	jQuery('a.toplink').click(function(e){
		e.preventDefault();
		jQuery("html, body").animate({ scrollTop: 0 }, 900);
	});




// One Page
	$("a.nav-item").click( function() {
		id = $(this).attr("href").split("#");
		id = id[1];
		slide = $("#"+id).offset();
		$('html,body').animate({scrollTop: slide.top}, {queue: false, duration: 1000 , easing: 'easeOutCubic'});
		return false;
	});




// Toggle Agentur

	$('.agenturlink').on('click', function() {
		var id = $(this).attr('id');
		var actualFlyout = $('.agentur_'+id);

		if(id) {
			if(actualFlyout.hasClass('opened') ) {
				actualFlyout.toggleClass('opened').slideUp(350);
    	            $(".agenturlead").toggleClass('opened').toggle(500);
           	} else {
				if($(".agentur_text.opened").length > 0) {
					$(".agentur_text.opened").toggleClass('opened').slideUp(350, function() {}); 
				}
			actualFlyout.toggleClass('opened').toggle(500);
			}

			if (!$(".agentur_text").hasClass('opened') ) {
				$(".agenturlead").toggleClass('opened').toggle(500);
			}
		}
	});



// Toggle Design
	$('.designlink').on('click', function() {
		var id = $(this).attr('id');
		var actualFlyout = $('.design_'+id);

		if(id) {
			if(actualFlyout.hasClass('opened') ) {
				actualFlyout.toggleClass('opened').slideUp(350);
    	            $(".designlead").toggleClass('opened').toggle(500);
           	} else {
				if($(".design_text.opened").length > 0) {
					$(".design_text.opened").toggleClass('opened').slideUp(350, function() {}); 
				}
			actualFlyout.toggleClass('opened').toggle(500);
			}

			if (!$(".design_text").hasClass('opened') ) {
				$(".designlead").toggleClass('opened').toggle(500);
			}
		}
	});




// Toggle Datenschutz

	jQuery('.datenschutz').on('click', function() {
		var datenschutzFlyout = jQuery('#datenschutz');
		if( $(this).hasClass('opened') ) {
			datenschutzFlyout.slideUp(350);
			$(this).removeClass('opened');
       	} else {
			datenschutzFlyout.slideDown(350); 
			$(this).addClass('opened');
		}
	});




// Counters
var runCounter = function() {

	$('.stats span').text('0');

	var heute = new Date();
	var monat = heute.getMonth();
	var jahr = heute.getFullYear();
	var counterTime = 3000;

	var countEnd1 = jahr-1997;
	var countEnd2 = ((jahr-(1997-1))*24)+(monat*2);
	var countEnd3 = countEnd2*3.5;
	var countEnd4 = 15;

	$({countNum: $('#counter1 span').text()}).animate({countNum: countEnd1}, {
	  duration: counterTime,
	  easing:'linear',
	  step: function() {
	    $('#counter1 span').text(Math.floor(this.countNum));
	  },
	  complete: function() {
	    $('#counter1 span').text(this.countNum);
	  }

	});

	$({countNum: $('#counter2 span').text()}).animate({countNum: countEnd2}, {
	  duration: counterTime,
	  easing:'linear',
	  step: function() {
	    $('#counter2 span').text(Math.floor(this.countNum));

	  },
	  complete: function() {
	    $('#counter2 span').text(this.countNum);
	  }

	});

	$({countNum: $('#counter3 span').text()}).animate({countNum: countEnd3}, {
	  duration: counterTime,
	  easing:'linear',
	  step: function() {
	    $('#counter3 span').text(Math.floor(this.countNum));

	  },
	  complete: function() {
	    $('#counter3 span').text(this.countNum);
	  }

	});

	$({countNum: $('#counter4 span').text()}).animate({countNum: countEnd4}, {
	  duration: counterTime,
	  easing:'linear',
	  step: function() {
	    $('#counter4 span').text(Math.floor(this.countNum));

	  },
	  complete: function() {
	    $('#counter4 span').text(this.countNum);
	  }

	});
};



// Coffee

$(document).ready(function() {
	try {
		$('#ripple').ripples({
			resolution: 128,
			dropRadius: 50, //px
			perturbance: 0.07,
			interactive: false
		});
	}
	catch (e) {
		$('.error').show().text(e);
	}


	$(".testimonials-link").on('click', function() {
		runRipple();
	});

});

var runRipple = function() {
	// Automatic drops
		var $el = $('#ripple');
		var x = Math.random() * $el.outerWidth();
		var y = Math.random() * $el.outerHeight();
		var dropRadius = 50;
		var strength = 0.07 + Math.random() * 0.07;
		$el.ripples('drop', x, y, dropRadius, strength);
};




// Toggle Form

	$('.toggleform').on('click', function() {
		var actualFlyout = $(".flyoutform");
		if( actualFlyout.hasClass('opened') ) {
			actualFlyout.toggleClass('opened').slideUp(350);
   	            $(".toggleformlead").toggleClass('opened').toggle(500);
          	} else {
			if($(".toggleformtext.opened").length > 0) {
				$(".toggleformtext.opened").toggleClass('opened').slideUp(350, function() {}); 
			}
		actualFlyout.toggleClass('opened').toggle(500);
		}
	});



	// Selectors vordefinieren
	var $window = $(window);

	var werbungBG = $('#werbung');
	var agenturBG = $('#agentur');
	var werbeagenturBG = $('#werbeagentur');
	var designBG = $('#design');
	var testimonialsBG = $('#testimonials');
	var kundenBG = $('#kunden');
	var kontaktBG = $('#kontakt');

//	var windowHeight = $window.height(); //get the height of the window




// CSS-Klasse "inview" anwenden

	$('.section').bind('inview', function (event, isInView) {
		var el = $(this);
		if (isInView === true) {
			$(this).addClass("inview");
			el.find(".fx").show();
			el.find(".anibox").show();
			// $(this).css({'visibility': 'visible'});

		} else {
			$(this).removeClass("inview");
			el.find(".fx").hide();
			el.find(".anibox").hide();
			// $(this).css({'visibility': 'hidden'});
		}
	});


	var inAgenturView = false;
	agenturBG.on('inview', function(event, isInView) {
	  if (isInView) {
	  	setTimeout( function() {$("#organs").fadeIn(1000);
	  	$("#heart").addClass('animate');
	  	$(".cog").addClass('animate');
	  	$(".butterfly-wing").addClass('animate');
	  	runClock();
	  },1000);
	  } else {
	  	$("#heart").removeClass('animate');
	  	$(".cog").removeClass('animate');
	  	$(".butterfly-wing").removeClass('animate');
	  	setTimeout( function() {$("#organs").hide();},200);
	  }
	});


	var snowIsFalling = false;
	werbeagenturBG.on('inview', function(event, isInView) {
	  if (isInView) {
	  	
  		if(snowIsFalling === false) {
  			runCounter();
			snowfall();
  		}
		snowIsFalling = true;
	  } else {
	  	if(snowIsFalling === true) {
	    	stopSnowfall();
	    	snowIsFalling = false;
	  	}
	  }
	});


	var inTestimonialsView = false;
	testimonialsBG.on('inview', function(event, isInView) {
		if(isInView) {
			$(".planet, .pball, .planet-shadow").addClass('animate');
		}
		else {
			$(".planet, .pball, .planet-shadow").removeClass('animate');
		}
		if(isInView && !inTestimonialsView) {
			runRipple();
			inTestimonialsView = true;
		}
		else {
			inTestimonialsView = false;
		}
	});


	var inKundenView = false;
	kundenBG.on('inview', function(event, isInView) {
	  if (isInView && !inKundenView) {
		// Aus- und Einblenden weitere Wörter beim Bereich-Entry schleifend durch den Array
		inKundenView = true;
		changeChemSymbols();
	  } else {
	  	inKundenView = false;
	  }
	});


	var inKontaktView = false;
	kontaktBG.on('inview', function(event, isInView) {
	  if (isInView && !inKontaktView) {
	  	document.getElementById('virtualcube_0').virtualcube.setAutorotate(1);
	  	inKundenView = true;
	  } else {
	  	document.getElementById('virtualcube_0').virtualcube.setAutorotate(0);
	  	inKundenView = false;
	  }
	});

	
	var inDesignView = false;
	designBG.on('inview', function(event, isInView) {
	  if (isInView && !inDesignView) {
	  	
	  	inKundenView = true;
	  } else {
	  	var menu = jQuery('.doors2');
		if (menu.hasClass('in')) {
			setTimeout(function (){
				menu.css('z-index', '-1');
			}, 600); // how long do you want the delay to be? 	
			menu.removeClass('in');
		}
	  	inKundenView = false;
	  }
	});




// Cube Setup

	setTimeout(function() {
		document.getElementById('virtualcube_0').virtualcube.scramble();
	}, 400);
	
	jQuery('#cube').mouseenter(function() {
  		document.getElementById('virtualcube_0').virtualcube.setAutorotate(0);
	}).mouseleave (function() {
		document.getElementById('virtualcube_0').virtualcube.setAutorotate(1);
	});




	function newPos(x, pos, adjuster, inertia, offset){
		return x + "% " + ((-(pos - adjuster) * inertia) + offset)  + "px";
	}

	function newTop(pos, adjuster, inertia, offset){
		return ((-(pos - adjuster) * inertia) + offset)  + "px";
	}

	function fixTop(pos, adjuster, inertia, offset){
		return 0-((-(pos - adjuster) * inertia) + offset)  + "px";
	}

	function newSkewLeft(pos, adjuster, inertia, offset){
		return "skewY(" + ((-(pos - adjuster) * inertia) + offset)  + "deg)";
	}

	function newSkewRight(pos, adjuster, inertia, offset){
		return "skewY(" + (0-((-(pos - adjuster) * inertia) + offset))  + "deg)";
	}


	function Move(){
		var pos = $window.scrollTop();

		if (werbungBG.hasClass('inview')) {
			$('#glass1').css({'backgroundPosition': newPos(0, pos, (windowHeight*1)+0, -0.6, 0)});
		}

		if (agenturBG.hasClass('inview')) {
			$('#agentur .anibox').css({'top': newTop(pos, (windowHeight*2)+0+sectionBorder, -0.7, xray)});
			$('#agentur #organs').css({'top': fixTop(pos, (windowHeight*2)+0+sectionBorder, -0.7, xray)});
		}

		if (werbeagenturBG.hasClass('inview')) {
			werbeagenturBG.css({'backgroundPosition': newPos(50, pos, (windowHeight*2)+1000+sectionBorder, 0.3, -400)});
		}

		if (designBG.hasClass('inview')) {
			$('#design #mint').css({'top': newTop(pos, (windowHeight*3)+1000+sectionBorder, 0.7, 400)});
			if ( ((windowHeight*3)+1000)-pos < 650 && pos-((windowHeight*3)+1000+sectionBorder) < 650 ) {
				$('#design #rays1').css({'top': newTop(pos, (windowHeight*3)+1000+sectionBorder, 0.1, -100), 'transform': newSkewLeft(pos, (windowHeight*3)+1000+sectionBorder, -0.1, 0)});
				$('#design #rays2').css({'top': newTop(pos, (windowHeight*3)+1000+sectionBorder, 0.1, -100), 'transform': newSkewRight(pos, (windowHeight*3)+1000+sectionBorder, -0.1, 0)});
			}
		}

		if (kundenBG.hasClass('inview')) {
		 	$('#chem-1').css({'top': newTop(pos, (windowHeight*3)+2000+sectionBorder, 0.7, 230)});
			$('#chem-2').css({'top': newTop(pos, (windowHeight*3)+2000+sectionBorder, -1.0, 200)});
			$('#chem-3').css({'top': newTop(pos, (windowHeight*3)+2000+sectionBorder, -0.5, 250)});
			$('#chem-4').css({'top': newTop(pos, (windowHeight*3)+2000+sectionBorder, 0.5, 280)});
			$('#chem-5').css({'top': newTop(pos, (windowHeight*3)+2000+sectionBorder, 1.5, 220)});
		}

		$('#pixels').html("Position: " + pos);
		$('#browserh').html("B.Height: " + windowHeight);

	}



	// User-Interaktion
	getBrowserHeight();
	

	jQuery(window).on('resize', function(){
		Move();
		getBrowserHeight();
	});		
	
	$window.bind('scroll', function(){
		Move();
	});
	
});