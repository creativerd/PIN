jQuery(document).ready(function($) {
	function Slideshow(container, slides, nav) {
		this.imgIndex = 0;
		this.nextImg;
		this.container = container;
		this.nav = nav;
		this.img = this.container.find("img.slide");
		this.slides = slides;
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


	// new slideshow instance if it's the homepage
	if($('div#home-slideshow-wrapper').length !== 0) {
		var homepageSlideshow = new Slideshow($('div#home-slideshow-wrapper'), $('div.home-slideshow-img-container'), $('div.slideshow-nav'));
		homepageSlideshow.init();
		// slide every x seconds
		var slideInterval = setInterval(function() {
				homepageSlideshow.slide();
			}, 4501);


		// slide on click and reset interval
		$('span.arrow-nav').on('click', function() {
			var direction = $(this).data('direction');

			homepageSlideshow.setCurrent(direction);
			homepageSlideshow.slide();

			clearInterval(slideInterval);

			setTimeout(function() {
				slideInterval = setInterval(function() {
					homepageSlideshow.slide();
				}, 4500);
			}, 100);

		});
		

		$('li.home-slideshow-img-container').eq(0).css('display', 'block');
	}

	// reveal menu
	$('ul.title-area').on('click', function() {
		var menu = $('ul.top-nav');

		menu.slideToggle();

	})

});