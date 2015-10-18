<?php
	//author jordan micah bennett, swen3165 final project, tas 2015

	session_start();
	//establish database connection requirements
		//establish database connection requirements
		$_SESSION [ 'dbHost' ] = 'mysql.2freehosting.com';
		$_SESSION [ 'dbUsername' ] = 'u197334111_tas';
		$_SESSION [ 'dbPassword' ] = 'swentas!';
		$_SESSION [ 'dbName' ] = 'u197334111_tas';
		
		
	//establish processes
		//establish database connection
		//connection to the database
		$connection = mysqli_connect ( $_SESSION [ 'dbHost' ], $_SESSION [ 'dbUsername' ], $_SESSION [ 'dbPassword' ], $_SESSION [ 'dbName' ] );
		
		//establish connection verification
		if ( mysqli_connect_errno ( ) )
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error ( );
		}
		
		//establish results from database
		$result = mysqli_query ( $connection,"select * from Preferences where AcceptanceStatus='false'" );

	
		while($row = mysqli_fetch_array($result))
		{
				$output[] = array(
                "slotId" => $row['SlotId'],
                "instructorId" => $row['InstructorId'],
				"venue" => $row['Venue'],
				"courseCode" => $row['CourseCode'],
				"activity" => $row['Activity'],
				"slotColour" => $row['SlotColour'],
				"acceptanceStatus" => $row['AcceptanceStatus']
                );
		}
		header('Content-Type: application/json');
		echo json_encode($output);
?>

