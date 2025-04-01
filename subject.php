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
            <div class="sub-heading">
                <h2 class="mb-2"> See how many questions you can answer correctly!</h2>
                <p class="lead">Challenge Your Knowledge, One Question at a Time !</p>
            </div>
            
            <div class="row justify-content-center">

            <?php
            $result = mysqli_query($conn,"select * from examCategory");
            while($rows=mysqli_fetch_array($result))
            {
                ?>
                    <div class="col-6 col-md-4 mx-2 my-4">
                        <div class="category-card">
                            <div class="category-icon"><i class="bi bi-laptop"></i></div>
                            <h5><?php echo $rows["category"];?></h5>
                            <p class="category-description">Quiz time : <?php echo $rows["exam_time"]; ?> Minutes</p>
                            
                            <button type="button" class="btn btn-outline-light rounded-pill mt-2" data-mdb-ripple-init data-mdb-ripple-color="dark" value="<?php echo $rows["category"];?>" onclick="set_exam_type_session(this.value);">Start Quiz</button>
                            
                        </div>
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

    

    <script type="text/javascript">
    
    function set_exam_type_session(exam_category)
    {

        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location = "dashboard.php";
            }
        };
        xmlhttp.open("GET","forajax/set_exam_type_session.php?exam_category="+ exam_category,true);
        xmlhttp.send(null);
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>