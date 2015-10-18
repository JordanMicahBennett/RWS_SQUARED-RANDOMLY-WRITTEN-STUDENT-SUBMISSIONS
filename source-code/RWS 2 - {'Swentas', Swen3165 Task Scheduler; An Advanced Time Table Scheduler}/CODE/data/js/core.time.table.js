//Initial Author: 
//Additional Author: Jordan Micah Bennett [modified to accommodate complex filtering function. See _notes]
//Additional Notes: Relocated this beyond initial scheduler.html via here, thereafter generating global addCourse function access.

	 courses={};

function slotexpand(slotnames){
	slotnames=slotnames.replace(/[\s]/ig,"").toUpperCase().replace("LX","Lx");
	var finalslots=[];
	var slotlist=slotnames.split(/[;,]/ig);
	for (i in slotlist){
		var currslot=slotlist[i];
		switch (currslot){
			case "1":
			case "2":
			case "3":
			case "4":
				finalslots=finalslots.concat([currslot+"A",currslot+"B",currslot+"C"]);
				break;
			case "5":
			case "6":
			case "7":
			case "8":
			case "9":
			case "10":
			case "11":
			case "12":
			case "13":
			case "14":
			case "15":
				finalslots=finalslots.concat([currslot+"A",currslot+"B"]);
				break;				
			default:
				finalslots.push(currslot);
		}
	}
	return finalslots;
}
 function addCourse(courseCode,activity,instructor,venue,slots,color){
	 console.log(color);
	 eslots=slotexpand(slots);
	 
	 slotid=courseCode+"-"+eslots.join("-");
	 slotid="i-"+slotid.replace(/[^A-Za-z0-9\-\_\:\.]/ig,'-');
	courses[slotid]={"name":courseCode,"activity":activity, "instructor":instructor, "venue":venue, "slots":eslots, "color" : color};
		

	for(aslot in eslots){
		if($('.slot-'+eslots[aslot]).length<=0){
			alert("Slot "+eslots[aslot]+" does not exist");
			return false;
		}
	}
	//I suspect that this block generates the physical courses list
	 for (aslot in eslots){
		 eslots[aslot]=new String(eslots[aslot]);
		if($('.slot-'+eslots[aslot]+'.used').length>0||$('.slot-clash-'+eslots[aslot]+'.used').length>0){
			 var arr=$('.slot-'+eslots[aslot]+'.used,.slot-clash-'+eslots[aslot]+'.used').map(function(){return $(this).find('.slot-name').html()+" ("+$(this).find('.course-code').html()+")"}).get()
			 var arr2=$('.slot-'+eslots[aslot]+'.used,.slot-clash-'+eslots[aslot]+'.used').map(function(){return $(this).find('.course-code').html()}).get()
			$('.course-code').each(function(){if(arr2.indexOf(this.innerHTML)!=-1){$(this).parents(".used").addClass('softDanger')}})
			$('.slot-'+eslots[aslot]+'.used,.slot-clash-'+eslots[aslot]+'.used').addClass('dangerRem').removeClass("softDanger")
			eslots[aslot].nooverwrite=!confirm("Slot clash of "+eslots[aslot]+" with "+arr.join(", ")+", overwrite other course or cancel this one?");
			$('.used').removeClass('dangerRem').removeClass('softDanger')
			if(!eslots[aslot].nooverwrite){
				$('.slot-'+eslots[aslot]+'.used,.slot-clash-'+eslots[aslot]+'.used').each(function(){$('.rmslot[data-slotid='+$(this).data('slotid')+']').click()});
			}else{
				delete courses[slotid];
				return true;
			}
		}
	 }
	 //I suspect that this block generates the physical table components based on details entry (slot population)
	 for (aslot in eslots){
		 console.log(eslots[aslot]+" "+eslots[aslot].overwrite)
		if(!eslots[aslot].nooverwrite){
			showSlot(eslots[aslot],true,color);
			var $slot=$('.slot-'+eslots[aslot]);
			$slot.find('.course-code').html(courseCode);
			$slot.find('.course-venue').html(venue);
			$slot.find('.course-activity').html(activity);
			$slot.find('.course-instructor').html(instructor);
			$slot.data('slotid',slotid)
		}
	 }
	 $('<tr id="list-'+slotid+'"><td><button type="button" class="btn btn-default btn-xs list-'+slotid+' " id="color-button-'+slotid+'"><span class="glyphicon glyphicon-pencil"></span></button></td><td id="list-name-'+slotid+'">'+courseCode+'</td><td><button class="rmslot  btn-xs btn btn btn-danger" data-slotid="'+slotid+'">x</button></td></tr>').appendTo('#listb')
	$('#color-button-' + slotid).attr('style', 'background-color:'+color+' !important')
	.colorpicker({format: "rgba", color:color}).on('changeColor', function(ev){
		var rgbc = ev.color.toRGB();
		var rgbc_str = "rgba("+rgbc.r + "," + rgbc.g + "," + rgbc.b + ",0.36)";
		courses[slotid].color = rgbc_str;
		for (aslot in eslots){
			if(!eslots[aslot].nooverwrite){
				$('.slot-'+eslots[aslot]).attr('style', 'background-color:'+rgbc_str+' !important');
			}
		 }
		 updatePerma()
		 $('#color-button-' + slotid).attr('style', 'background-color:'+rgbc_str+' !important');
	});
	 updatePerma()
	 $("#inputrow input:not(#color)").val("");
	 // 	$("#color").val("rgba(255, 255, 0, 0.36)"); // the previous used default color
 }
 

function updatePerma(){
	$('#perma').attr('href','?timetable='+encodeURIComponent(btoa(JSON.stringify(courses)))+"&slots="+$('#snametog').hasClass('active'));
	return $('#perma').attr('href');
}
 function showSlot(slotname,use,color){
	 $('.slot-'+slotname).show();
	 if(use){$('.slot-'+slotname).attr('style', 'background-color:'+color+' !important')
                               .addClass('used');}
	 $('.clashbuddy-'+slotname).show();
	 $('.slot-clash-'+slotname).hide();
 }
 function hideSlot(slotname,unuse){

	 if(unuse){$('.slot-'+slotname).removeClass('used')
			                           .attr('style', 'background-color:white !important');}

	 if($('.clashbuddy-'+slotname+".used").length==0&&$('.clashbuddy-'+slotname).length!=0){
		$('.slot-'+slotname).hide();
		$('.clashbuddy-'+slotname).hide();
		$('.slot-clash-'+slotname).show();	 		 
	 }

 }
 
//[_notes]I don't suspect any thing here, because I wrote it.
//This segment is used to essentially determine
//whether elements in any slot matches the 'filterkey' value from filter input text beside add button, 
//showing only those slots that meet said match requirement.
//.find() is used instead of .children(), for greater than single level evaluation.
 function filterByKey ( )
 {
	//derive user filter key
	var userFilterkeyValue = $( '#filterkey' ).val ( );
	
	if ( $ ('#filterer').html() == 'Filter' ) //if filter mode is off (the button will say 'Filter' when mode is off)
	{	
		//attempt filter process....
		var rowCardinality = 12;
		
		for ( var rc = 0; rc < rowCardinality; rc++ )
		{
			var elements = $( ".slot-"+rc ).find ('div' );
			
			for ( var i = 0; i < elements.length; i++ )
			{
				var element = elements.eq ( i );
				var childNodes = element [0].children;
				var code = childNodes [0];
				var venue = childNodes [1];
				var activity = childNodes [2];
				var instructor = childNodes [3]; 
				
				//essential!!!! the loop will only evaluate the first non-empty slot, even if a non-empty slot elements exists some slots away. To repair this, I ensure that the loop only evaluates non-empty lots, (by ensuring that slot elements are neither null nor undefined
				if 
				(
					( ! ( code === undefined || code === null ) )
					||
					( ! ( venue === undefined || venue === null ) )
					||
					( ! ( activity === undefined || activity === null ) )
					||
					( ! ( instructor === undefined || instructor === null ) )
				)
				{
					//console.log ( code.innerText ); //used for logging tests, can be removed
					if 
					(
						( code.innerText === userFilterkeyValue )
						||
						( venue.innerText === userFilterkeyValue )
						||
						( activity.innerText === userFilterkeyValue )
						||
						( instructor.innerText === userFilterkeyValue )
					)
					{
						//do nothing to the slots I have found TO MATCH '=== userFilterkeyValue' conditions 
					}
					else
					{
						//hide the slots I have found TO NOT MATCH '=== userFilterkeyValue' conditions 
						code.hidden = true;
						venue.hidden = true;
						activity.hidden = true;
						instructor.hidden = true;
						
						//console.log(childNodes);
						
						//tell user that filter mode is on ... the button now gives option to revert to default with text 'Remove filter'
						$( '#filterer' ).html( 'Remove filter' );
					}
				}
			}
		}
	}
	else //show all slot elements, since filtering is being removed
	{
		//attempt filter process....
		var rowCardinality = 12;
	
		for ( var rc = 0; rc < rowCardinality; rc++ )
		{
			var elements = $( ".slot-"+rc ).find ('div' );
			
			for ( var i = 0; i < elements.length; i++ )
			{
				var element = elements.eq ( i );
				var childNodes = element [0].children;
				var code = childNodes [0];
				var venue = childNodes [1];
				var activity = childNodes [2];
				var instructor = childNodes [3]; 
				
				//essential!!!! the loop will only evaluate the first non-empty slot, even if a non-empty slot elements exists some slots away. To repair this, I ensure that the loop only evaluates non-empty lots, (by ensuring that slot elements are neither null nor undefined
				if 
				(
					( ! ( code === undefined || code === null ) )
					||
					( ! ( venue === undefined || venue === null ) )
					||
					( ! ( activity === undefined || activity === null ) )
					||
					( ! ( instructor === undefined || instructor === null ) )
				)
				{
					//console.log ( code.innerText ); //used for logging tests, can be removed
					code.hidden = false;
					venue.hidden = false;
					activity.hidden = false;
					instructor.hidden = false;
					$( '#filterer' ).html( 'Filter' );
				}
			}
		}
	}
}
 
 function getJsonFromUrl() {
	 //From http://stackoverflow.com/a/8486188/1198729, by user Jan Turon
  var query = location.search.substr(1);
  var data = query.split("&");
  var result = {};
  for(var i=0; i<data.length; i++) {
    var item = data[i].split("=");
    result[item[0]] = item[1];
  }
  return result;
}

function printable(){
	history.pushState({},"",updatePerma())
	if(confirm("Remove colors?")){
		$('.used').css('background-color','white')
	}
	$('body').html($('.maintbl').parent().html())
}

function validateICS()
{
	$('#icsForm').html(''); //clean
	$('.maintbl').find('td').each(function(){
	if($(this).hasClass("used"))
	{
		var slot = $(this).find('.slot-name').text();
		var course = $(this).find('.course-code').text();
		var venue = $(this).find('.course-venue').text();
		var activity = $(this).find('.course-activity').text();
		var instructor = $(this).find('.course-instructor').text();
		$('<input type = "hidden" name = "slot[]" value = "'+slot+'" />').appendTo($('#icsForm'));
		$('<input type = "hidden" name = "course[]" value = "'+course+'" />').appendTo($('#icsForm'));
		$('<input type = "hidden" name = "venue[]" value = "'+venue+'" />').appendTo($('#icsForm'));
		$('<input type = "hidden" name = "activity[]" value = "'+activity+'" />').appendTo($('#icsForm'));
		$('<input type = "hidden" name = "instructor[]" value = "'+instructor+'" />').appendTo($('#icsForm'));
	}
	});
	$('#icsForm').submit();
}
