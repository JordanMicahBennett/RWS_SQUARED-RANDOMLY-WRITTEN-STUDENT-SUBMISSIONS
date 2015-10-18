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

				//WE MUST UPDATE BY ALL PREFERENCE FIELDS, SINCE ANY MAY BE UNIQUE.
				$slotId = $_GET [ 'PREFERENCE_REJECTION_SLOT_ID' ];
				$instructorId = $_GET['PREFERENCE_REJECTION_INSTRUCTOR_ID'];
				$venue = $_GET [ 'PREFERENCE_REJECTION_VENUE' ];
				$courseCode = $_GET [ 'PREFERENCE_REJECTION_COURSE_CODE' ];
				$activity = $_GET [ 'PREFERENCE_REJECTION_ACTIVITY' ];
				$slotColour = $_GET [ 'PREFERENCE_REJECTION_SLOT_COLOUR' ];
				
				//manipulate database based on new user details 
				$connection -> query ("delete from Preferences where SlotId='$slotId' and InstructorId='$instructorId' and Venue='$venue' and CourseCode='$courseCode' and Activity='$activity' and SlotColour='$slotColour'");
		
				
				
				////////////////////////////////////////////////////////////////////////////////////////////////
				//BEGIN SQL CONNECTION TERMINATION PROCESS
				////////////////////////////////////////////////////////////////////////////////////////////////
				//establish connection termination
				mysqli_close ( $connection );
				////////////////////////////////////////////////////////////////////////////////////////////////
				//END SQL CONNECTION TERMINATION PROCESS
				////////////////////////////////////////////////////////////////////////////////////////////////
		?>