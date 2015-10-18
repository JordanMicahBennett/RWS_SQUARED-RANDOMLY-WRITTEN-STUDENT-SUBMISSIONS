
<!--
	//author jordan micah bennett, swen3165 final project, tas 2015
-->
<html id = "additionBackgroundArea">
	<head>
		<link rel="stylesheet" href="../css/bootstrap.css" />
		
		<script type = "text/javascript">
			document.getElementById('additionBackgroundArea').style.backgroundColor = '#eeeeee';
			/*document.getElementById('additionBackgroundArea').style.backgroundImage = "url(../../images/)";
			document.getElementById('additionBackgroundArea').style.backgroundRepeat = "no-repeat";
			document.getElementById('additionBackgroundArea').style.backgroundSize = "500 580";
			document.getElementById('additionBackgroundArea').style.backgroundAttachment = "fixed";*/
		</script>
	</head>
	
	
	<body>
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
		
				if ( !empty ( $_POST [ 'tasUserDeletionActionAttemptButtonName' ] ) )
				{	
					//establish html sign in input components, with respect to php 
					$userId = $_POST [ 'TAS_USER_DELETION_ACTION_ID' ];

					//manipulate database based on new user details 
					$connection -> query ("delete from Users where UserId = '$userId'");
				}
				//display success!
				//echo 'generateGenericResponse ( "new user\'s text details.component.1.complete!" );';
				////////////////////////////////////////////////////////////////////////////////////////////////
				//END ADD NEW USER TEXT BASED DETAILS PROCESSS - COMPONENT.1
				////////////////////////////////////////////////////////////////////////////////////////////////
				echo "<input class = 'btn btn-default form-control'  type = 'submit' value = 'user deleted successfully!'/>";
				
				////////////////////////////////////////////////////////////////////////////////////////////////
				//BEGIN SQL CONNECTION TERMINATION PROCESS
				////////////////////////////////////////////////////////////////////////////////////////////////
				//establish connection termination
				mysqli_close ( $connection );
				////////////////////////////////////////////////////////////////////////////////////////////////
				//END SQL CONNECTION TERMINATION PROCESS
				////////////////////////////////////////////////////////////////////////////////////////////////
		?>
	</body>
</html>