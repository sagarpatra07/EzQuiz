<?php

session_start();
include("../config.php");

if(!isset($_SESSION["admin"]))
{
    ?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>
    <?php
}


$id = $_GET['id'];
$exam_category = "";
$res = mysqli_query($conn,"select * from examCategory where id =$id");
while($row = mysqli_fetch_array($res))
{
    $exam_category = $row["category"];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EzQuiz Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css_admin/admin.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


    

        <!-- Start of Sidebar -->
        <?php
        include("sidebar.php");
        ?>
        <!-- End of Sidebar -->





        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">



                <!-- Start of Topbar -->
                <?php
                include("topbar.php");
                ?>
                <!-- End of Topbar -->




                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="col-12 d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add Questions inside <?php echo $exam_category; ?></h1>
                    </div>

                    
                    <div class="row">
                        <div class="card-body">
                          
                          <form name="form1" action="" method="POST">
                                <div class="container">
                                    <div class="mb-3">
                                        <label for="examCategory" class="form-label">Add Question</label>
                                        <input type="text" class="form-control" name="question" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="examTime" class="form-label">Option 1</label>
                                        <input type="text" class="form-control" name="opt1" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="examTime" class="form-label">Option 2</label>
                                        <input type="text" class="form-control" name="opt2" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="examTime" class="form-label">Option 3</label>
                                        <input type="text" class="form-control" name="opt3" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="examTime" class="form-label">Option 4</label>
                                        <input type="text" class="form-control" name="opt4" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="examTime" class="form-label">Answer</label>
                                        <input type="text" class="form-control" name="answer" required>
                                    </div>
                                    <button type="submit" name="submit1" class="btn btn-primary btn-lg rounded-pill" style="padding-left: 2rem; padding-right: 2rem;">Add Question</button>
                                </div>
                            </form>
                            


                        </div>
                    </div>


                    <!-- Content Row -->
                    
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



            <?php 
            if (isset($_POST["submit1"])) {

                $loop=0;
                $count=0;

                $res = mysqli_query($conn,"select * from questions where category='$exam_category' order by id asc") or die(mysqli_error($conn));
                $count = mysqli_num_rows($res);

                if($count==0)
                {

                }
                else{
                    while($row=mysqli_fetch_array($res))
                    {
                        $loop=$loop + 1;
                        mysqli_query($conn,"update questions set question_no='$loop' where id = $row[id]");
                    }
                }

                $loop = $loop + 1;
                // Sanitize and validate input
                $question = mysqli_real_escape_string($conn, trim($_POST['question']));
                $opt1 = mysqli_real_escape_string($conn, trim($_POST['opt1']));
                $opt2 = mysqli_real_escape_string($conn, trim($_POST['opt2']));
                $opt3 = mysqli_real_escape_string($conn, trim($_POST['opt3']));
                $opt4 = mysqli_real_escape_string($conn, trim($_POST['opt4']));
                $answer = mysqli_real_escape_string($conn, trim($_POST['answer']));

                // Check if exam time is a positive integer
                
                    // Prepare the SQL statement
                    $query = "INSERT INTO questions VALUES(NULL, '$loop', '$question', '$opt1', '$opt2', '$opt3', '$opt4', '$answer', '$exam_category')";
                    $result = mysqli_query($conn, $query);

                    if ($result) {

                        ?>
                            <script type="text/javascript">
                            alert('Question added successfully');
                            window.location.href=window.location.href;
                            </script>
                        <?php
                        
                    } else {
                        echo "<script type='text/javascript'>alert('Error adding Question: " . mysqli_error($conn) . "');</script>";
                    }
                
            }
            ?>

            

            

    



            <!-- Start of Footer -->
            <?php
            include("footer.php");
            ?>
            
            <!-- End of Footer -->


            

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>



            