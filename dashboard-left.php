
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <style>
        .side-bar{
            display: flex;
            flex-direction: column;
            margin: 10px;
        }
        
        .side-bar a{
            padding: 10px;
            border-radius: 16px;
            margin: 15px;
            text-align: center;
            text-decoration: none;
            color: black;
            border: 2px solid black;
            background-color: white;
        }
        .side-bar a:hover{
            background-color: #999999;
            color: black;
        }
        body{
            margin: 0;
            padding: 0;
        }
        .side-bar-top{
            text-align: center;
            color: black;
        }
	.php-section{
		text-align: center;
		color: black;
	}
    </style>
</head>
<body> 
    <div class="side-bar-top">
        <h3>Admin Dashboard</h3>
        <hr></hr>
    </div>
	<div class="php-section">
		<?php
				
			include("session.php");
			include("config.php");	
					
			if (!empty($_SESSION["username"])) {
				echo "<h4>Welcome, <font color=\"black\">";
				echo htmlspecialchars($_SESSION["username"]);
				echo "</font>!";
			}
			if (isset($_GET['msg'])) {
				echo $_GET['msg'];
			}
		?>
	</div>
 
    <div class="side-bar">
        <a href="register.php" target="RIGHT">Add New User</a>       
        <a href="ViewEditUsers.php" target="RIGHT">View/Edit Users</a>
        <a href="dashboard.php" target="RIGHT">View/Edit Properties</a>
        <a href="item-edit.php" target="RIGHT">Edit An Item</a>
        <a href="upload_files.php" target="RIGHT">Upload File</a>
        <a href="map-admin.php" target="RIGHT">Add on Map</a>
        <a href="coord-entry.php" target="RIGHT">Coordinate Tool</a>
    </div>               
</body>

</html>



