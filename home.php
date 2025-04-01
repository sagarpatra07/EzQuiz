<?php
session_start();
if(!isset($_SESSION["username"]))
{
    ?>
    <script type="text/javascript">
    window.location = "index.php";
    </script>
    <?php
}
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

        main {
        flex-grow: 1;
        display:flex;
        flex-direction:column;
        
        }

        header {
        height:10%;
        z-index: 2;
        }

        footer {
        height: 10%;
        }



      .category-card {
          background-color:rgb(106, 74, 238);
            border-radius: 20px;
            padding: 20px;
            color: #fff;
            text-align: center;
            transition: transform 0.2s;
        }
        .category-card:hover {
            transform: scale(1.05);
        }
        .category-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }
        .category-description {
            font-size: 14px;
            opacity: 0.7;
        }
        .wrapper {
            background-color: white;
            border-radius: 25px;
            padding: 150px 0px;
            margin-bottom: 50px;
            margin-top: 50px;
        }
        .sub-heading{
          padding:0px 20px 60px 20px;
        }
    </style>
  </head>
  <body>
    
        <!-- Navbar Start -->
        <header>
            <?php
            include("header.php");
            ?>
        </header>
        <!-- Navbar End -->




        <!-- Hero Section Start -->
        <main>
            <div class="px-4 text-center">
                <div class="container wrapper text-center py-5"> 
                        
                            <div class="overflow-hidden">
                                <div class="container px-5 mb-4">
                                    <img src="files/homepage.png" class="img-fluid" alt="Example image" width="700" height="500" loading="lazy">
                                </div>
                            </div>
                            
                            <div class="col-lg-6 mx-auto">
                                <h1 class="display-4 fw-bold">Unlock Your Curiosity</h1>
                                <p class="lead">Take Quizzes, Discover New Insights, and Challenge Your Knowledge at EzQuiz!</p>
                                <div class="d-grid d-sm-flex justify-content-sm-center">
                                    <a href="subject.php" type="button" class="btn btn-primary btn-lg px-4 rounded-pill">Take Quiz</a>           
                                </div>
                            </div>                
            
                </div>
            </div>
        </main>
        <!-- Hero Section End -->




        <!-- Footer Start -->
        <footer>
            <?php
            include("footer.php");
            ?>
        </footer>
        <!-- Footer End -->
    


    

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>