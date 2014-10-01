jQuery(document).ready(function($) {

	function Slideshow(container, slides, nav) {
		this.imgIndex = 0;
		this.nextImg;
		this.container = container;
		this.nav = nav;
		this.img = this.container.find("img.slide");
		this.slides = slides;
		this.slideHeight = $(this.slides[0]).height();
		this.imgWidth = this.img[0].width;
		this.totalImg = this.img.length;
		this.current = 1;
		this.direction = 1;
	}

	Slideshow.prototype.init = function() {
		var imgCounter = this.totalImg;
		$(this.slides).each( function() {
			var current = $(this);
			current.css("z-index", imgCounter);
			imgCounter--;
		});

		//display nav
		if( $(window).width() > 640 ) {
			this.nav.fadeIn();
		}

		// resize container
		this.container.height(this.slideHeight);

	}
	
	Slideshow.prototype.slide = function() {

		var currentImg = this.slides.eq(this.imgIndex),
				nextImgCss;
		var	reset = { 'z-index' : 0, 'opacity' : 1};
		var currentIndex = this.imgIndex;

		// get next image
	 	if(this.imgIndex + this.direction > (this.totalImg - 1)) {
			this.nextImg = this.slides.eq(0);
		} else if(this.imgIndex + this.direction < 0) {
			this.nextImg = this.slides.eq(this.totalImg - 1);
		} else {
			this.nextImg = this.slides.eq(this.imgIndex + this.direction);
		}

		currentImg.css('zIndex', this.totalImg);
		nextImgCss = {'display' : 'block', 'z-index' : this.totalImg - 1};


		$(this.nextImg).css(nextImgCss);

		currentImg.fadeOut(700, function(){
				currentImg.css(reset);
			}
		);

		if(this.imgIndex + this.direction >= 0 && this.imgIndex + this.direction <= this.totalImg - 1) {
			this.imgIndex += this.direction;
		} else if(this.imgIndex + this.direction < 0) {
			this.imgIndex = this.totalImg - 1;
		} else if(this.imgIndex + this.direction >= this.totalImg - 1) {
			this.imgIndex = 0;
		}		
	}
	
	Slideshow.prototype.setCurrent = function(directionData) {
		if(directionData === 'next') {
			this.direction = 1;
		} else if(directionData === 'prev') {
			this.direction = -1;
		}
		return this.direction;
	}	

	Slideshow.prototype.resizeContainer = function() {
		// resize slideshow wrapper
		//var childHeight = $('div.home-slideshow-img-container').first().height();
		var currentHeight = $(this.slides[0]).height();

		this.container.height(currentHeight);
	}

	// Homepage Slideshow
	$('img').load(function() {
		if($('div#home-slideshow-wrapper').length !== 0) {

			var now, before = new Date(),
					delay = 4501,
					index = 0,
					container = $('div#home-slideshow-wrapper'),
					slides = $('div.home-slideshow-img-container'),
					nav = $('div.slideshow-nav'),
					homepageSlideshow = new Slideshow(container, slides, nav);
			
			homepageSlideshow.init();

			// call worker
			// this will avoid setTimeout to freeze when switching to a new browser window
			homepageSlideshow.worker = new Worker('../../wp-content/themes/PIN/library/js/homepageSlideshow.js');

			homepageSlideshow.worker.postMessage('start');

			homepageSlideshow.worker.addEventListener('message', function(e) {
				homepageSlideshow.slide();
			}, false);
			

			homepageSlideshow.resizeContainer();

			if( $(window).width() < 640 ) {
				slides.addClass('display-all');
				homepageSlideshow.worker.postMessage('stop');
				container.css('height', 'auto');
				nav.hide();
			};

			// slide on click and reset interval
			$('span.arrow-nav').on('click', function() {

				var direction = $(this).data('direction');
				homepageSlideshow.setCurrent(direction);

				homepageSlideshow.worker.postMessage('navigate');

				//homepageSlideshow.worker.addEventListener('message', function(e) {
				//	homepageSlideshow.slide();
				//}, false);

				setTimeout(function() {
					homepageSlideshow.slide();
				}, 100);

			});
			

			$('li.home-slideshow-img-container').eq(0).css('display', 'block');

			// resize container
			$(window).on('resize', function() {
				homepageSlideshow.resizeContainer();

				if( $(window).width() < 640 ) {
					homepageSlideshow.worker.postMessage('stop');
					slides.addClass('display-all');
					container.css('height', 'auto');
					nav.hide();

				} else {
					if(slides.hasClass('display-all')) {
						slides.removeClass('display-all');
						homepageSlideshow.worker.postMessage('start');
						nav.show();
					}
				}
			});

		}
	});

	// Single Project slideshow
	$('img').load(function() {

		if($('div#single-project-slideshow-wrapper').length !== 0) {

			var now, before = new Date(),
					delay = 4501,
					index = 0,
					container = $('div#single-project-slideshow-wrapper'),
					slides = $('div.home-slideshow-img-container'),
					nav = $('div.slideshow-nav'),
					projectSlideshow = new Slideshow(container, slides, nav);

			projectSlideshow.init();

			// call worker
			// this will avoid setTimeout to freeze when switching to a new browser window
			projectSlideshow.worker = new Worker('../../wp-content/themes/PIN/library/js/singleProjectSlideshow.js');

			projectSlideshow.worker.postMessage('start');

			projectSlideshow.worker.addEventListener('message', function(e) {
				projectSlideshow.slide();
			}, false);

			projectSlideshow.resizeContainer();

			if( $(window).width() < 640 ) {
				slides.addClass('display-all');
				projectSlideshow.worker.postMessage('stop');
				container.css('height', 'auto');
				nav.hide();
			};

			// slide on click and reset interval
			$('span.arrow-nav').on('click', function() {

				var direction = $(this).data('direction');
				projectSlideshow.setCurrent(direction);

				projectSlideshow.worker.postMessage('stop');

				//projectSlideshow.worker.addEventListener('message', function(e) {
				//	projectSlideshow.slide();
				//}, false);

				setTimeout(function() {
					projectSlideshow.slide();
				}, 100);

			});

			$('li.home-slideshow-img-container').eq(0).css('display', 'block');

			// resize container
			$(window).on('resize', function() {
				projectSlideshow.resizeContainer();

				if( $(window).width() < 640 ) {
					projectSlideshow.worker.postMessage('stop');
					slides.addClass('display-all');
					container.css('height', 'auto');
					nav.hide();

				} else {
					if(slides.hasClass('display-all')) {
						slides.removeClass('display-all');
						singleProjectSlideshow.worker.postMessage('start');
						nav.show();
					}
				}
			});
		}
	});

	// reveal menu
	$('ul.title-area').on('click', function() {
		var menu = $('ul.top-nav');

		menu.slideToggle();
	});

});