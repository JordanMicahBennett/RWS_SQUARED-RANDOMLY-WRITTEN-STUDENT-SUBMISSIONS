<!-- author jordan micah bennett, swen3165 final project, tas 2015 -->
<html id = 'tasBackgroundArea'>
	<head>
		<link rel='stylesheet' href='../css/bootstrap.css' />
		
		<script type = 'text/javascript'>
			document.getElementById('tasBackgroundArea').style.backgroundColor = '#eeeeee';
		</script>
	</head>
	
	
	<body>
		<form action = '_php.add.user.completion.php' method = 'post' enctype='multipart/form-data' >
			<center>
				<table>
					<tbody>
						<tr>	
							<td> <label id = 'srmgActionTypeId' class = 'MediumMetroFontFace' > Tas user addtion suite </label>
						</tr>	

						<tr>
							<td> <label class ='form-control' >User id?</label>  </td>
							<td> <input class = 'styleZero' name = 'TAS_USER_ADD_ACTION_ID' type = 'text'/> </td>
						</tr>			
						
						<tr>
							<td> <label class ='form-control' >User Name?</label>  </td>
							<td> <textarea name = 'TAS_USER_ADD_ACTION_NAME' type = 'text' value=""> </textarea> </td>
						</tr>	
						
						<tr>
							<td> <label class ='form-control' >User Maximum Hours?</label>  </td>
							<td> <textarea name = 'TAS_USER_ADD_ACTION_MAX_HOURS' type = 'text' value=""> </textarea> </td>
						</tr>	
						
						<br>
						
						<tr>
							<td> <label class ='form-control' >User Status?</label>  </td>
							<td>
								<select name='TAS_USER_ADD_ACTION_STATUS'>
									<option value='full-time'>full-time</option>
									<option value='part-time'>part-time</option>
								</select>
							</td>
						</tr>	
						
						<tr>
							<td> <label class ='form-control' >User Password??</label>  </td>
							<td> <textarea name = 'TAS_USER_ADD_ACTION_PASSWORD' type = 'text' value=""> </textarea> </td>
						</tr>	
						
						<tr>
							<td> <label class ='form-control' >User Role?</label>  </td>
							<td>
								<select name='TAS_USER_ADD_ACTION_ROLE'>
									<option value='system-admin'>system-admin</option>
									<option value='system-lecturer'>system-lecturer</option>
									<option value='system-assistant'>system-assistant</option>	
								</select>
							</td>
						</tr>
						
												
						<tr>	
							<td> <input class = 'btn btn-default form-control' name = 'tasUserAdditionActionAttemptButtonName' type = 'submit' value = 'go'/> </td>
						</tr>	
					</tbody>
				</table>
			</center>
		</form>
	</body>
</html>