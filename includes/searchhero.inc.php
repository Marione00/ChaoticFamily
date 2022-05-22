<?php 
    if(isset($_POST["search-submit-hero"])){
        require 'db.inc.php';
        session_start();
        
        $search = $_POST["search-hero"];
        $id= $_SESSION['userId'];
        $sql="SELECT fullName, lore, imageCharacter FROM characters WHERE fullName LIKE '%$search%' AND idUser = $id ;";

        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        
        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result))
                $_SESSION['HERONAME']=$row['fullName'];
                $_SESSION['HEROLORE']=$row['lore'];
                $_SESSION['HEROIMAGE']=$row['imageCharacter'];
                echo $_SESSION['HERONAME'];
                echo $_SESSION['HEROLORE'];
                echo $_SESSION['HEROIMAGE'];
        }
        //header("Location: ../index.php");
        exit();
    }else{
        //echo mysqli_error($conn);
        //header("Location: ../index.php");
        exit();
    }
?>