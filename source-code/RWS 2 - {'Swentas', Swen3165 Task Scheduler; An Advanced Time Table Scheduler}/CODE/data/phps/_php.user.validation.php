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
		$result = mysqli_query ( $connection,"select * from Users" );

		$userSignInId = $_GET['TAS_SIGN_IN_USER_ID_GET_VALUE'];
		$userSignInPassword = $_GET['TAS_SIGN_IN_USER_PASSWORD_GET_VALUE'];
		
		
		
		while($row = mysqli_fetch_array($result))
		{
		
			if ( ( $userSignInId == $row['UserId'] ) && ( $userSignInPassword == $row['UserPassword'] ) )
				$output[] = array(
                "userId" => $row['UserId'],
                "userPassword" => $row['UserPassword'],
				"userName" => $row['UserName'],
				"userRole" => $row['UserRole'],
				"userStatus" => $row['UserStatus'],
				"userMaximumHours" => $row['UserMaximumHours']
                );
		}
		header('Content-Type: application/json');
		echo json_encode($output);
?>

