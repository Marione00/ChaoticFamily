<?php
if(isset($_POST['signup'])){

  require 'db.inc.php';

  $username = $_POST['nickname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordRepeat = $_POST['pwd-repeat'];

  if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){

    header("Location: ../setting.php?error=emptyfields&uid=".$username."&email=".$email);
    exit();
  }

  else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
    header("Location: ../signup.php?error=invalidmailuid");
    exit();
  }

  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&uid=".$email);
    exit();
  }

  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invaliduid&mail=".$email);
    exit();
  }

  else if($password !== $passwordRepeat){
    header("Location: ../signup.php?error=passwordcheck&uid=".$username."&email=".$email);
    exit();
  }
//inizio controllo nome utente
else{
  $sql = "SELECT * FROM users WHERE nicknameUser=?;";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../signup.php?error=sqlerror");
    exit();
  }

  else{
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if($resultCheck > 0){
        header("Location: ../signup.php?error=usertaken&email=".$username);
        exit();
      }
//fine controllo nome utente
//inizio controllo Email
else{
  $sql = "SELECT * FROM users WHERE emailUser=?;";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../signup.php?error=sqlerror");
    exit();
  }

  else{
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if($resultCheck > 0){
        header("Location: ../signup.php?error=emailtaken&email=".$email);
        exit();
      }
//fine controllo Email
      else{
          $sql = "INSERT INTO users (nicknameUser, emailUser, passwordUser) VALUES (?,?,?)";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
      }
      else{
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
        mysqli_stmt_execute($stmt);
        header("Location: ../signup.php?signup=success");
        exit();
          }
        }
      }
    }
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}

else{
  header("Location: ../signup.php");
  exit();
}
