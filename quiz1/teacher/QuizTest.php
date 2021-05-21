<?php include '../config.php'; ?>
<?php
//checkAuth('Admin');


$qry = "SELECT questions.*,options.* FROM questions  INNER JOIN options ON questions.Question=options.quesID WHERE questions.subjectID='Introduction to programming'";

$results = mysqli_query($con,$qry);//questions

if(!empty($_POST)) 
{
	$answers= $_POST['answers'];//$result['option1']
echo $answers;//show answer

	
}
?>


<?php include 'header.php'; ?>




        <div class="m-auto pt-5">
            <h2 class="text-center text-secondary">
Quiz</h2>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6 m-auto p-5">
                <form method="POST" action="QuizTest.php">


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-secondary"><span class="text-success">T</span>eachers</h1>
    </div>




<div>
<?php
                foreach($results as $result)
				{
					echo "<br>".
                       "<h2>".$result['Question']."</h2>"."<br>";
					  $optionsT= $result['options'];
					if($optionsT==3)
					{
						?>
						<input type="radio" id="<?php $result['option1'] ?>" name="answers" value="<?php $result['option1'] ?>">
  <label for="<?php $result['option1'] ?>"><?php echo $result['option1'] ?></label><br>
  
  
  <input type="radio" id="<?php $result['option2'] ?>" name="answers" value="<?php $result['option2'] ?>">
  <label for="<?php $result['option2'] ?>"><?php echo $result['option2'] ?></label><br>
  <input type="radio" id="<?php $result['option3'] ?>" name="answers" value="<?php $result['option3'] ?>">
  <label for="<?php $result['option3'] ?>"><?php echo $result['option3'] ?></label><br>
		<?php	
					}
					else  if($optionsT==2)
					{
                    ?>	
<input type="radio" id="<?php $result['option1'] ?>" name="answers" value="<?php $result['option1'] ?>">
  <label for="<?php $result['option1'] ?>"><?php echo $result['option1'] ?></label><br>
  
  
  <input type="radio" id="<?php $result['option2'] ?>" name="answers" value="<?php $result['option2'] ?>">
  <label for="<?php $result['option2'] ?>"><?php echo $result['option2'] ?></label><br>

					
<?php	
					}
					else  if($optionsT==4)
					{
                    ?>


						<input type="radio" id="<?php $result['option1'] ?>" name="answers" value="<?php $result['option1'] ?>">
  <label for="<?php $result['option1'] ?>"><?php echo $result['option1'] ?></label><br>
  
  
  <input type="radio" id="<?php $result['option2'] ?>" name="answers" value="<?php $result['option2'] ?>">
  <label for="<?php $result['option2'] ?>"><?php echo $result['option2'] ?></label><br>
  <input type="radio" id="<?php $result['option3'] ?>" name="answers" value="<?php $result['option3'] ?>">
  <label for="<?php $result['option3'] ?>"><?php echo $result['option3'] ?></label><br>

<input type="radio" id="<?php $result['option4'] ?>" name="answers" value="<?php $result['option4'] ?>">
  <label for="<?php $result['option4'] ?>"><?php echo $result['option4'] ?></label><br>

					
					<?php	
					}
					else  if($optionsT==5)
					{
                    ?>
					   
					   <input type="radio" id="<?php $result['option1'] ?>" name="answers" value="<?php $result['option1'] ?>">
  <label for="<?php $result['option1'] ?>"><?php echo $result['option1'] ?></label><br>
  
  
  <input type="radio" id="<?php $result['option2'] ?>" name="answers" value="<?php $result['option2'] ?>">
  <label for="<?php $result['option2'] ?>"><?php echo $result['option2'] ?></label><br>
  <input type="radio" id="<?php $result['option3'] ?>" name="answers" value="<?php $result['option3'] ?>">
  <label for="<?php $result['option3'] ?>"><?php echo $result['option3'] ?></label><br>
  <input type="radio" id="<?php $result['option4'] ?>" name="answers" value="<?php $result['option4'] ?>">
  <label for="<?php $result['option4'] ?>"><?php echo $result['option4'] ?></label><br>
  <input type="radio" id="<?php $result['option5'] ?>" name="answers" value="<?php $result['option5'] ?>">
  <label for="<?php $result['option5'] ?>"><?php echo $result['option5'] ?></label><br>
  
               </div>        
                        
               <?php 
					}
			   
                ?>


<button type="submit" class="btn btn-success w-100">Submit</button>

                </form>
   <?php 
					}
			   
                ?>
<?php include 'footer.php'; ?>