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

		#table-body {}

		td a {
			color: black;
			text-decoration: none;
		}
	</style>
</head>

<body>

	<CENTER>

		<div class="property-header">
			<h2>List Of All Properties</h2>
		</div>
		<table border="0" cellpadding="5" style="border-collapse: collapse; ">
			<tbody id="table-body">
				<tr style="border-bottom: 1px solid">
					<th>Item ID</th>
					<th>Title</th>
				</tr>

				<?php

				// DISPLAY cell content of each column and each row
				//-------------------------------------------------

				function hrefFix_two($id, $col) {
					echo "editCell.php?pkname=cid&id=" . $id
						. "&column=" . $col . "&table=a_all_items";
				}
				while ($items_t_vals = mysqli_fetch_object($allitems_q)) {
					$pid = $items_t_vals->cid;
				?>

					<tr style="border-bottom: 1px solid">
						<td>
							<!--<a href=<?php //echo hrefFix_two($pid, "id"); 
										?>>-->
							<?php echo $pid; ?>
							<!--</a>-->
						</td>
						<td>
							<a href=<?php echo hrefFix_two($pid, "title"); ?>>
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