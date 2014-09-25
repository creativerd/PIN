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
		this.nav.fadeIn();

		// resize container
		this.container.height(this.slideHeight);

	}
	
	Slideshow.prototype.slide = function() {

		var currentImg = this.slides.eq(this.imgIndex);
		this.nextImg = this.slides.eq(this.imgIndex + (1 * this.direction));

	 	if(this.imgIndex + this.direction > (this.totalImg - 1)) {
			this.nextImg = this.slides.eq(0);
		} else if(this.nextImg === -1) {
			this.nextImg = this.slides.eq(this.totalImg - 1);
		} 

		var reset = {
			'z-index' : 0,
			'opacity' : 1,
		};

		currentImg.css('zIndex', this.totalImg);
		this.nextImg.css('zIndex', (this.totalImg - 1));

		this.nextImg.css("display", "block");
		this.nextImg.show();
		currentImg.animate({
			'opacity' : 0
		}, 1400, function(){
				currentImg.css("display", "none");
				currentImg.css(reset);
			}
		);

		if(this.imgIndex < this.totalImg && this.imgIndex >= 0) {
			this.imgIndex += this.direction; 
		} else if(this.imgIndex < 0) {
			this.imgIndex = this.totalImg - 1;
		} else {
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
					homepageSlideshow = new Slideshow($('div#home-slideshow-wrapper'), $('div.home-slideshow-img-container'), $('div.slideshow-nav'));
			
			homepageSlideshow.init();

			//homepageSlideshow.resizeContainer();
			// slide every x seconds
			var slideInterval = setInterval(function() {
					now = new Date();
					var elapsedTime = (now.getTime() - before.getTime());

					if(elapsedTime > delay) {
						homepageSlideshow.slide();
					}

					before = new Date(); 
				}, delay);

			// slide on click and reset interval
			$('span.arrow-nav').on('click', function() {
				var direction = $(this).data('direction');

				homepageSlideshow.setCurrent(direction);
				homepageSlideshow.slide();

				clearInterval(slideInterval);

				setTimeout(function() {
					slideInterval = setInterval(function() {
						homepageSlideshow.slide();
					}, delay);
				}, 100);

			});

			$('li.home-slideshow-img-container').eq(0).css('display', 'block');

			// resize container
			$(window).on('resize', homepageSlideshow.resizeContainer());
		}
	})
	

	// reveal menu
	$('ul.title-area').on('click', function() {
		var menu = $('ul.top-nav');

		menu.slideToggle();
	});

});