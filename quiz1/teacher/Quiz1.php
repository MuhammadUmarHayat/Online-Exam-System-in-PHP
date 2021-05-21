


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
if (mysqli_num_rows($result) > 0) {
	
              $i=1;
			  while($row1 = mysqli_fetch_assoc($result)) {

?>
<br>
                  <div class="card">
                     <br>
                     <p class="card-header">  <?php echo $i ." : ". $row1['Question']; ?> </p>
                    
                     
                           
                     <div class="card-block">
					 
										 
                        
                        <br>
                     
<?php //test  


$optionsT= $row1['options'];

					if($optionsT==3)
					{
						?>
						<input type="radio" id="<?php $row1['option1'] ?>" name="answers" value="<?php $row1['option1'] ?>">
  <label for="<?php $row1['option1'] ?>"><?php echo $row1['option1'] ?></label><br>
  
  
  <input type="radio" id="<?php $row1['option2'] ?>" name="answers" value="<?php $row1['option2'] ?>">
  <label for="<?php $row1['option2'] ?>"><?php echo $row1['option2'] ?></label><br>
  <input type="radio" id="<?php $row1['option3'] ?>" name="answers" value="<?php $row1['option3'] ?>">
  <label for="<?php $row1['option3'] ?>"><?php echo $row1['option3'] ?></label><br>
		<?php	
					}
					else  if($optionsT==2)
					{
                    ?>	
<input type="radio" id="<?php $row1['option1'] ?>" name="answers" value="<?php $row1['option1'] ?>">
  <label for="<?php $row1['option1'] ?>"><?php echo $row1['option1'] ?></label><br>
  
  
  <input type="radio" id="<?php $row1['option2'] ?>" name="answers" value="<?php $row1['option2'] ?>">
  <label for="<?php $row1['option2'] ?>"><?php echo $row1['option2'] ?></label><br>

					
<?php	
					}
					else  if($optionsT==4)
					{
                    ?>


						<input type="radio" id="<?php $row1['option1'] ?>" name="answers" value="<?php $row1['option1'] ?>">
  <label for="<?php $row1['option1'] ?>"><?php echo $row1['option1'] ?></label><br>
  
  
  <input type="radio" id="<?php $row1['option2'] ?>" name="answers" value="<?php $row1['option2'] ?>">
  <label for="<?php $row1['option2'] ?>"><?php echo $row1['option2'] ?></label><br>
  <input type="radio" id="<?php $row1['option3'] ?>" name="answers" value="<?php $row1['option3'] ?>">
  <label for="<?php $row1['option3'] ?>"><?php echo $row1['option3'] ?></label><br>

<input type="radio" id="<?php $row1['option4'] ?>" name="answers" value="<?php $row1['option4'] ?>">
  <label for="<?php $row1['option4'] ?>"><?php echo $row1['option4'] ?></label><br>

					
					<?php	
					}
					else  if($optionsT==5)
					{
                    ?>
					   
					   <input type="radio" id="<?php $row1['option1'] ?>" name="answers" value="<?php $row1['option1'] ?>">
  <label for="<?php $row1['option1'] ?>"><?php echo $row1['option1'] ?></label><br>
  
  
  <input type="radio" id="<?php $row1['option2'] ?>" name="answers" value="<?php $row1['option2'] ?>">
  <label for="<?php $row1['option2'] ?>"><?php echo $row1['option2'] ?></label><br>
  <input type="radio" id="<?php $row1['option3'] ?>" name="answers" value="<?php $row1['option3'] ?>">
  <label for="<?php $row1['option3'] ?>"><?php echo $row1['option3'] ?></label><br>
  <input type="radio" id="<?php $row1['option4'] ?>" name="answers" value="<?php $row1['option4'] ?>">
  <label for="<?php $row1['option4'] ?>"><?php echo $row1['option4'] ?></label><br>
  <input type="radio" id="<?php $row1['option5'] ?>" name="answers" value="<?php $row1['option5'] ?>">
  <label for="<?php $row1['option5'] ?>"><?php echo $row1['option5'] ?></label><br>
  


<?php	
					}

 ?>
					 
					 
					 
					 
					 
					 </div><?php //test card block   ?>
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
                     <?php
               $i++;         
			  }
} 
                     ?>
                  </div>
 <br>
                  <input type="submit" name="submit" Value="Submit" class="btn btn-success m-auto d-block" /> <br>
               </form>

<?php include 'footer.php'; ?>