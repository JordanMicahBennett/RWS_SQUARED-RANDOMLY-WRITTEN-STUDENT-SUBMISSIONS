//written by jordan
var emAmbienceElement = document.createElement('audio');


$(document).ready(function() 
{
	//establish employme voice welcome element
	var emWelcomeVoiceElement = document.createElement('audio');
	emWelcomeVoiceElement.setAttribute('src', 'data/audios/tas.welcome.voice.ogg');
	emWelcomeVoiceElement.load()
	emWelcomeVoiceElement.addEventListener("load", function() { 
		emWelcomeVoiceElement.play(); 
		$(".duration span").html(emWelcomeVoiceElement.duration);
		$(".filename span").html(emWelcomeVoiceElement.src);
	}, false);

	emWelcomeVoiceElement.play ();

	//establish employme voice welcome element
	var emWelcomeVoiceBlanketElement = document.createElement('audio');
	emWelcomeVoiceBlanketElement.setAttribute('src', 'data/audios/tas.welcome.voice.blanket.ogg');
	emWelcomeVoiceBlanketElement.load()
	emWelcomeVoiceBlanketElement.addEventListener("load", function() { 
		emWelcomeVoiceBlanketElement.play(); 
		$(".duration span").html(emWelcomeVoiceBlanketElement.duration);
		$(".filename span").html(emWelcomeVoiceBlanketElement.src);
	}, false);
	//Note to jordan, the last param means loop.

	emWelcomeVoiceBlanketElement.play ();
	
	
	//establish employme voice welcome element
	emAmbienceElement.setAttribute('src', 'data/audios/tas.ambience.ogg');
	emAmbienceElement.load()
	emAmbienceElement.addEventListener("load", function() { 
		emAmbienceElement.play(); 
		$(".duration span").html(emAmbienceElement.duration);
		$(".filename span").html(emAmbienceElement.src);
	}, false);

	emAmbienceElement.play ();
});



//establish sound player
function playSound ( soundStream )
{
	var soundElement = document.createElement('audio');
	soundElement.setAttribute('src', soundStream);
	soundElement.load()
	soundElement.addEventListener("load", function() { 
		soundElement.play(); 
		$(".duration span").html(soundElement.duration);
		$(".filename span").html(soundElement.src);
	}, false);

	soundElement.play();
}

//establish ambience player controller mechanism
	var emAmbienceRunningEnquiry = false;
	function toggleTrackFlag ()
	{
		emAmbienceRunningEnquiry = emAmbienceRunningEnquiry ? false : !emAmbienceRunningEnquiry ? true : false; //GENIUS CODING BY JORDAN MICAH BENNETT lol
	}
	function toggleAmbience ()
	{
		toggleTrackFlag ();
		if (emAmbienceRunningEnquiry)
			emAmbienceElement.play();
		else
			emAmbienceElement.pause();
	}