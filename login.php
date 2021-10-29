<?php session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Form Login | Pontren Paramaan</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale-1">
        <link rel="stylesheet" href="csslogin/style.css">
	      <link rel="icon" href="admin/ico/pontren.png" type="image/ico" />
    </head>
    <body>
        <div class="container">
            <section class="login-box">
                <h2>Login Pontren Paramaan</h2>
                <form method="POST" action="">
                    <input type="text" placeholder="Username" name="username">
                    <input type="password" placeholder="Password" name="password">
                    <input type="submit" value="M A S U K" name="login">
                </form>
                <?php
          if(isset($_POST['login'])){
            include "config.php";
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $cek_user = mysqli_query($conn,"SELECT * FROM admin WHERE username_admin='$username'");
            $row = mysqli_num_rows($cek_user);

            if($row === 1){
              $pass = mysqli_fetch_assoc($cek_user);
              $cek_pass = $pass['password_admin'];
              if($cek_pass <> $password){
                echo "<script>alert('Password Salah');</script>";
              }else{
                $_SESSION['log'] = true;
                header('location: index.php');
              }
            }else{
              echo "<script>alert('Username Salah Atau Belum Terdaftar');</script>";
            }
          }
          ?>
            </section>
        </div>
    </body>
</html>