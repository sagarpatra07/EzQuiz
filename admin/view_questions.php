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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <h1 class="h3 mb-2 text-gray-800">All Questions</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow my-4">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">View All Questions</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="background-color:rgb(106, 74, 238); color:white;">
                                            <th>SL NO.</th>
                                            <th>Category</th>
                                            <th>Question</th>
                                            <th>Option 1</th>
                                            <th>Option 2</th>
                                            <th>Option 3</th>
                                            <th>Option 4</th>
                                            <th>Answer</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                            <?php
                                            $count = 0;
                                            $res = mysqli_query($conn, "SELECT * FROM questions");
                                            while ($row = mysqli_fetch_array($res)) {
                                                $count++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo htmlspecialchars($row["category"]); ?></td>
                                                    <td><?php echo htmlspecialchars($row["question"]); ?></td>
                                                    <td><?php echo htmlspecialchars($row["opt1"]); ?></td>
                                                    <td><?php echo htmlspecialchars($row["opt2"]); ?></td>
                                                    <td><?php echo htmlspecialchars($row["opt3"]); ?></td>
                                                    <td><?php echo htmlspecialchars($row["opt4"]); ?></td>
                                                    <td><?php echo htmlspecialchars($row["answer"]); ?></td>
                                                    <td><a href="deleteQuestion.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


                
            </div>

            <?php 
            if (isset($_POST["submit_form"])) {
                // Sanitize and validate input
                $examname = mysqli_real_escape_string($conn, trim($_POST['examname']));
                $examtime = (int)$_POST['examtime']; // Ensure exam time is an integer

                // Check if exam time is a positive integer
                
                    // Prepare the SQL statement
                    $query = "INSERT INTO examCategory (id, category, exam_time) VALUES (NULL,'$examname', '$examtime')";
                    $result = mysqli_query($conn, $query);

                    if ($result) {

                        ?>
                            <script type="text/javascript">
                            alert('Exam added successfully');
                            window.location.href=window.location.href;
                            </script>
                        <?php
                        
                    } else {
                        echo "<script type='text/javascript'>alert('Error adding exam: " . mysqli_error($conn) . "');</script>";
                    }
                
            }
            ?>

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