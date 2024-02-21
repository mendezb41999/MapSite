<?php
// Initialize the session
session_start();

// Access Database
require 'config.php';

//$myask = "SELECT 'id', 'title', 'fulltext' FROM jos_content;";
if (isset($_GET['keyword'])) {
	$keyword = $_GET['keyword'];
	$sql = "SELECT * FROM a_all_items WHERE title LIKE '%$keyword%' ORDER BY cid ASC";
}
else {
	$keyword = "";
	$sql = "SELECT * FROM a_all_items WHERE title LIKE '%$keyword%' ORDER BY cid ASC";
}
// Get the keyword from the user

$allitems_q = mysqli_query($link, $sql);
?>

<html>

<head>
	<title>Show/Edit jos_contentTable
	</title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,100italic,300italic,400italic,500italic,500,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

	<style type="text/css">
	body {
		font: 14px 'Roboto';
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
	#search-result{
		color: red;
	}

	#table-body {}

	td a {
		color: black;
		text-decoration: none;
	}
	</style>
</head>

<body>

	<CENTER>
		<table border="0"
			cellpadding="5"
			style="border-collapse: collapse; ">
			<tbody id="table-body">
				<tr
					style="border-bottom: 1px solid">
					<th>Item ID</th>
					<th>Title</th>
				</tr>

				<?php

				// DISPLAY cell content of each column and each row
				//-------------------------------------------------
				// display "search results of keyword" if keyword is set and the user has searched for something
				if (isset($_GET['keyword'])) {
					echo "<h1>Search results for keyword: '" . $keyword . "'</h1>";
				}
				function hrefFix_two($id, $col) {
					echo "item.php?pkname=cid&id=" . $id
						. "&column=" . $col . "&table=a_all_items";
				}
				while ($items_t_vals = mysqli_fetch_object($allitems_q)) {
					$pid = $items_t_vals->cid;
				?>

				<tr
					style="border-bottom: 1px solid">
					<td>
						<!--<a href=<?php //echo hrefFix_two($pid, "id"); 
										?>>-->
						<?php echo $pid; ?>
						<!--</a>-->
					</td>
					<td>
						<a
							href=<?php echo hrefFix_two($pid, "title"); ?>>
							<?php echo $items_t_vals->title; ?>
						</a>
					</td>
				</tr>
				<?php
				}
				?>

			</tbody>
		</table>

		<p> <br>
	</CENTER>

</body>

</html>