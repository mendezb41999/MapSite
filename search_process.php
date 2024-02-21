<?php
  // Include the config file
  require_once('config.php');

  // if keyword is not set, display nothing
  if (isset($_GET['keyword'])) {
      $keyword = $_GET['keyword'];
      $sql = "SELECT * FROM a_all_items WHERE title LIKE '%$keyword%'";
  }
  else {
      $keyword = "";
      $sql = "SELECT * FROM a_all_items WHERE title LIKE '%$keyword%'";
  }

  // Get the keyword from the user
  

  // Create the SQL query
 

  // Connect to the database
  $db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  // Check connection
  if ($db->connect_error) {
    die("ERROR: Could not connect. " . $db->connect_error);
  }

  // Execute the query
  $result = $db->query($sql);

  // Check if the query was successful
  if ($result) {
    // Get the results
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    // Loop through the results and print them out
    // center the results
    echo '<div style="text-align: center;">';
    // display message
    echo '<h1>Search results for <strong> "' . $keyword . '"</strong></h1><br><br>';
    foreach ($rows as $row) {
      echo $row['cid'] . ' | ';
      echo $row['title'] . '<br>';
    }
  } else {
    echo 'No results found.';
  }

  // Close the database connection
  $db->close();
  ?>
  <!DOCTYPE html>
<html>
<head>
  <title>Search</title>
</head>
<style>
  .container {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
  }
  form{
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    padding: 10px;
  }
  input[type=text] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 20px;
    background-color: #f8f8f8;
    resize: none;
    font-size: 20px;
  }
  input[type=submit] {
    width: 10%;
    background-color: white;
    color: black;
    padding: 12px 20px;
    margin: 8px;
    border-radius: 20px;
    border: 2px solid black;
    cursor: pointer;
    font-size: 20px;
  }
  input[type=submit]:hover {
    background-color: #999999;
  }
  

  </style>
<body>
  <div class="container">
    <form action="list-search.php" method="GET" target="DOWN">
      
        <input type="text" name="keyword" placeholder="Enter keyword, name, or address">
        <input type="submit" value="Search">
      
      
    </form>
  </div>
  
</body>
</html>