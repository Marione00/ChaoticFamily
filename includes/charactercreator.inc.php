<?php
    require 'db.inc.php';
    session_start();
    $id = $_SESSION['userId'];
    $nickname = $_SESSION['userUid'];
    $heroName=$_POST['heroName'];
    $heroLore=$_POST['heroLore'];
    $heroGame=$_POST['elenco'];
   /* $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];   */ 
    $folder = "upload/";
/*
    $temp = explode(".", $_FILES["uploadfile"]["name"]);
    $filename = round(microtime(true)) . $id . '.' . end($temp);
*/
    if(isset($_POST['createhero'])){

      $temp = explode(".", $_FILES["uploadfile"]["name"]);
      $newfilename = round(microtime(true)) . '-' .$nickname. '-' .'.' . end($temp);
      move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $folder . $newfilename);

      $msg = "";
      // If upload button is clicked ...
      // Get all the submitted data from the form
      //if(array_key_exists('uploadfile', $_FILES) && array_key_exists('error', $_FILES['uploadfile']){}
      $sql = "INSERT INTO characters (idUser, fullName, lore, game, imageCharacter) VALUES ('$id', '$heroName', '$heroLore', '$heroGame','$newfilename')";

      // Execute query
      //mysqli_query($conn, $sql);
      if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        header("Location: ../index.php?creation=success");
        exit();
      } else {
            echo "Error updating record: " . mysqli_error($conn);
      }
        
     /* if (move_uploaded_file($filename, $folder.$filename))  {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }
*/

      mysqli_close($conn);
    
  }
      
?>
