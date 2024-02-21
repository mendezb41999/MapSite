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
		color: white;
		background-color: Blue;
		padding: 10px;
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
	}

	.search-bar #search-btn {
		padding: 6px;
		margin-top: 8px;
		font-size: 17px;
		color: white;
		background-color: blue;
		border-color: transparent;
	}

	#table-body {}
	</style>
</head>

<body>

	<CENTER>

	<?php
		// search through table with search bar and display results, alerts user if item is not found
		// --------------------------------------------------------------------------------------------
		
		 if(isset($_POST['search']))
		 {
		 	$search = $_POST['search'];
		 	$myask = "SELECT * FROM jos_content WHERE title LIKE '%$search%' OR fulltext LIKE '%$search%'";
		 	$allitems_q = mysqli_query($link, $myask);
		 	$count = mysqli_num_rows($allitems_q);
		 	if($count == 0)
		 	{
	 			echo "<h3> No results found! </h3>";
		 	}
		 	else
		 	{
		 		echo "<h3> $count results found! </h3>";
		 	}
		 }
	


		




	?>
		
		<h1 id="admin-dashboard"> View
			or Edit Items </h1>

		
		<div class="search-bar">
			<form action="ViewEditItems.php" method="post">
				<input type="text" name="search" placeholder="Search for item...">
				<input type="submit" id="search-btn" value="Search">
			</form>
		</div>

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

        function hrefFix_two($id, $col)
        {
            echo "editCelli.php?pkname=id&id=" . $id
            . "&column=" . $col . "&table=jos_content";
        }
        while($items_t_vals = mysqli_fetch_object($allitems_q))
        { 
          $pid = $items_t_vals->cid;
?>

				<tr
					style="border-bottom: 1px solid">
					<td>
						<!--<a href=<?php //echo hrefFix_two($pid, "id"); ?>>-->
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