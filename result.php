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


include("config.php");

$date = date("Y-m-d H:i:s");
$_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date."+ $_SESSION[exam_time] minutes"));

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
        .subject_name{
            font-size:16px;
            font-weight: 600;
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

            <div class="container wrapper text-center">
            
            <?php
            
            $correct=0;
            $wrong=0;

            if(isset($_SESSION["answer"]))
            {
                for($i=1;$i<= sizeof($_SESSION["answer"]);$i++)
                {
                    $answer = "";
                    $res = mysqli_query($conn,"select * from questions where category = '$_SESSION[exam_category]' && question_no= $i");

                    while($row = mysqli_fetch_array($res))
                    {
                        $answer = $row["answer"];
                    }

                    if(isset($_SESSION["answer"][$i]))
                    {
                        if($answer == $_SESSION["answer"][$i])
                        {
                            $correct = $correct + 1;
                        }
                        else
                        {
                            $wrong = $wrong + 1;
                        }
                    }

                    else
                    {
                        $wrong = $wrong + 1;
                    }

                }
            }
                $count = 0;
                $res = mysqli_query($conn,"select * from questions where category = '$_SESSION[exam_category]'");

                $count = mysqli_num_rows($res);
                $wrong = $count - $correct;


                ?>
                <h1 class="mb-2" style="color: rgb(106, 74, 238);"><strong>Congratulation</strong></h1>
                <div class="subject_name mt-3" style="color: rgb(169,169,169);">Subject : &nbsp; <?php echo $_SESSION["exam_category"]?> </div>

                <h5 class="mt-4" style="font-size:22px; font-weight:600;">You answered</h4>

                <p class="mb-1" style="color: rgb(106, 74, 238); font-size:50px; font-weight:800;"> <?php echo $correct;?> / <?php echo $count;?> </p>

                <h5 class="mt-1" style="font-size:22px; font-weight:600;">question correct</h4>

                <a href="home.php" type="button" class="btn btn-primary btn-lg px-4 mt-4  rounded-pill">Back to Home</a>
                


            </div>

        </div>
    </main>    
    <!-- Hero Section End -->


    <?php
    
    if(isset($_SESSION["exam_start"]))
    {
        $date = date("Y-m-d");

        $query1 = "INSERT INTO exam_results VALUES (NULL,'$_SESSION[username]', '$_SESSION[exam_category]', '$count', '$correct', '$wrong', '$date')";
        mysqli_query($conn, $query1);

        if(isset($_SESSION["exam_start"]))
        {
            unset($_SESSION["exam_start"]);
            ?>

            <script type="text/javascript">
                window.location.href = window.location.href;
            </script>

            <?php
        }
    }

    ?>
    


    <!-- Footer Start -->
    <footer>
        <?php
        include("footer.php");
        ?>
    </footer>
    <!-- Footer End -->

    

    <script type="text/javascript">
    
    
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>