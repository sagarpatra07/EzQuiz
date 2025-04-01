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
            font-size:20px;
            font-weight: 600;
        }

        .quiz-container {
      background: #fff;
      border-radius: 8px;
      padding: 20px;
      text-align: center;
    }

    .quiz-header {
      font-size: 18px;
      margin-bottom: 10px;
      color: #555;
    }

    .quiz-question {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #333;
    }

    .quiz-options {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
      margin-bottom: 20px;
    }

    .quiz-options label {
      display: block;
      background: #f3f3f9;
      border: 1px solid #d0d0d7;
      border-radius: 6px;
      padding: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .quiz-options input {
      display: none;
    }

    .quiz-options input:checked + label {
      background: #e5e7ff;
      border-color: #5b6ef8;
      color: #5b6ef8;
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
     
     <div class="container wrapper px-4 py-3">

        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 d-flex justify-content-between">

            <div class="subject_name">Subject : &nbsp; <?php echo $_SESSION["exam_category"]?> </div>
            <div style="display: block;">
                <strong>Time Left : &nbsp; <span id="countdowntimer"></span></strong>
            </div>
       
        </div>

            <div class="quiz-container">
                <div class="quiz-header my-4">
                    <strong><span id="current_que">0</span> / <span id="total_que">0</span></strong>
                </div>

                <div id="load_questions">
                </div>
                
               
                <div class="buttons my-5">
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4 me-sm-3 rounded-pill" value="Previous" onclick="load_previous();">Previous Question</button>
                    <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3 rounded-pill" value="Next" onclick="load_next();">Next Question</button>
                </div>
                
            </div>
     </div>
    
    

      
    </main>
    <!-- Hero Section End -->


    
    <script type="text/javascript">



        function load_total_que()
        {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("total_que").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET","forajax/load_total_que.php",true);
            xmlhttp.send(null);
        }






        let questionno="1";
        load_questions(questionno);

        function load_questions(questionno)
        {
            document.getElementById("current_que").innerHTML = questionno;
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    if(xmlhttp.responseText=="over")
                    {
                        window.location="result.php";
                    }
                    else{
                        document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
                        load_total_que();
                    }

                }
            };
            xmlhttp.open("GET","forajax/load_questions.php?questionno="+ questionno,true);
            xmlhttp.send(null);
        }





        function radioclick(radiovalue,questionno)
        {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("total_que").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET","forajax/save_answer_in_session.php?questionno="+ questionno +"&value1="+radiovalue,true);
            xmlhttp.send(null);
        }







        function load_previous()
        {
            if(questionno == "1")
            {
                load_questions(questionno);
            }
            else{
                questionno=eval(questionno)-1;
                load_questions(questionno);
            }
        }



        function load_next()
        {
            questionno=eval(questionno)+1;
            load_questions(questionno);
        }




    </script>
    










    <!-- Footer Start -->
    <footer>
        <?php
        include("footer.php");
        ?>
    </footer>
    <!-- Footer End -->




    

    <script type="text/javascript">
    setInterval(function(){
        timer();
    },1000);
    function timer()
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                if(xmlhttp.responseText=="00:00:01")
                {
                    window.location="result.php";
                }

                document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;

            }
        };
        xmlhttp.open("GET","forajax/load_timer.php",true);
        xmlhttp.send(null);

       
    }

    </script>

    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>