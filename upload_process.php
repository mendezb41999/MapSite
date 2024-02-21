<!DOCTYPE html>
<?php
  
    $target_dir = $_POST["dirname"]."/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions = array("jpeg","jpg","png","pdf","gif");
  
   if(isset($_POST["submit"])) {
  
        // To check whether directory exist or not
        if(!empty($_POST["dirname"])){
            if(!is_dir($_POST["dirname"])) {
                mkdir($_POST["dirname"]);    
                $uploadOk = 1;            
            }
        }
        else {
            echo "Specify the directory name...";
            $uploadOk = 0;
            exit;
        }
  
        // To check extensions are correct or not
        if(in_array($imageFileType, $extensions) === true) {     
            $uploadOk = 1;
        } 
        else {
  
            echo "No file selected or Invalid file extension...";
            $uploadOk = 0;
            exit;        
        }
    }
        // Check if file already exists
        if (file_exists($target_file)) {
  
            echo "Sorry, file already exists.";
            $uploadOk = 0;
            exit;
        }
  
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 10000000) {
  
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            exit;
        }
  
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) 
        {
           echo "Sorry, your file was not uploaded.";
        } 
         else 
        {
  
            // If everything is ok, try to upload file
            if (move_uploaded_file($_FILES["fileToUpload"]
                  ["tmp_name"], $target_file)) 
            {      
                echo "The file ".  $_FILES["fileToUpload"]
                  ["name"]. " has been uploaded.";
            } 
            else 
            {        
                echo "Sorry, there was an error uploading your file.";
            }
        }    
?>
  
</body>
</html>