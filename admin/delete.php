<?php
include("../config.php");

$id = $_GET["id"];
mysqli_query($conn,"delete from examCategory where id = $id");

?>

<script type="text/javascript">
    window.location = "exam_category.php";
</script>