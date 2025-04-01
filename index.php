<?php
session_start();
include("config.php");


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EzQuiz</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <style>
      .form-control{
        border-radius: 50px;
        border-width: 1px;
        font-size: 18px;
      }
      .login-menu{
        margin-top: 50px;
        margin-bottom: 50px;
      }

      .login-menu .container{
        background-color: white;
        padding: 80px 25px;
        border-radius:25px;
      }
    </style>
  </head>


  <body>
    
    <!-- Navbar Start -->
    <div class="container">
        
      <header class="d-flex align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
        <div class="logo-img">
          <a href="/" class="logo d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
          EzQuiz
          </a>
        </div>
      </header>
    </div>
    <!-- Navbar End -->




    <!-- Hero Section Start -->
    
    <section class="login-menu">
      <div class="container h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="files/login.png"
              class="img-fluid" alt="Sample image" width="550px">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            
            <h1 class="display-6 fw-bold my-4">Login & Play</h1>
            <form action="" method="POST">

              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-2">
                <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
                  placeholder="Enter your email address" required/>
              </div>
    
              <!-- Password input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" name="pass" id="form3Example4" class="form-control form-control-lg"
                  placeholder="Enter password" required/>
              </div>

              <div class="text-center text-lg-start">
                <button  type="submit" name="login" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg rounded-pill"
                  style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              </div>


              <!-- Alerts -->

              <div class="alert alert-danger mt-4" role="alert" id="fail" style=" display : none; ">
                <strong>Incorrect user credential.</strong> Please try again
              </div>

            </form>

            <div class="d-flex my-4">
              <p>Don't have an account ? <a href="signUp.php">Create Now</a></p>
            </div>

          </div>
        </div>
      </div>
    </section>


    
    <!-- Hero Section End -->




    <!-- Footer Start -->
    <div class="container">  
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
      <p class="col-md-4 mb-0 text-muted">© 2024 EzQuiz, All rights reserved</p>
    </footer>
    </div>
    <!-- Footer End -->






    



    <?php
    
    if(isset($_POST["login"])){


        $count = 0;
        $res = mysqli_query($conn,"select * from registration where email ='$_POST[email]' && password = '$_POST[pass]'");
        $row = mysqli_fetch_array($res);
        $count = mysqli_num_rows($res);

        if($count == 0){

            ?>

            <script type="text/javascript">
            document.getElementById("fail").style.display = "block";
            </script>

            <?php

        }
        else{

            $_SESSION["username"] = $row["name"];
                        
            ?>
            
            <script type="text/javascript">
            window.location = "home.php";
            </script>

            <?php
        }

    }
    
    ?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>