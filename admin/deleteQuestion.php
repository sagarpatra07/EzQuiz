<?php
include("../config.php");

$id = $_GET["id"];
mysqli_query($conn,"delete from questions where id = $id");
?>

<script type="text/javascript">
    window.location.href="view_questions.php";
</script>