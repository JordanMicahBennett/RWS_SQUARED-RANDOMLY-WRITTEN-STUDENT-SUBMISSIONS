<!-- author jordan micah bennett, swen3165 final project, tas 2015 -->
<html id = 'tasBackgroundArea'>
	<head>
		<link rel='stylesheet' href='../css/bootstrap.css' />
		
		<script type = 'text/javascript'>
			document.getElementById('tasBackgroundArea').style.backgroundColor = '#eeeeee';
		</script>
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/utilities.js"></script>
	</head>
	

	
	<body>
	<script>
		function enableUserDisplayInFields ( )
		{
			setCookieData('OLD_USER_ID', document.getElementById ('TAS_USER_UPDATE_ACTION_OLD_ID').value);
			
			event.preventDefault ( );

				$.ajax(
				{

					type: 'GET',

					url: '_php.update.user.data.display.php',

					dataType: 'json',

					success: function (data) 
					{
						console.log(data);
						var isUserValid = false;
						
						//show user data based on old id
						document.getElementById ('TAS_USER_UPDATE_ACTION_NAME').innerHTML = data[0].userName;
						document.getElementById ('TAS_USER_UPDATE_ACTION_STATUS').value = data[0].userStatus;
						document.getElementById ('TAS_USER_UPDATE_ACTION_MAX_HOURS').innerHTML = data[0].userMaximumHours;
						document.getElementById ('TAS_USER_UPDATE_ACTION_PASSWORD').innerHTML = data[0].userPassword;
						document.getElementById ('TAS_USER_UPDATE_ACTION_ROLE').value = data[0].userRole;
					}
				});
		}
		
		function enableUserUpdate ( )
		{
			setCookieData('OLD_USER_ID', document.getElementById ('TAS_USER_UPDATE_ACTION_OLD_ID').value);
			if ( document.getElementById ('TAS_USER_UPDATE_ACTION_NEW_ID').value === "" )
				setCookieData('NEW_USER_ID', document.getElementById ('TAS_USER_UPDATE_ACTION_OLD_ID').value);
			else
				setCookieData('NEW_USER_ID', document.getElementById ('TAS_USER_UPDATE_ACTION_NEW_ID').value);
			setCookieData('NEW_USER_NAME', document.getElementById ('TAS_USER_UPDATE_ACTION_NAME').value);
			setCookieData('NEW_USER_STATUS', document.getElementById ('TAS_USER_UPDATE_ACTION_STATUS').value);
			setCookieData('NEW_USER_PASSWORD', document.getElementById ('TAS_USER_UPDATE_ACTION_PASSWORD').value);
			setCookieData('NEW_USER_ROLE', document.getElementById ('TAS_USER_UPDATE_ACTION_ROLE').value);
			setCookieData('NEW_USER_MAX_HOURS', document.getElementById ('TAS_USER_UPDATE_ACTION_MAX_HOURS').value);
			
			event.preventDefault ( );

				$.ajax(
				{

					type: 'POST',

					url: '_php.update.user.completion.php',

					success: function () 
					{
						var isUserValid = false;

						alert('user successfully updated');
					}
				});
		}
	</script>
	


						
		<button class = 'btn btn-default form-control' id = "tasUserEditActionAttemptShowUserDataButtonName" name = 'tasUserEditActionAttemptShowUserDataButtonName' onclick='enableUserDisplayInFields();'> show user data @ old id</button>
		
			<center>
				<table>
					<tbody>
						<tr>
							<td> <label class ='form-control' >Users</label>  </td>
							<td>
								<select class='form-control' id = "TAS_USER_UPDATE_ACTION_USER_DISPLAY" name='TAS_USER_UPDATE_ACTION_USER_DISPLAY'>
								</select>
							</td>
						</tr>
		<script> <!-- important! this must occur after 'TAS_USER_UPDATE_ACTION_USER_DISPLAY' select definition in body -->
			enableUserDisplay ( );

			function enableUserDisplay ( )
			{
				$.ajax(
				{

					type: 'GET',

					url: '_php.delete.user.data.display.php', //this is fine to use. To edit user we need only see his/her id and name, as a prior to showing all his/her data.

					dataType: 'json',

					success: function (data) 
					{
						//show user data based on old id
						var tasUserDisplaySelectHtmlElement = document.getElementById ('TAS_USER_UPDATE_ACTION_USER_DISPLAY');
						console.log(data);
						for ( i = 0; i < data.length; i ++ )
						{
							var newOption = document.createElement ( 'option' );
							
							
							var id = data[i].userId, name = data[i].userName;
							newOption.value = id;
							newOption.innerHTML = "id="+id + ",name=" + name;
							tasUserDisplaySelectHtmlElement.appendChild ( newOption );
						}
					}
				});
			}
		</script>
		
						</tr>	
							<td> <label id = 'srmgActionTypeId' class = 'MediumMetroFontFace' > Tas user edit suite </label>
						</tr>	

						<tr>
							<td> <label class ='form-control' >Old user id?</label>  </td>
							<td> <input class = 'styleZero' id = "TAS_USER_UPDATE_ACTION_OLD_ID" name = 'TAS_USER_UPDATE_ACTION_OLD_ID' type = 'text'/> </td>
						</tr>

						<tr>
							<td> <label class ='form-control' >New user id?</label>  </td>
							<td> <input class = 'styleZero' id = "TAS_USER_UPDATE_ACTION_NEW_ID" name = 'TAS_USER_UPDATE_ACTION_NEW_ID' type = 'text'/> </td>
						</tr>									
						
						<tr>
							<td> <label class ='form-control' >User Name?</label>  </td>
							<td> <textarea id = "TAS_USER_UPDATE_ACTION_NAME" name = 'TAS_USER_UPDATE_ACTION_NAME' type = 'text' value=""> </textarea> </td>
						</tr>	
						
						<tr>
							<td> <label class ='form-control' >User Status?</label>  </td>
							<td>
								<select id = "TAS_USER_UPDATE_ACTION_STATUS" name='TAS_USER_UPDATE_ACTION_STATUS'>
									<option value='full-time'>full-time</option>
									<option value='part-time'>part-time</option>
								</select>
							</td>
						</tr>	
						
						<tr>
							<td> <label class ='form-control' >User Maximum Hours?</label>  </td>
							<td> <textarea id = "TAS_USER_UPDATE_ACTION_MAX_HOURS" name = 'TAS_USER_UPDATE_ACTION_MAX_HOURS' type = 'text' value=""> </textarea> </td>
						</tr>	
						
						<tr>
							<td> <label class ='form-control' >User Password??</label>  </td>
							<td> <textarea id = "TAS_USER_UPDATE_ACTION_PASSWORD" name = 'TAS_USER_UPDATE_ACTION_PASSWORD' type = 'text' value=""> </textarea> </td>
						</tr>	
						
						<tr>
							<td> <label class ='form-control' >User Role?</label>  </td>
							<td>
								<select id = "TAS_USER_UPDATE_ACTION_ROLE" name='TAS_USER_UPDATE_ACTION_ROLE'>
									<option value='system-admin'>system-admin</option>
									<option value='system-lecturer'>system-lecturer</option>
									<option value='system-assistant'>system-assistant</option>	
								</select>
							</td>
						</tr>
												
						<tr>	
							<td> <button class = 'btn btn-default form-control' name = 'tasUserEditActionAttemptButtonName' onclick='enableUserUpdate();'> go </button> </td>
						</tr>	
					</tbody>
				</table>
			</center>
		
	</body>
</html>