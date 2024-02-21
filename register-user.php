 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            background-color: blue;
            font-family: Arial, Helvetica, sans-serif;
        }
        form {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
        }
        input {
            border: 1px solid #ccc;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            padding: 5px;
            margin-bottom: 10px;
        }

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
</body>
</html>