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
			<center>
				<div id = "tasAdminNotificationDisplayArea">
					
				</div>
				
				<script>
					enableNotificationDisplay ( );
					
					function enableNotificationDisplay ( )
					{
							$.ajax(
							{

								type: 'GET',

								url: '_php.preference.admin.display.php',
								
								dataType: 'json',
								
								async: false,

								success: function (data) 
								{
									console.log(data);
							
															
									var tasAdminNotificationDisplayArea = document.getElementById ( 'tasAdminNotificationDisplayArea' );
									
									for ( var i = 0, buttonHa, buttonHb; i < data.length; i ++ )
									{
										var table = document.createElement ('table');
											var tableBody = document.createElement ('tbody');
												var tableRowA = document.createElement ('tr');
													var labelTableDataA = document.createElement ('td');
													var labelA = document.createElement ('label');
														labelA.className  = 'form-control';
														labelA.innerHTML = 'SlotName :';
														labelTableDataA.appendChild ( labelA );
														
													var buttonTableDataA = document.createElement ('td');
													var buttonA = document.createElement ('button');
														buttonA.className  = 'form-control';
														buttonA.innerHTML = data[i].slotId;
														buttonTableDataA.appendChild ( buttonA );
														
													tableRowA.appendChild ( labelTableDataA );
													tableRowA.appendChild ( buttonTableDataA );
												tableBody.appendChild ( tableRowA );
												
												var tableRowB = document.createElement ('tr');
													var labelTableDataB = document.createElement ('td');
													var labelB = document.createElement ('label');
														labelB.className  = 'form-control';
														labelB.innerHTML = 'InstructorName :';
														labelTableDataB.appendChild ( labelB );
														
													var buttonTableDataB = document.createElement ('td');
													var buttonB = document.createElement ('button');
														buttonB.className  = 'form-control';
														buttonB.innerHTML = getInstructorNameById ( data[i].instructorId );
														buttonTableDataB.appendChild ( buttonB );
														
													tableRowB.appendChild ( labelTableDataB );
													tableRowB.appendChild ( buttonTableDataB );
												tableBody.appendChild ( tableRowB );
												
												var tableRowC = document.createElement ('tr');
													var labelTableDataC = document.createElement ('td');
													var labelC = document.createElement ('label');
														labelC.className  = 'form-control';
														labelC.innerHTML = 'InstructorId :';
														labelTableDataC.appendChild ( labelC );
														
													var buttonTableDataC = document.createElement ('td');
													var buttonC = document.createElement ('button');
														buttonC.className  = 'form-control';
														buttonC.innerHTML = data[i].instructorId;
														buttonTableDataC.appendChild ( buttonC );
														
													tableRowC.appendChild ( labelTableDataC );
													tableRowC.appendChild ( buttonTableDataC );
												tableBody.appendChild ( tableRowC );
												
												var tableRowD = document.createElement ('tr');
													var labelTableDataD = document.createElement ('td');
													var labelD = document.createElement ('label');
														labelD.className  = 'form-control';
														labelD.innerHTML = 'Venue :';
														labelTableDataD.appendChild ( labelD );
														
													var buttonTableDataD = document.createElement ('td');
													var buttonD = document.createElement ('button');
														buttonD.className  = 'form-control';
														buttonD.innerHTML = data[i].venue;
														buttonTableDataD.appendChild ( buttonD );
														
													tableRowD.appendChild ( labelTableDataD );
													tableRowD.appendChild ( buttonTableDataD );
												tableBody.appendChild ( tableRowD );
												
												
												var tableRowE = document.createElement ('tr');
													var labelTableDataE = document.createElement ('td');
													var labelE = document.createElement ('label');
														labelE.className  = 'form-control';
														labelE.innerHTML = 'CourseCode :';
														labelTableDataE.appendChild ( labelE );
														
													var buttonTableDataE = document.createElement ('td');
													var buttonE = document.createElement ('button');
														buttonE.className  = 'form-control';
														buttonE.innerHTML = data[i].courseCode;
														buttonTableDataE.appendChild ( buttonE );
														
													tableRowE.appendChild ( labelTableDataE );
													tableRowE.appendChild ( buttonTableDataE );
												tableBody.appendChild ( tableRowE );
												
												
												var tableRowF = document.createElement ('tr');
													var labelTableDataF = document.createElement ('td');
													var labelF = document.createElement ('label');
														labelF.className  = 'form-control';
														labelF.innerHTML = 'Activity :';
														labelTableDataF.appendChild ( labelF );
														
													var buttonTableDataF = document.createElement ('td');
													var buttonF = document.createElement ('button');
														buttonF.className  = 'form-control';
														buttonF.innerHTML = data[i].activity;
														buttonTableDataF.appendChild ( buttonF );
														
													tableRowF.appendChild ( labelTableDataF );
													tableRowF.appendChild ( buttonTableDataF );
												tableBody.appendChild ( tableRowF );
												
												
												var tableRowG = document.createElement ('tr');
													var labelTableDataG = document.createElement ('td');
													var labelG = document.createElement ('label');
														labelG.className  = 'form-control';
														labelG.innerHTML = 'AcceptanceStatus :';
														labelTableDataG.appendChild ( labelG );
														
													var buttonTableDataG = document.createElement ('td');
													var buttonG = document.createElement ('button');
														buttonG.className  = 'form-control';
														buttonG.innerHTML = data[i].acceptanceStatus;
														buttonTableDataG.appendChild ( buttonG );
														
													tableRowG.appendChild ( labelTableDataG );
													tableRowG.appendChild ( buttonTableDataG );
												tableBody.appendChild ( tableRowG );
												
												
												var tableRowH = document.createElement ('tr');
													var buttonTableDataHa = document.createElement ('td');
													var buttonHa = document.createElement ('button');
														buttonHa.className  = 'btn btn-default togglebtn active';
														buttonHa.innerHTML = 'accept';
														buttonHa.onclick =  function ( iterator ) 
																			{ 
																				return function (  )
																				{
																					var slotIdQueryString = "?PREFERENCE_ACCEPTANCE_SLOT_ID=" + data[iterator].slotId;
																					var instructorIdQueryString = "&PREFERENCE_ACCEPTANCE_INSTRUCTOR_ID=" + data[iterator].instructorId;
																					var venueQueryString = "&PREFERENCE_ACCEPTANCE_VENUE=" + data[iterator].venue;
																					var courseCodeQueryString = "&PREFERENCE_ACCEPTANCE_COURSE_CODE=" + data[iterator].courseCode;
																					var activityQueryString = "&PREFERENCE_ACCEPTANCE_ACTIVITY=" + data[iterator].activity;
																					var slotColourQueryString = "&PREFERENCE_ACCEPTANCE_SLOT_COLOUR=" + data[iterator].slotColour;
																					
																					var updateQueryString = slotIdQueryString + instructorIdQueryString + venueQueryString + courseCodeQueryString + activityQueryString + slotColourQueryString;
																					
																					$.ajax(
																					{

																						type: 'GET',

																						url: '_php.admin.preference.acceptance.update.php'+updateQueryString,
																						
																						async: false,

																						success: function () 
																						{
																							//tell user of success
																							alert('schedule updated successully');
																							
																							//reload page automatically
																							window.open('http://swentas.2fh.co/data/phps/_php.admin.notification.display.php', '_self');
																						}
																					});
																				};
																			} ( i );
														buttonTableDataHa.appendChild ( buttonHa );
														
													var buttonTableDataHb = document.createElement ('td');
													var buttonHb = document.createElement ('button');
														buttonHb.className  = 'btn btn-default togglebtn active';
														buttonHb.innerHTML = 'reject';
														buttonHb.onclick =  function ( iterator ) 
																			{ 
																				return function (  )
																				{
																					var slotIdQueryString = "?PREFERENCE_REJECT_SLOT_ID=" + data[iterator].slotId;
																					var instructorIdQueryString = "&PREFERENCE_REJECT_INSTRUCTOR_ID=" + data[iterator].instructorId;
																					var venueQueryString = "&PREFERENCE_REJECT_VENUE=" + data[iterator].venue;
																					var courseCodeQueryString = "&PREFERENCE_REJECT_COURSE_CODE=" + data[iterator].courseCode;
																					var activityQueryString = "&PREFERENCE_REJECT_ACTIVITY=" + data[iterator].activity;
																					var slotColourQueryString = "&PREFERENCE_REJECT_SLOT_COLOUR=" + data[iterator].slotColour;
																					
																					var updateQueryString = slotIdQueryString + instructorIdQueryString + venueQueryString + courseCodeQueryString + activityQueryString + slotColourQueryString;
																					
																					$.ajax(
																					{

																						type: 'GET',

																						url: '_php.admin.preference.rejection.update.php'+updateQueryString,
																						
																						async: false,

																						success: function () 
																						{
																							//tell user of success
																							alert('schedule updated successully');
																							
																							//reload page automatically
																							window.open('http://swentas.2fh.co/data/phps/_php.admin.notification.display.php', '_self');
																						}
																					});
																				};
																			} ( i );
														buttonTableDataHb.appendChild ( buttonHb );
														
													tableRowH.appendChild ( buttonTableDataHa );
													tableRowH.appendChild ( buttonTableDataHb );
												tableBody.appendChild ( tableRowH );
												
												var tableBlankRowA = document.createElement ('br');
												tableBody.appendChild ( tableBlankRowA );
												
												var tableBlankRowB = document.createElement ('br');
												tableBody.appendChild ( tableBlankRowB );
												
										table.appendChild ( tableBody );
										tasAdminNotificationDisplayArea.appendChild ( table );
										
									};
								}
							});
					}
					

	
					
					function getInstructorNameById ( inputId )
					{
						var returnValue = "";
						
						setCookieData ( 'TAS_NOTIFICATION_ADMIN_INSTRUCTOR_NAME_RETRIEVAL_ID',  inputId );
						$.ajax(
						{

							type: 'GET',

							url: '_php.admin.notification.instructor.name.display.php',

							dataType: 'json',
							
							async: false,

							success: function (data) 
							{
								//console.log ( data);
								returnValue = data[0].userName;
							}
						});
						
						return returnValue;
					}
				</script>
			</center>
		
	</body>
</html>