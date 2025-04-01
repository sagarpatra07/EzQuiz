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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>EzQuiz Admin - Exam Results</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    
    

    
    <link href="css_admin/admin.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include("sidebar.php"); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include("topbar.php"); ?>




                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Exam Results</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow my-4">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">View All Results</h6>
                        </div>

                        <?php

                        $count = 0;
                        $res = mysqli_query($conn,"select * from exam_results order by id desc");
                        $count = mysqli_num_rows($res);

                        if($count == 0)
                        {
                            ?>
                            <center><h6 class="mt-5">No results found</h6></center>
                            <?php
                        }
                        else{
                
                            ?>

                        <div class="card-body">
                            <div class="table-responsive">
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

                                <?php

            }

            ?>
                            </div>
                        </div>
                    </div>

                </div>


                
            </div>

            

            <?php include("footer.php"); ?>
        </div>
    </div>




    
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>
</html>