<?php
// Access Database
require 'config.php';
?>

<html>

<head>
	<title>Edit Cell</title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,100italic,300italic,400italic,500italic,500,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<style type="text/css">
	
		 * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
	    	font-family: 'Roboto';
        }
		body {
			width: 75%;
            height: 100%;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
		}
		.container {
            width: 100%;
            background-color: #f2f2f2;
            padding: 20px;
            margin: 0 auto;
            justify-content: center;
            align-items: center;
        }
        .container-address-section {
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 20px;
        }
        .address-name {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            width: 100%;
            padding: 10px;
        }
		.icon-content{
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
            align-items: center;
            width: 100%;
        }
        .icon {
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
            align-items: center;
            padding: 10px;
            cursor: pointer;
        }
        .icon img {
            width: 30px;
            height: 30px;
        }
		.container-content-section {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            padding: 20px;
        }
        .content-title {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .content-title h2 {
            font-size: 18px;
            font-weight: 600;
            color: #000;
        }
        .content-text {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            padding: 20px;
        }
        .content-text p {
            font-size: 14px;
        }
        .container-data-section {
            display: flex;
            flex-direction: column;
            padding: 20px;
            width: 100%;
        }
        .container .data-title {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .data-title h2 {
            font-size: 18px;
            font-weight: 600;
            color: #000;
        }
        .data-table {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            padding: 20px;
            border: 1px solid #000;
            margin-right: 2rem;
        }
        .data-table table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #000;
        }
        .data-table table td {
            border: 1px solid #000;
            padding: 8px;
        }
        .data-table table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .data-table table tr:hover {
            background-color: #ddd;
        }
        .data-table table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #000;
            color: white;
        }
        .data-table table #td1 {
            padding-left: 1rem;
            padding-right: 5rem;
            text-align: left;
            background-color: #f2f2f2;
            width: 25%;
			font-size: 14px;
        }
        .data-table table #td2 {
            padding-left: 1rem;
            padding-right: 5rem;
            text-align: left;
            width: 75%;
			font-size: 14px;
        }
		.container-report-section{
			display: flex;
			flex-direction: column;
			justify-content: flex-start;
			align-items: flex-start;
			padding: 20px;
		}
		.report-title h2 {
            font-size: 18px;
            font-weight: 600;
            color: #000;
        }
		.container-documents-section{
			display: flex;
			flex-direction: column;
			justify-content: flex-start;
			align-items: flex-start;
			padding: 20px;
		}
		.container-map-section{
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 20px;
		}
		.container-photos-title{
            color: #000;
		}
		.container-documents-title{
			color: #000;
		}
		.container-document-section{
			display: flex;
			flex-direction: row;
			justify-content: flex-start;
			align-items: center;
			padding: 20px;
		}
		.container-photos-section{
			display: flex;
			flex-direction: row;
			justify-content: flex-start;
			align-items: center;
			padding: 20px;
		}

	</style>
</head>

<body>


		<?php
		if (
			isset($_GET['pkname']) &&
			isset($_GET['id']) &&
			isset($_GET['table'])
		) {
			$pkname = $_GET['pkname'];
			$id = $_GET['id'];
			$table = $_GET['table'];
			$item_query = mysqli_query($link, 'select * from ' . $table . ' where ' . $pkname . ' = ' . $id . ' LIMIT 1');
			$item = mysqli_fetch_object($item_query);
		
		?>
			<div class="container">
        		<div class="container-address-section">
					<div class="address-name">
						<h1 style="font-size: 24px; font-weight: 600; color: #000;"><?php echo $item->title ?>
						</h1>
						<hr>
					</div>
            		<div class="icon-content">
                		<span class="icon">
                    		<img src="css/file-pdf-solid.svg">
                		</span>
						<span class="icon">
							<img src="css/print-solid.svg">
						</span>
						<span class="icon">
							<img src="css/envelope-solid.svg">
						</span>
            		</div>    
        		</div>
				<hr>
				<div class="container-content-section">
					<div class="content-title">
						<h2 style="font-size: 18px;">Content:</h2>
					</div>
					<div class="content-text">
						<?php
						if (strlen($item->main_content) > 0) {
							echo str_replace("\"images","\"/p/s23-06/images",str_replace("\"/images","\"/p/s23-06/images",$item->main_content));
							echo "<hr>";
						}
						?>
					</div>
				</div>
        		<hr>
				<div class="container-report-section">
					<div class="report-title">
						<h2 style="font-size: 18px;">Report:</h2>
					</div>
					<div class="report-text">
						<?php
						if (strlen($item->report) > 0) {
							echo str_replace("\"images","\"/p/s23-06/images",str_replace("\"/images","\"/p/s23-06/images",$item->report));
							echo "<hr>";
						}
						?>
					</div>
            	</div>
				<hr>
				<div class="container-data-section">
					<div class="data-title">
						<h2 style="font-size: 18px;">Data:</h2>
					</div>
					<div class="data-table">
						<?php
							if ($item->data != "{}") {
								$data = json_decode($item->data, true);
						?>
						<table style=" border-collapse: collapse; width: 100%; border: 1px solid #000;">
							<tr>
								<td id="td1">Tax parcel Number
								</td>
								<td id="td2"><?php
									if (array_key_exists("Tax parcel Number", $data)) {
										echo $data["Tax parcel Number"];
									} ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Street number</td>
								<td id="td2"><?php echo $data["Street number"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Street name</td>
								<td id="td2"><?php echo $data["Street Name"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Present Use</td>
								<td id="td2"><?php echo $data["Present Use"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Historic Function
								</td>
								<td id="td2"><?php echo $data["Historic Function"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Historic Use</td>
								<td id="td2"><?php echo $data["Historic Use"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Date of Construction
								</td>
								<td id="td2"><?php echo $data["Date of Construction"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Dates of alteration
								</td>
								<td id="td2"><?php echo $data["Dates of alteration"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Style</td>
								<td id="td2"><?php echo $data["Style"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">No. of Stories</td>
								<td id="td2"><?php echo $data["No. of Stories"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Construction Method
								</td>
								<td id="td2"><?php echo $data["Construction method"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Exterior material:
									historic 1</td>
								<td id="td2"><?php echo $data["Exterior material: historic 1"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Exterior material:
									historic 2</td>
								<td id="td2"><?php echo $data["Exterior material: historic 2"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Exterior material:
									present</td>
								<td id="td2"><?php echo $data["Exterior material: present"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Roof Type</td>
								<td id="td2"><?php echo $data["Roof Type"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Foundation Material
								</td>
								<td id="td2"><?php echo $data["Foundation Material"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Additions</td>
								<td id="td2"><?php echo $data["Additions"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Porch location 1
								</td>
								<td id="td2"><?php echo $data["Porch location 1"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Porch condition</td>
								<td id="td2"><?php echo $data["Porch condition"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Window condition
								</td>
								<td id="td2"><?php echo $data["Window condition"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Overall integrity
								</td>
								<td id="td2"><?php echo $data["Overall integrity"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Contributing</td>
								<td id="td2"><?php echo $data["Contributing"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Endangered</td>
								<td id="td2"><?php echo $data["Endangered"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Distinctive features
								</td>
								<td id="td2"><?php echo $data["Distinctive features"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Notes</td>
								<td id="td2"><?php echo $data["Notes"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Outbldg 1 type</td>
								<td id="td2"><?php echo $data["Outbldg 1 type"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Outbldg 1 date</td>
								<td id="td2"><?php echo $data["Outbldg 1 date"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Outbldg 1
									construction method
								</td>
								<td id="td2"><?php
									if (array_key_exists("Outbldg 1 construction method", $data)) {
										echo $data["Outbldg 1 construction method"];
									} ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Outbldg 1
									distinctive features
								</td>
								<td id="td2"><?php echo $data["Outbldg 1 distinctive features"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Outbldg 2 type</td>
								<td id="td2"><?php echo $data["Outbldg 2 type"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Outbldg 2 date</td>
								<td id="td2"><?php echo $data["Outbldg 2 date"] ?>
								</td>
							</tr>
							<tr>
								<td id="td1">Landscape features
								</td>
								<td id="td2"><?php echo $data["Landscape features"] ?>
								</td>
							</tr>
						</table>
						<?php }else {?>
						<table style=" border-collapse: collapse; width: 100%; border: 1px solid #000;">
							<tr>
								<td id="td1">Tax parcel Number
								</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Street number</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Street name</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Present Use</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Historic Function
								</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Historic Use</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Date of Construction
								</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Dates of alteration
								</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Style</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">No. of Stories</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Construction Method
								</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Exterior material:
									historic 1</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Exterior material:
									historic 2</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Exterior material:
									present</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Roof Type</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Foundation Material
								</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Additions</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Porch location 1
								</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Porch condition</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Window condition
								</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Overall integrity
								</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Contributing</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Endangered</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Distinctive features
								</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Notes</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Outbldg 1 type</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Outbldg 1 date</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Outbldg 1
									construction method
								</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Outbldg 1
									distinctive features
								</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Outbldg 2 type</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Outbldg 2 date</td>
								<td id="td2">
								</td>
							</tr>
							<tr>
								<td id="td1">Landscape features
								</td>
								<td id="td2">
								</td>
							</tr>
						</table>
						<?php }?>
					</div>
					
					<div class="container-document-section">
						<div class="container-docs-title">
							<h2 style="font-size: 18px;">Documents:</h2>
						</div>
						<div class="container-documents">
							<?php
							if (strlen($item->document_links) > 0) {
								$docs = explode("|", $item->document_links);
								foreach ($docs as $doc){
									echo '<a href="/p/s23-06/'. $doc .'">Link</a>,';
								}
							}
							?>
						</div>
					</div>
					<hr>
					<div class="container-photos-section">
						<div class="container-photos-title">
							<h2 style="font-size: 18px;">Photos:</h2>
						</div>
						<div class="container-photos">
						<?php
							if (strlen($item->picture_links) > 0) {
								$pics = explode("|", $item->picture_links);
								foreach ($pics as $pic){
									echo '<img src="/p/s23-06/'. $pic .'">';
								}
							}
							?>
						</div>
        			</div>
					<hr>
				</div>
				<div class="container-map-section">
					<?php
						if ($item->lat != 0 && $item->lng != 0) {
							require 'Simple_Map.php';
						}
					?>
			</div>
		<?php
		} else {
			echo "<h2> 404 </h2> <h4>Could not find that</h4> ";
		}
		?>

	

</body>

</html>