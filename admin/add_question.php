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
                        <h1 class="h3 mb-0 text-gray-800">Add Questions for an Exam</h1>
                    </div>

                    
                    <div class="row">
                        <div class="card-body">




                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                                <thead>
                                                    <tr style="background-color:rgb(106, 74, 238); color:white;">
                                                        <th>SL NO.</th>
                                                        <th>Exam Name</th>
                                                        <th>Exam Time</th>
                                                        <th>Add Question</th>
                                                    </tr>
                                                </thead>


                                                <tbody>

                                                <?php

                                                $count = 0;
                                                
                                                $res = mysqli_query($conn, "select * from examCategory");
                                                while ($row = mysqli_fetch_array($res)){
                                                    $count = $count + 1;
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $row["category"]; ?></td>
                                                        <td><?php echo $row["exam_time"]; ?></td>
                                                        <td><a href="add_exam_question.php?id=<?php echo $row["id"]; ?>">Select</a></td>
                                                    </tr>

                                                    <?php

                                                }
                                                
                                                ?>
                                                                               
                                                </tbody>
                                </table>
                            


                        </div>
                    </div>


                    <!-- Content Row -->
                    
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            

            

    



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



            