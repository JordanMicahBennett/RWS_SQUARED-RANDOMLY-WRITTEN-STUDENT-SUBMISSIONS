//author: jordan micah bennett, swen3165 final project, tas 2015

//global vars
var ASSISTANT_HOURS = 0, LECTURER_HOURS = 0;

//top end function to enable all functionality
enableUserTogglingCapability ( );

function enableUserTogglingCapability ( )
{	
	$(document).ready
	(
		function ( ) 
		{
			//set user name in welcome message header
			document.getElementById ('WelcomeHeader').innerHTML = "Welcome to Tas Scheduler, " + getCookieData ('UserName') + " (" + getCookieData ('UserStatus') + ")";
			
			//enable content management
			enableContentManagement ( );
			
			//enable user addition capability
			$( '#AddUserButton' ).click
			(
				function ( )
				{
					generateTasUserAdditionActionResponse ( );
				}
			);
			
			//enable user deletion capability
			$( '#DeleteUserButton' ).click
			(
				function ( )
				{
					generateTasUserDeletionActionResponse ( );
				}
			);
			
			//enable user edit capability
			$( '#EditUserButton' ).click
			(
				function ( )
				{
					generateTasUserEditActionResponse ( );
				}
			);
			
			//enable add slot capability (allows the ability to add physical slots to the time table)
			$( '#AddSlotDataButton' ).click
			(
				function ( )
				{
					generateTasAddSlotDataActionResponse ( );
				}
			);
			//enable user logout
			$( '#LogoutButton' ).click
			(
				function ( )
				{
					generateTasUserLogoutActionResponse ( );
				}
			);
			//enable user admin notification display
			$( '#NotificationsButton' ).click
			(
				function ( )
				{
					generateTasUserAdminNotificationDisplayActionResponse ( );
				}
			);
		}
	);
}


//displays scheduler based on user rights/roles
function enableContentManagement ( )
{
	//alert
	var cookieData = getCookieData ('UserRole');
	alert(cookieData+" mode");
	
	//if system-administrator 
	if ( getCookieData ('UserRole') === 'system-admin' )
	{
		//general help popover for admins
		$('#NotificationsButton').popover({"title":"See all un-accepted assistant/lecturer requests","trigger":"hover","html":true,"placement":"bottom"});
		
		//general help popover for non-admins
		$('#helpme').popover({"title":"1.select a slot. (hover over slot button for instructions) <br><br> 2.enter course details (code,activity..) COLOUR IS OPTIONAL<br><br> 3.click REQUEST button below table. <br><br> 4. you can filter table data by filter button beside REQUEST button and filter key text area below table. The filter key is the name of any course details entered in step 2 above.","trigger":"hover","html":true,"placement":"bottom"});	
	}
	
	//if system-lecturer 
	if ( getCookieData ('UserRole') === 'system-lecturer' )
	{
		//general help popover for non-admins
		$('#NotificationsButton').popover({"title":"See all accepted requests","trigger":"hover","html":true,"placement":"bottom"});
		
		//general help popover for non-admins
		$('#helpme').popover({"title":"1.select a slot. (hover over slot button for instructions) <br><br> 2.enter course details (code,activity..) COLOUR IS OPTIONAL<br><br> 3.click REQUEST button below table. <br><br> 4. you can filter table data by filter button beside REQUEST button and filter key text area below table. The filter key is the name of any course details entered in step 2 above.","trigger":"hover","html":true,"placement":"bottom"});
		
		
		document.getElementById ( 'AddUserButton' ).style.display = 'none';
		document.getElementById ( 'DeleteUserButton' ).style.display = 'none';
		document.getElementById ( 'EditUserButton' ).style.display = 'none';
		document.getElementById ( 'AddSlotDataButton' ).innerHTML = 'request';
		document.getElementById ( 'cinstructor' ).style.display = 'none';
	}
	
	//if system-assistant 
	if ( getCookieData ('UserRole') === 'system-assistant' )
	{
		//general help popover for non-admins
		$('#NotificationsButton').popover({"title":"See all accepted requests","trigger":"hover","html":true,"placement":"bottom"});
		
		//general help popover for non-admins
		$('#helpme').popover({"title":"1.select a slot. (hover over slot button for instructions) <br><br> 2.enter course details (code,activity..) COLOUR IS OPTIONAL<br><br> 3.click REQUEST button below table. <br><br> 4. you can filter table data by filter button beside REQUEST button and filter key text area below table. The filter key is the name of any course details entered in step 2 above.","trigger":"hover","html":true,"placement":"bottom"});
		
		document.getElementById ( 'AddUserButton' ).style.display = 'none';
		document.getElementById ( 'DeleteUserButton' ).style.display = 'none';
		document.getElementById ( 'EditUserButton' ).style.display = 'none';
		document.getElementById ( 'AddSlotDataButton' ).innerHTML = 'request';
		document.getElementById ( 'cinstructor' ).style.display = 'none';
	}
	
	//load notifications
		//load administrator notifications
		loadAdministratorNotificationButtonUi ( );
		//load non administrator notifications
		loadNonAdministratorNotificationButtonUi ( );
		
		
	//perhaps the most crucial, load database data into time table ui.
	//this time table is composed based on preference table.
	//the preference table consists of records, each of which contain slot data either requested by 
	//lecturers and assistants then accepted by admin, or added directly by the admin.
	loadTimeTableUi ( );
	
	
	//load selectables
	loadSelectables ( );
}

function generateTasUserAdditionActionResponse ( )
{
	window.open('http://swentas.2fh.co/data/phps/_php.add.user.php', 'popup','width=512,height=614');
}

function generateTasUserDeletionActionResponse ( )
{
	window.open('http://swentas.2fh.co/data/phps/_php.delete.user.php', 'popup','width=512,height=614');
}

function generateTasUserEditActionResponse ( )
{
	window.open('http://swentas.2fh.co/data/phps/_php.update.user.php', 'popup','width=512,height=614');
}

function generateTasUserLogoutActionResponse ( )
{
	window.open('http://swentas.2fh.co/index.html',  "_self" );
}


function generateTasUserAdminNotificationDisplayActionResponse ( )
{
	window.open('http://swentas.2fh.co/data/phps/_php.admin.notification.display.php', 'popup','width=640,height=680');
}


function generateTasAddSlotDataActionResponse ( )
{
	//add course to database via non-admin users
	if ( ! ( getCookieData ('UserRole') === 'system-admin' ) )
	{
		enableNonAdministratorPreferenceAddability ( );	
		addCourse ( $('#ccode').val(),$('#cactivity').val(),getCookieData ( 'UserName'),$('#cvenue').val(),$('#cslots').val(), $('#color').val() );
	}
	else 
	{
		enableAdministratorPreferenceAddability ( );
		addCourse ( $('#ccode').val(),$('#cactivity').val(),$('#cinstructor').val(),$('#cvenue').val(),$('#cslots').val(), $('#color').val() );
	}
	//add course to ui
	

}

//preferences added with preferenceAcceptanceStatus=false are NOT displayed in the ui at load time.
//instead these are shown to non admin users such as lecturers or assistants, as 'notifications'.
function enableNonAdministratorPreferenceAddability ( )
{
	var preferenceSlotId = '?TAS_PREFRENCE_SLOT_ID='+$('#cslots').val();
	var preferenceInstructorId = '&TAS_PREFRENCE_INSTRUCTOR_ID='+getCookieData ( 'UserName');
	var preferenceVenue = '&TAS_PREFRENCE_VENUE='+$('#cvenue').val();
	var preferenceCourseCode = '&TAS_PREFRENCE_COURSE_CODE='+$('#ccode').val();
	var preferenceActivity = '&TAS_PREFRENCE_SLOT_ACTIVITY='+$('#cactivity').val();
	var preferenceColour = '&TAS_PREFRENCE_SLOT_COLOUR='+$('#color').val();
	var preferenceAcceptanceStatus = '&TAS_PREFRENCE_ACCEPTANCE_STATUS=false';
	
	var preferenceAdditionQueryString = preferenceSlotId + preferenceInstructorId + preferenceVenue + preferenceCourseCode + preferenceActivity + preferenceColour + preferenceAcceptanceStatus;
	
	$.ajax(
	{
		type: 'GET',

		url: 'data/phps/_php.add.preference.php' + preferenceAdditionQueryString,

		success: function () 
		{
			alert ( 'Preference added. Wait for admin Validation');
		}
	});
}

//preferences added with preferenceAcceptanceStatus=true are displayed in the ui at load time.
//instead these are shown to admin users as 'notifications'. The admin may then accept or reject from there.
function enableAdministratorPreferenceAddability ( )
{
	var preferenceSlotId = '?TAS_PREFRENCE_SLOT_ID='+$('#cslots').val();
	var preferenceInstructorId = '&TAS_PREFRENCE_INSTRUCTOR_ID='+$('#cinstructor').val();
	var preferenceVenue = '&TAS_PREFRENCE_VENUE='+$('#cvenue').val();
	var preferenceCourseCode = '&TAS_PREFRENCE_COURSE_CODE='+$('#ccode').val();
	var preferenceActivity = '&TAS_PREFRENCE_SLOT_ACTIVITY='+$('#cactivity').val();
	var preferenceColour = '&TAS_PREFRENCE_SLOT_COLOUR='+$('#color').val();
	var preferenceAcceptanceStatus = '&TAS_PREFRENCE_ACCEPTANCE_STATUS=true';
	
	var preferenceAdditionQueryString = preferenceSlotId + preferenceInstructorId + preferenceVenue + preferenceCourseCode + preferenceActivity + preferenceColour + preferenceAcceptanceStatus;
	
	$.ajax(
	{
		type: 'GET',

		url: 'data/phps/_php.add.preference.php' + preferenceAdditionQueryString,

		success: function () 
		{
			alert ( 'Preference added.');
		}
	});
}

function loadAdministratorNotificationButtonUi ( )
{
	$.ajax(
	{
		type: 'GET',

		url: 'data/phps/_php.preference.admin.display.php',
		
		dataType: 'json',

		success: function (data) 
		{
			if ( getCookieData ('UserRole') === 'system-admin' )
			{
				document.getElementById ( 'NotificationsButton' ).innerHTML = "Notifications (" + data.length + ")";
			}
		}
	});	
}

function loadNonAdministratorNotificationButtonUi ( )
{
	$.ajax(
	{
		type: 'GET',

		url: 'data/phps/_php.preference.non.admin.display.php',
		
		dataType: 'json',

		success: function (data) 
		{
			if ( ! ( getCookieData ('UserRole') === 'system-assistant' ) )
				document.getElementById ( 'NotificationsButton' ).innerHTML = "Notifications (" + data.length + ")";
		}
	});	
}

function loadTimeTableUi ( )
{
	$.ajax(
	{
		type: 'GET',

		url: 'data/phps/_php.preference.accepted.display.php',
		
		dataType: 'json',

		success: function (data) 
		{
			for ( i = 0; i < data.length; i ++ )
				addCourse ( data[i].courseCode, data[i].activity, data[i].instructorId, data[i].venue, data[i].slotId, data[i].colour );	
		}
	});	
}


//loads selectables 
	//accumulates selectables below
	function loadSelectables ( )
	{
		loadSelectableCourses ( );
		loadSelectableInstructors ( );
		loadSelectableRooms ( );
		loadSelectableActivities ( );
	}
	//loads selectable courses from database 
	function loadSelectableCourses ( )
	{
		$.ajax(
		{

			type: 'GET',

			url: 'data/phps/_php.selectable.courses.display.php', 

			dataType: 'json',

			success: function (data) 
			{
				//show user data based on old id
				var tasUserDisplaySelectHtmlElement = document.getElementById ('ccode');
				console.log(data);
				for ( i = 0; i < data.length; i ++ )
				{
					var newOption = document.createElement ( 'option' );
					
					
					var value = data[i].itemName;
					newOption.value = value;
					newOption.innerHTML = value;
					tasUserDisplaySelectHtmlElement.appendChild ( newOption );
				}
			}
		});
	}
	//loads selectable activities from database 
	function loadSelectableActivities ( )
	{
		$.ajax(
		{

			type: 'GET',

			url: 'data/phps/_php.selectable.activities.display.php', 

			dataType: 'json',

			success: function (data) 
			{
				//show user data based on old id
				var tasUserDisplaySelectHtmlElement = document.getElementById ('cactivity');
				console.log(data);
				for ( i = 0; i < data.length; i ++ )
				{
					var newOption = document.createElement ( 'option' );
					
					
					var value = data[i].itemName;
					newOption.value = value;
					newOption.innerHTML = value;
					tasUserDisplaySelectHtmlElement.appendChild ( newOption );
				}
			}
		});
	}
	//loads selectable instructors from database 
	function loadSelectableInstructors ( )
	{
		$.ajax(
		{

			type: 'GET',

			url: 'data/phps/_php.selectable.instructors.display.php', 

			dataType: 'json',

			success: function (data) 
			{
				//show user data based on old id
				var tasUserDisplaySelectHtmlElement = document.getElementById ('cinstructor');
				console.log(data);
				for ( i = 0; i < data.length; i ++ )
				{
					var newOption = document.createElement ( 'option' );
					
					
					var value = data[i].itemName;
					newOption.value = value;
					newOption.innerHTML = value;
					tasUserDisplaySelectHtmlElement.appendChild ( newOption );
				}
			}
		});
	}
	//loads selectable rooms from database 
	function loadSelectableRooms ( )
	{
		$.ajax(
		{

			type: 'GET',

			url: 'data/phps/_php.selectable.rooms.display.php', 

			dataType: 'json',

			success: function (data) 
			{
				//show user data based on old id
				var tasUserDisplaySelectHtmlElement = document.getElementById ('cvenue');
				console.log(data);
				for ( i = 0; i < data.length; i ++ )
				{
					var newOption = document.createElement ( 'option' );
					
					
					var value = data[i].itemName;
					newOption.value = value;
					newOption.innerHTML = value;
					tasUserDisplaySelectHtmlElement.appendChild ( newOption );
				}
			}
		});
	}