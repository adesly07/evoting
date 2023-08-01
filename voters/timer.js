// JavaScript Document

function cookie_time(value) {
	
	var date=new Date();
	date.setTime(date.getTime()+(60*1000));
	var expires = "; expires="+date.toGMTString();
	document.cookie = "test_time="+value+expires+"; path=/";
}

function gc(cookie_name)
{
	var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );
	if ( results )
		return ( unescape ( results[2] ) );
	else
		return null;
}

function onTimer(id)
{
	
	var elapse = 1000; // this is interval - 1000 millisecond, 1000 Millisecond = 1 second...
	var start = document.getElementById("my_Count_Down_Timer").innerHTML; // start time
	var finish = "00:00:00"; // finished time
	var timer = null;
	
	// stop it when the function runs over 5000 millisecond
	if (start == finish)
	{
		timer = null;
		parent.location = "begin.php?timeout&id="+id;
		// At this juncture End the test.
		return;
	}

	var hms = new String(start).split(":");
	var s = new Number(hms[2]);
	var m = new Number(hms[1]);
	var h = new Number(hms[0]);

	s -= 1;
	if (s < 0)
	{
		s = 59;
		m -= 1;

		if (m < 0)
		{
			m = 59;
			h -= 1;
		}
	}

	var ss = s < 10 ? ("0" + s) : s;
	var sm = m < 10 ? ("0" + m) : m;
	var sh = h < 10 ? ("0" + h) : h;

	start = sh + ":" + sm + ":" + ss;
	document.getElementById("my_Count_Down_Timer").innerHTML = start;
	cookie_time(start);

	timer = window.setTimeout("onTimer("+id+")",elapse);
}
