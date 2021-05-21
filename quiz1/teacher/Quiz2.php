<?php include '../config.php'; ?>
<?php
//checkAuth('Admin');
$qry = "SELECT questions.*,options.* FROM questions  INNER JOIN options ON questions.Question=options.quesID WHERE questions.subjectID='Introduction to programming'";

$result = mysqli_query($con,$qry);//questions
 if(isset($_POST['submit']))
 {
if(!empty($_POST)) 
{
	$answers= $_POST['answers'];//$result['option1']
echo $answers;//show answer

	
}
 }
?>


<?php include 'header.php'; ?>
<div>
 <form  method="post" action="Quiz1.php">
 
<?php
if (mysqli_num_rows($result) > 0) 
{
	
              $i=1;
			  while($row1 = mysqli_fetch_assoc($result)) 
			  {

?>
<br>
                  <div class="card">
                     <br>
                     <p class="card-header">  <?php echo $i ." : ". $row1['Question']; ?> </p>
                    
                   <?php  $optionsT= $row1['options']; 
				   
				   ?>
				   <?php 
                         if($optionsT==2)
					{
						?> 
						
                     <div class="card-block">
					 
<input type="radio" name="quizcheck[<?php echo $row1['Question']; ?>]" id="<?php echo $row1['option1']; ?>" value="<?php echo $row1['option1']; ?>" > <?php echo $row1['option1']; ?> 
                        <br>
<input type="radio" name="quizcheck[<?php echo $row1['Question']; ?>]" id="<?php echo $row1['option2']; ?>" value="<?php echo $row1['option2']; ?>" > <?php echo $row1['option2']; ?> 
                        <br>
                        <br>
						</div>
						
					 <?php	
					 }
					else  if($optionsT==3)
					{
                    ?>
						
					<div class="card-block">
					 
<input type="radio" name="quizcheck[<?php echo $row1['Question']; ?>]" id="<?php echo $row1['option1']; ?>" value="<?php echo $row1['option1']; ?>" > <?php echo $row1['option1']; ?> 
                        <br>
<input type="radio" name="quizcheck[<?php echo $row1['Question']; ?>]" id="<?php echo $row1['option2']; ?>" value="<?php echo $row1['option2']; ?>" > <?php echo $row1['option2']; ?> 
                        <br>
<input type="radio" name="quizcheck[<?php echo $row1['Question']; ?>]" id="<?php echo $row1['option3']; ?>" value="<?php echo $row1['option3']; ?>" > <?php echo $row1['option3']; ?> 	
						
						
                        <br>
						</div>	
						
 		 <?php	
					 }
					else  if($optionsT==4)
					{
                    ?>
						
					<div class="card-block">
					 
<input type="radio" name="quizcheck[<?php echo $row1['Question']; ?>]" id="<?php echo $row1['option1']; ?>" value="<?php echo $row1['option1']; ?>" > <?php echo $row1['option1']; ?> 
                        <br>
<input type="radio" name="quizcheck[<?php echo $row1['Question']; ?>]" id="<?php echo $row1['option2']; ?>" value="<?php echo $row1['option2']; ?>" > <?php echo $row1['option2']; ?> 
                        <br>
<input type="radio" name="quizcheck[<?php echo $row1['Question']; ?>]" id="<?php echo $row1['option3']; ?>" value="<?php echo $row1['option3']; ?>" > <?php echo $row1['option3']; ?> 	
						
											<br>
<input type="radio" name="quizcheck[<?php echo $row1['Question']; ?>]" id="<?php echo $row1['option4']; ?>" value="<?php echo $row1['option4']; ?>" > <?php echo $row1['option4']; ?> 	
						
						
                        <br>
						</div>	
						
					 <?php	
					 }
					else  if($optionsT==5)
					{
                    ?>
					
					<div class="card-block">
					 
<input type="radio" name="quizcheck[<?php echo $row1['Question']; ?>]" id="<?php echo $row1['option1']; ?>" value="<?php echo $row1['option1']; ?>" > <?php echo $row1['option1']; ?> 
                        <br>
<input type="radio" name="quizcheck[<?php echo $row1['Question']; ?>]" id="<?php echo $row1['option2']; ?>" value="<?php echo $row1['option2']; ?>" > <?php echo $row1['option2']; ?> 
                        <br>
<input type="radio" name="quizcheck[<?php echo $row1['Question']; ?>]" id="<?php echo $row1['option3']; ?>" value="<?php echo $row1['option3']; ?>" > <?php echo $row1['option3']; ?> 	
						
											<br>
<input type="radio" name="quizcheck[<?php echo $row1['Question']; ?>]" id="<?php echo $row1['option4']; ?>" value="<?php echo $row1['option4']; ?>" > <?php echo $row1['option4']; ?> 	
						
						<br>
<input type="radio" name="quizcheck[<?php echo $row1['Question']; ?>]" id="<?php echo $row1['option5']; ?>" value="<?php echo $row1['option5']; ?>" > <?php echo $row1['option5']; ?> 	
						
                        <br>
						</div>	
					
					
                     <?php
					}
               $i++;         
			  }
} 
                     ?>
                  </div>
 <br>
                  <input type="submit" name="submit" Value="Submit" class="btn btn-success m-auto d-block" /> <br>
               </form>

<?php include 'footer.php'; ?>