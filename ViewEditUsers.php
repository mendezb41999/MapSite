<?php
    // Initialize the session
    session_start();

    // Access Database
    require 'config.php';

    $allusers_q = mysqli_query($link, 'select * from a_users');
?> 

<html>
<head>
    <title>View/Edit User</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
	
	h1{ margin-top: 10%;}
    </style>
</head>
<body>

<CENTER>

    <h1> View/Edit User </h1>
        <table border="0" cellpadding ="5" style="border-collapse: collapse; ">
            <tbody>
                <tr style="border-bottom: 1px solid">
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Password</th>
                </tr>

<?php

// DISPLAY cell content of each column and each row
//-------------------------------------------------

        function hrefFix_two($id, $col)
        {
            echo "editCellu.php?pkname=uid&id=" . $id
            . "&column=" . $col . "&table=a_users";
        }
        while($users_t_vals = mysqli_fetch_object($allusers_q))
        { 
          $pid = $users_t_vals->uid;
?>

                <tr style="border-bottom: 1px solid">
                    <td>
  			<!--<a href=<?php //echo hrefFix_two($pid, "uid"); ?>>-->
  				 <?php echo $users_t_vals->uid; ?>
                        <!--</a>-->
                    </td>
                    <td>
			<a href=<?php echo hrefFix_two($pid, "username"); ?>>  
                    		<?php echo $users_t_vals->username; ?>
                        </a>
                    </td>
                    <td>
                        <a href=<?php echo hrefFix_two($pid, "password"); ?>>
                        	<?php echo $users_t_vals->password; ?>
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