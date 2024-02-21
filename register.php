<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $message = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Get username & password 
        $username = trim($_POST["UserName"]);
        $password = trim($_POST["MyPass"]);   
        
    // Prepare an insert statement
    $sql = "INSERT INTO a_users (username, password) VALUES (?, ?)";
        
     // Use DB info in $link from config.php to construct MySQL message/command
        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password; 
            
            // Attempt to EXECUTE the prepared statement
            mysqli_stmt_execute($stmt);            

            // Close statement
            mysqli_stmt_close($stmt);
            $message = "Congratulations! You Have Successfully Register!";

        } else {
                 $message = "Problems with inserting to Database";            
        }

    // Close connection
    mysqli_close($link);
}
?>

<html>
<head>
    <title>Registration</title>
    <style>
        * {font-family: Roboto, sans-serif;}
        body {
            background-color: #f1f1f1; 
            text-align: center; 
            padding: 20px;  
            color: #333; 
            font-size: 16px; 
            line-height: 1.5; 
            font-weight: 300;
            justify-content: center;
            align-items: center;
            display: flex;
            height: 100vh;
            margin: 0; 
        }
        form {background-color: #fff; width: 300px; padding: 20px; margin: 0 auto; border: 1px solid #ddd; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); text-align: left; display: inline-block; vertical-align: middle; }
        input {width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd;}
        input[type="submit"] {background-color: #333; color: #fff; border: 0;}

    </style>
</head>
<body>
<form method="post" action="register.php">
    User Name: <input type="text" name="UserName">
    <p>
    Password: <input type="text" name="MyPass">
    <p>
    <input type="submit" value="Enter">
</form>
<?php echo $message; ?>
 
</body>
</html>
