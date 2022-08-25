<?php
date_default_timezone_set('Asia/Manila');
include '../../../conn.php';

if(ISSET($_POST['save'])){
    $maxsize = 50000000; // 5MB
    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
        $name = $_FILES['file']['name'];
        $target_dir = '../video/';
        $target_file = $target_dir . $_FILES["file"]["name"];
        
       // Select file type
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($extension,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            echo "<script>alert('File too large, File must be less than 5MB.')</script>";
            echo "<script>window.location =  'http://localhost/thesis/adminpanel/admin/home.php?page=manage-file'</script>";
          }else{        
             // Upload
             if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                // Insert record
                $conn->query("INSERT INTO videos(name,location) VALUES('".$name."','".$target_file."')") or die(mysqli_error());
                echo "<script>alert('Video Upload Succesfully.')</script>";
                echo "<script>window.location =  'http://localhost/thesis/adminpanel/admin/home.php?page=manage-file'</script>";
              }
           }
        }else{
            echo "<script>alert('Invalid file extension.')</script>";
            echo "<script>window.location =  'http://localhost/thesis/adminpanel/admin/home.php?page=manage-file'</script>";
         }
     }else{
        echo "<script>alert('Please select a file.')</script>";
        echo "<script>window.location =  'http://localhost/thesis/adminpanel/admin/home.php?page=manage-file'</script>";
     }
}