var slideInterval;

self.addEventListener('message', function(e) {	 		

	switch(e.data) {
		case 'start' :
			slideInterval = setInterval(function(){
    		self.postMessage('slide');
 			}, 4501);
   	break;
   	case 'stop' :
   		clearInterval(slideInterval);
		break;
	};
	
}, false);