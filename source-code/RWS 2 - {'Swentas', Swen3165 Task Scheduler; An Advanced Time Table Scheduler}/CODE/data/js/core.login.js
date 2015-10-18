//author: jordan micah bennett, swen3165 final project, tas 2015


//globals
var USER_SIGN_IN_ID = "", USER_SIGN_IN_PASSWORD = "";

enableUserTogglingCapability ( );

function enableUserTogglingCapability ( )
{	
	$(document).ready
	(
		function ( ) 
		{
			$( '#LoginAreaFormComponentTwo' ).click
			(
				function ( )
				{
					enableUserLogin ( );
				}
			);
			$( '#LogoutButton' ).click
			(
				function ( )
				{
					enableUserLogout ( );
				}
			);
		}
	);
}
	
//login user
	function enableUserLogin ( )
	{
		USER_SIGN_IN_ID = document.getElementById ( 'LoginAreaFormComponentZero' ).value;
		USER_SIGN_IN_PASSWORD = document.getElementById ( 'LoginAreaFormComponentOne' ).value;
		
		
		var userSignInIdQuery = '?TAS_SIGN_IN_USER_ID_GET_VALUE='+USER_SIGN_IN_ID;
		var userSignInPasswordQuery = '&TAS_SIGN_IN_USER_PASSWORD_GET_VALUE='+USER_SIGN_IN_PASSWORD;
		
		var signInQueryString = userSignInIdQuery + userSignInPasswordQuery;
		
		event.preventDefault ( );

			$.ajax(
			{

				type: 'GET',

				url: 'data/phps/_php.user.validation.php'+signInQueryString,

				dataType: 'json',

				success: function (data) 
				{
					console.log(data);
					var isUserValid = false;
					
					if ( ( USER_SIGN_IN_ID == data[0].userId ) && ( USER_SIGN_IN_PASSWORD == data[0].userPassword ) ) 
					{
						isUserValid = true;
						hasUserLoggedIn = true;
						
						setCookieData ( 'UserName', data[0].userName );
						setCookieData ( 'UserRole', data[0].userRole );
						setCookieData ( 'UserId', data[0].userId );
						setCookieData ( 'UserStatus', data[0].userStatus );
						
						window.open ( 'scheduler.html', "_self" );
					}

					if ( ( USER_SIGN_IN_ID != data[0].userId ) || ( USER_SIGN_IN_PASSWORD != data[0].userPassword ) ) 
						alert ( 'invalid login details!' );
				}
			});
	}
	
	function enableUserLogout ( )
	{
		alert('logout');
	}
	
