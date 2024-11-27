<?php

session_start();

// connexion base donnes
  
  $host = "localhost";
  $user = "root";
  $pasword = "";
  $db = "user";

  $connect = mysqli_connect($host, $user, $pasword, $db);


// insertion des donnes
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  if (isset($_POST['email']) && isset($_POST['password1']) && isset($_POST['username'])) {

      $email = $_POST['email'];
      $password = $_POST['password1'];
      $username = $_POST['username'];
      

     //insert 
    
     $sql = "insert into users values('$email','$password','$username',)";
     
     $query = mysqli_query($connect, $sql);
      
      
      if ($query == true) {

          $_SESSION['gender']=$username;
          $_SESSION['username'] = $username;
          $_SESSION['email'] = $email;
          $_SESSION['password'] = $password;
          $_SESSION['phone'] = $phone;
          $_SESSION['age'] = $age;
          header("Location: home.php");
          exit();
      }
  }
}


// selection des donnes

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  if (isset($_POST['email']) && isset($_POST['password'])) {
     
      $email = $_POST['email'];
      $password = $_POST['password'];

     $error ="";
      $sql = " SELECT * from users where email ='$email' and pasword='$password'";
      $check = mysqli_query($connect, $sql);

      if (mysqli_num_rows($check) > 0) {

          $data = mysqli_fetch_assoc($check);

          $_SESSION['username'] = $data['username'];
          $_SESSION['email']  = $data['email'];
          $_SESSION['password'] = $data['pasword'];
         


          header("Location: home.php");
          exit();
      } 
      
      
      else {
          $error = " invalid password or email ";
      }

  }

}












?>