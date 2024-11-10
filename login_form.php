<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
      $user_type = $row['user_type'];
      if($row['user_type'] == 'Management'){
            $_SESSION['mgmt'] = 'mgmt';
            header('location:management_page.php');

      }elseif($row['user_type'] == 'Student'){

         $_SESSION['stdnt'] = 'stdnt';
            header('location:student_page.php');

      }
     
   }else{
      $error[] = 'Incorrect Email or Password!';
   }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <link rel="stylesheet" href="styleee.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Enter Email">
      <input type="password" name="password" required placeholder="Enter Password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p style="display:none">Don't have an account? <a href="registration_form.php">register now</a></p>
   </form>

</div>

</body>
</html>