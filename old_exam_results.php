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

<?php
include("config.php");
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EzQuiz - Results</title>
    
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
            <div class="sub-heading">
                <h2 class="mb-2">Old exam results</h2>

                <?php

                $count = 0;
                $res = mysqli_query($conn,"select * from exam_results where username = '$_SESSION[username]' order by id desc");
                $count = mysqli_num_rows($res);

                if($count == 0)
                {
                    ?>
                    <center><h6 class="mt-5">No results found</h6></center>
                    <?php
                }
                else{
                    
                    ?>

                    <div class="table-responsive mt-5 px-5">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr style="background-color:rgb(106, 74, 238); color:white;">
                                                    <th>SL NO.</th>
                                                    <th>Username</th>
                                                    <th>Subject</th>
                                                    <th>Total Questions</th>
                                                    <th>Correct Answer</th>
                                                    <th>Wrong Answer</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count_sl = 0;
                                                while ($row = mysqli_fetch_array($res)) {
                                                    $count_sl++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $count_sl; ?></td>
                                                        <td><?php echo htmlspecialchars($row["username"]); ?></td>
                                                        <td><?php echo htmlspecialchars($row["exam_type"]); ?></td>
                                                        <td><?php echo htmlspecialchars($row["total_question"]); ?></td>
                                                        <td><?php echo htmlspecialchars($row["correct_answer"]); ?></td>
                                                        <td><?php echo htmlspecialchars($row["wrong answer"]); ?></td>
                                                        <td><?php echo htmlspecialchars($row["exam_time"]); ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                    <?php

                }

                ?>


                
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