<?php
// Initialize the session
session_start();

// Access Database
require 'config.php';

//$myask = "SELECT 'id', 'title', 'fulltext' FROM jos_content;";

$myask = "SELECT * FROM a_all_items ORDER BY cid ASC";

$allitems_q = mysqli_query($link, $myask);
?>

<html>

<head>
	<title>Show/Edit jos_contentTable
	</title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
	<style type="text/css">
		body {
			font: 14px sans-serif;
			text-align: center;
		}

		#admin-dashboard {
			color: black;
			padding: 10px;
			margin-top: 2%;
		}

		.search-bar input[type=text] {
			padding: 6px;
			border: 1px solid #ccc;
			margin-top: 8px;
			font-size: 17px;
			margin-right: 5px;
		}

		.search-bar {
			margin-bottom: 20px;
			margin-top: 5%;
		}

		.search-bar #search-btn {
			padding: 6px;
			margin-top: 8px;
			font-size: 17px;
			color: white;
			background-color: rgb(151, 114, 19);
			border-color: transparent;
		}

	</style>
</head>

<body>

	<CENTER>

		<?php

		// use SESSION to automatically DETECT username

		

		function hrefFix_to($id) {
			echo "editCell.php?pkname=cid&id=" . $id
				. "&table=a_all_items";
		}

		if (isset($_POST["cid"])){
			$cid = $_POST["cid"];
			echo "Sending you to the edit page.";
			header("location: editCell.php?pkname=cid&id=". $cid ."&table=a_all_items");
		} else {
			?>
			<h2>Enter an id to edit that item.</h2>
			<form method="POST" action="item-edit.php">
				<div class="search-bar">
					<input type="text" placeholder="Search.." name="cid"><input type="submit" id="search-btn">
				</div>
			</form>

		<?php
		}
		?>

	</CENTER>

</body>

</html>