(function()
{
	var timeinterval = undefined,
		deadline = undefined,
		clock = undefined,
		daysSpan = undefined,
		daysAmountSpan = undefined,
		hoursSpan = undefined,
		minutesSpan = undefined,
		secondsSpan = undefined,
		isOn = false;
	
	$(document).ready(function()
	{
		clock = $('#clockdiv');
		if (clock.length > 0) {
			daysSpan = clock.find('.days')[0];
			daysAmountSpan = clock.find('.daysamount')[0];
			hoursSpan = clock.find('.hours')[0];
			minutesSpan = clock.find('.minutes')[0];
			secondsSpan = clock.find('.seconds')[0];
			timeinterval = setInterval(updateClock, 1000);
			deadline = new Date(clock.data('stop-year'), clock.data('stop-month'), clock.data('stop-day'));
		}
	});

	function getTimeRemaining() {
	  var t = Date.parse(deadline) - Date.parse(new Date()),
	  	seconds = Math.floor((t / 1000) % 60),
	  	minutes = Math.floor((t / 1000 / 60) % 60),
	  	hours = Math.floor((t / (1000 * 60 * 60)) % 24),
	  	days = Math.floor(t / (1000 * 60 * 60 * 24));
	  
	  return {
	    'total': t,
	    'days': days,
	    'hours': hours,
	    'minutes': minutes,
	    'seconds': seconds
	  };
	}
	
	function updateClock() {
	    var t = getTimeRemaining();
   
	    if(!isOn) {
	    	clock.show();
	    	isOn = true;
	    }

	    daysSpan.innerHTML = t.days;
	    if (t.days == 1) {
	    	daysAmountSpan.innerHTML = 'dzień'; 
	    }
	    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
	    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
	    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
	
	    if (t.total <= 0) {
	      clearInterval(timeinterval);
	    }
	  }
})();