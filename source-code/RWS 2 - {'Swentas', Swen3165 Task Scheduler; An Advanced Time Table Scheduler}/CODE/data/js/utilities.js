	
	//utilities
	function setCookieData ( key, value )
	{
		document.cookie = key + "=" + value;
	}
	//get cookie: http://stackoverflow.com/questions/10730362/get-cookie-by-name
	function getCookieData ( name ) 
	{
		var pairs = document.cookie.split("; "),
			count = pairs.length, parts; 
		while ( count-- ) {
			parts = pairs[count].split("=");
			if ( parts[0] === name )
				return parts[1];
		}
		return false;
	}