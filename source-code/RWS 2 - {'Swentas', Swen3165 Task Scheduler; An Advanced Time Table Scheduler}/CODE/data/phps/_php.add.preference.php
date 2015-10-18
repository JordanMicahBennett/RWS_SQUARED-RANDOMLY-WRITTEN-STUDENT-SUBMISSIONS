		<?php
			session_start(); 
			
				////////////////////////////////////////////////////////////////////////////////////////////////
				//BEGIN SQL CONNECTION PROCESSS
				////////////////////////////////////////////////////////////////////////////////////////////////
					//establish database connection requirements
					$_SESSION [ 'dbHost' ] = 'mysql.2freehosting.com';
					$_SESSION [ 'dbUsername' ] = 'u197334111_tas';
					$_SESSION [ 'dbPassword' ] = 'swentas!';
					$_SESSION [ 'dbName' ] = 'u197334111_tas';;
								
				//establish database connection
					//connection to the database
					$connection = mysqli_connect ( $_SESSION [ 'dbHost' ], $_SESSION [ 'dbUsername' ], $_SESSION [ 'dbPassword' ], $_SESSION [ 'dbName' ] );
					//establish connection verification
					if ( mysqli_connect_errno ( ) )
					{
						//echo "Failed to connect to MySQL: " . mysqli_connect_error ( );
					}
		

				$preferenceSlotId = $_GET [ 'TAS_PREFRENCE_SLOT_ID' ];
				$preferenceInstructorId = $_GET [ 'TAS_PREFRENCE_INSTRUCTOR_ID' ];
				$preferenceVenue = $_GET [ 'TAS_PREFRENCE_VENUE' ];
				$preferenceCourseCode = $_GET [ 'TAS_PREFRENCE_COURSE_CODE' ];
				$preferenceActivity = $_GET [ 'TAS_PREFRENCE_SLOT_ACTIVITY' ];
				$preferenceColour = $_GET [ 'TAS_PREFRENCE_SLOT_COLOUR' ];
				$preferenceAcceptanceStatus = $_GET [ 'TAS_PREFRENCE_ACCEPTANCE_STATUS' ];
				
				//manipulate database based on new user details 
				$connection -> query ("insert into Preferences (SlotId, InstructorId, Venue, CourseCode, Activity, SlotColour, AcceptanceStatus) values ('$preferenceSlotId', '$preferenceInstructorId', '$preferenceVenue', '$preferenceCourseCode', '$preferenceActivity', '$preferenceColour', '$preferenceAcceptanceStatus')");
	
				////////////////////////////////////////////////////////////////////////////////////////////////
				//BEGIN SQL CONNECTION TERMINATION PROCESS
				////////////////////////////////////////////////////////////////////////////////////////////////
				//establish connection termination
				mysqli_close ( $connection );
				////////////////////////////////////////////////////////////////////////////////////////////////
				//END SQL CONNECTION TERMINATION PROCESS
				////////////////////////////////////////////////////////////////////////////////////////////////
		?>