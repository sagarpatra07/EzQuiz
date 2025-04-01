<?php

session_start();
include("../config.php");

$question_no="";
$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";

$count=0;
$ans="";


$queno=$_GET["questionno"];

if(isset($_SESSION["answer"][$queno]))
{
    $ans=$_SESSION["answer"][$queno];
}

$res=mysqli_query($conn,"select * from questions where category = '$_SESSION[exam_category]' && question_no = '$queno'");
$count=mysqli_num_rows($res);

if($count == 0)
{
    echo "over";
}
else
{
    while($row=mysqli_fetch_array($res))
    {
        $question_no = $row["question_no"];
        $question = $row["question"];
        $opt1 = $row["opt1"];
        $opt2 = $row["opt2"];
        $opt3 = $row["opt3"];
        $opt4 = $row["opt4"];
    }
    ?>

                <div class="quiz-question my-4">
                    <?php echo $question_no .".". $question; ?>
                </div>
                <div class="quiz-options my-5">                      
                            
                        
                        
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="<?php echo $opt1; ?>" onclick="radioclick(this.value,<?php echo $question_no; ?>)"
                        <?php
                            if($ans == $opt1){
                                echo "checked";
                            }
                        ?>>
                        <label class="form-check-label rounded-pill" for="flexRadioDefault1">
                            <?php echo $opt1; ?>
                        </label>
                        
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="<?php echo $opt2; ?>" onclick="radioclick(this.value,<?php echo $question_no; ?>)"
                        <?php
                            if($ans == $opt2){
                                echo "checked";
                            }
                        ?>>
                        <label class="form-check-label rounded-pill" for="flexRadioDefault2">
                            <?php echo $opt2; ?>
                        </label>
                        
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="<?php echo $opt3; ?>" onclick="radioclick(this.value,<?php echo $question_no; ?>)"
                        <?php
                            if($ans == $opt3){
                                echo "checked";
                            }
                        ?>>
                        <label class="form-check-label rounded-pill" for="flexRadioDefault3">
                            <?php echo $opt3; ?>
                        </label>
                        
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4" value="<?php echo $opt4; ?>" onclick="radioclick(this.value,<?php echo $question_no; ?>)"
                        <?php
                            if($ans == $opt4){
                                echo "checked";
                            }
                        ?>>
                        <label class="form-check-label rounded-pill" for="flexRadioDefault4">
                            <?php echo $opt4; ?>
                        </label>
                        
                    </div>

                </div>

    <?php
}

?>