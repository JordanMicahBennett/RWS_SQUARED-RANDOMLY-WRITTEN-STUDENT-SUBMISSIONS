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

	
		<form action = '_php.delete.user.completion.php' method = 'post' enctype='multipart/form-data' >
			<center>
				<table>
					<tbody>
						<tr>	
							<td> <label id = 'srmgActionTypeId' class = 'MediumMetroFontFace' > Tas user deletion suite </label>
						</tr>	
						
						<tr>
							<td> <label class ='form-control' >Users</label>  </td>
							<td>
								<select class='form-control' id = "TAS_USER_DELETION_ACTION_USER_DISPLAY" name='TAS_USER_DELETION_ACTION_USER_DISPLAY'>
								</select>
							</td>
						</tr>	
						<script> <!-- important! this must occur after 'TAS_USER_DELETION_ACTION_USER_DISPLAY' select definition in body -->
							enableUserDisplay ( );

							function enableUserDisplay ( )
							{
								$.ajax(
								{

									type: 'GET',

									url: '_php.delete.user.data.display.php',

									dataType: 'json',

									success: function (data) 
									{
										//show user data based on old id
										var tasUserDisplaySelectHtmlElement = document.getElementById ('TAS_USER_DELETION_ACTION_USER_DISPLAY');
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
										<tr>
							<td> <label class ='form-control' >User id?</label>  </td>
							<td> <input class = 'styleZero' name = 'TAS_USER_DELETION_ACTION_ID' type = 'text'/> </td>
						</tr>			
						
												
						<tr>	
							<td> <input class = 'btn btn-default form-control' name = 'tasUserDeletionActionAttemptButtonName' type = 'submit' value = 'go'/> </td>
						</tr>	
					</tbody>
				</table>
			</center>
		</form>
	</body>
</html>