<!DOCTYPE html>
<html>
<style>
       * {box-sizing: border-box;}
       body {font-family: 'Roboto', sans-serif; justify-content: center; 
             align-items: center; padding-top: 50px;}
       form {max-width: 500px; margin: 10px auto; padding: 10px 20px; 
             background: #f4f7f8; border-radius: 8px;}
       h1 {margin: 0 0 30px 0; text-align: center;}
       input[type=text], input[type=file] {width: 100%; padding: 15px; 
             border: 1px solid #ddd; margin-bottom: 20px; border-radius: 3px;}
       input[type=submit] {width: 100%; padding: 15px; background: #ddd;
               border: 0; border-radius: 3px; cursor: pointer;}
       input[type=submit]:hover {background: #bbb;}
       .msg {margin: 15px 0; padding: 10px; border-radius: 3px; 
             color: #3c763d; background: #dff0d8; border: 1px solid #3c763d;}
       .err {margin: 15px 0; padding: 10px; border-radius: 3px;
               color: #a94442; background: #f2dede; border: 1px solid #a94442;}
</style>
  
<body>
  
    <form action="upload_process.php" method="post" 
          enctype="multipart/form-data">
        CID:<input type="text" name="dirname" 
                        id="dirname" size="100"><br>
        Select image to upload:
        <input type="file" name="fileToUpload" 
               id="fileToUpload"><br>
        <input type="submit" value="Upload Image" 
               name="submit">
    </form>
  
</body>
  
</html>