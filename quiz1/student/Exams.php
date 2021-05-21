<?php include '../config.php'; ?>
<?php include 'header.php'; 


?>
<script type="text/javascript">
    setInterval(function() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "response.php", false);
        xmlhttp.send(null);

        console.log(xmlhttp.responseText)
        if (xmlhttp.responseText == "0") 
		{
            window.location = "endPage.php"
        }
        document.getElementById("response").innerHTML = xmlhttp.responseText;
    }, 1000);
</script>
<?php
//TakeExam.php;
  $user = $_SESSION['auth'];
   echo "<h2>". $user."<h2><br>";//student Name
 
  echo "<h1> Subject Name : ". $_SESSION['subjectsName']."<h1><br>";//Subject Name
  echo "<h1> Total Questions : ". $_SESSION['TotalQuestions']."<h1><br>";//Total Questions
    echo "<h1> Total Marks : ". $_SESSION['TotalMarks']."<h1><br>";
   //=$TotalMarks;
  
   $subjectsName= $_SESSION['subjectsName'];
 $TotalQuestions=$_SESSION['TotalQuestions'];
  $QuestionNo= $_SESSION['QuestionNo'];
  
 //$user,  $subjectsName,$TotalQuestions
     
?>
<?php

if($QuestionNo==1)
  {
	//echo "<h1> Question No :".$QuestionNo ."<h1><br>";
	  
	 $qry = "SELECT * from  studentquiz WHERE Subject='$subjectsName' and QuestionNo=1";

    $result = mysqli_query($con,$qry);//questions

	  
	//$QuestionNo=$QuestionNo+1;  
  
  }
  else
  {
	  
	

	
	  
	  
	  
  }
  ?>
  
  <?php
  if(isset($_POST['done']))
{
	/////////////////////////fetch and save answer ///////////////////////////
	
	
	//step 1 : fetch the question and correct  answer
	$StudentAnswer="";
	$QuestionNo=$_SESSION['QuestionNo'];
	
	
	if($QuestionNo<=$TotalQuestions)
					{
	
	
	
	 $qry4 = "SELECT * from  studentquiz WHERE Subject='$subjectsName' and QuestionNo='$QuestionNo'";

    $result4 = mysqli_query($con,$qry4);//questions
	$row4 = mysqli_fetch_assoc($result4);
	//print_r($row4['qtype']);exit;
	
	 $qtype= $row4['qtype'];

$correctAns= $row4['correct'];
$question= $row4['question'];
$status="done";

$correctOption="";
 $Answer1="";//actual  answer in string
if($correctAns==1)
{
	$correctOption="option1";

   $nQuery="SELECT `option1` FROM `options` WHERE quesID='$question'";
				    $result4a = mysqli_query($con,$nQuery);//questions
	
	
	
	 $row4a = mysqli_fetch_assoc($result4a);
				   
				  // echo $row4a['option1'];
					 $Answer1= $row4a['option1']; //getting the value from the option 

}

else if($correctAns==2){
	$correctOption="option2";
 $nQuery="SELECT `option2` FROM `options` WHERE quesID='$question'";
				    $result4a = mysqli_query($con,$nQuery);
	
	
	
	 $row4a = mysqli_fetch_assoc($result4a);
				   
				   $Answer1= $row4a['option2']; //getting the value from the option 
					    

}

else if($correctAns==3){
	$correctOption="option3";
 $nQuery="SELECT `option3` FROM `options` WHERE quesID='$question'";
				    $result4a = mysqli_query($con,$nQuery);
	
	
	
	 $row4a = mysqli_fetch_assoc($result4a);
				   
				   $Answer1= $row4a['option3']; //getting the value from the option 
					    
}

else if($correctAns==4){
	$correctOption="option4";
 $nQuery="SELECT `option4` FROM `options` WHERE quesID='$question'";
				    $result4a = mysqli_query($con,$nQuery);
	
	
	
	 $row4a = mysqli_fetch_assoc($result4a);
				   
				  $Answer1= $row4a['option4']; //getting the value from the option 
					    

}

else if($correctAns==5)
{
	$correctOption="option5";

 $nQuery="SELECT `option5` FROM `options` WHERE quesID='$question'";
				    $result4a = mysqli_query($con,$nQuery);//questions
	
	
	
	 $row4a = mysqli_fetch_assoc($result4a);
				   
				    $Answer1= $row4a['option5']; //getting the value from the option 
					    


}
			   $marks=0;
				   if($qtype=='mcq')
				   {
					
					    $marks=0;
				   $StudentAnswer=$_POST['option'];
				   
					  // echo "<br>". $StudentAnswer;
					   if($Answer1==$StudentAnswer)//answer is correct
					   {
						$marks=1;
		
						   
					   }
					   else
					   {
						$marks=0; 
					   }
				  $stdName= $_SESSION['auth']; 
						$stdSubject= $_SESSION['subjectsName'];
						
						//echo "Name".$stdName;
						//echo "Subject". $stdSubject;
						
	//save mcq result into the table					
	$q1 ="INSERT INTO `studentanswers`( `StudentName`, `Subject`, `question`, `Answer`, `marks`, `status`, `qtype`) VALUES ('$stdName','$stdSubject','$question','$StudentAnswer','$marks','$status','$qtype')";
	$query = mysqli_query($con,$q1);
					   
					   
				   }//end qtyep=='mcq'
				   else if($qtype=='discriptive')
				   {
					    $StudentAnswer=$_POST['SAnswer'];
						$marks=0; 
						$status="undefine";
						
						
	$stdName= $_SESSION['auth']; 
						$stdSubject= $_SESSION['subjectsName'];
						
						
				//save discriptive answers		
						
	$q1 ="INSERT INTO `studentanswers`( `StudentName`, `Subject`, `question`, `Answer`, `marks`, `status`, `qtype`) VALUES ('$stdName','$stdSubject','$question','$StudentAnswer','$marks','$status','$qtype')";
	$query = mysqli_query($con,$q1);
	
				   }
				   ////stept 2: save the answer
	
	///////////////////////////////////// new question///////////////////////////////
	
	
	$QuestionNo=$QuestionNo+1;
	
	if($QuestionNo<=$TotalQuestions)
					{
	
	
	//echo "<h1> Question No :".$QuestionNo ."<h1> <br>";
	
	 $qry = "SELECT * from  studentquiz WHERE Subject='$subjectsName' and QuestionNo='$QuestionNo'";

    $result = mysqli_query($con,$qry);//questions
	
					}
					else
					{
				
								
						
					//header('Location:http://localhost/quiz1/student/EndQuiz.php');
								
					//exit;	
					}
					
	}//condition
					else
					{
					
					$qM2 = "delete from `studentquiz` where subject= '$subjectsName'";
	 $query3 = mysqli_query($con,$qM2);
					  				  
					
					
					
					header('Location:http://localhost/quiz1/student/EndQuiz.php');
								
						
					}

	
	
	
}
?>

<form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center"> <?php echo $_SESSION['subjectsName'] ?> </h1>
 </div><br>
 
<?php
//print_r ( $result);
//exit;
//echo mysqli_num_rows( $result);
if (empty($result)) 
{
	
	ob_start();//ajax method
	//ob_struct();
	
$_SESSION["duration"] = 0;	

			?>
				//header('Location:http://localhost/quiz1/student/EndQuiz.php');	
			//	header('location:http://localhost/quiz1/student/EndQuiz.php');
			
			<script type="text/javascript">
			window.location.assign("http://localhost/quiz1/student/EndQuiz.php");
			
			
			</script>
				
		<?php	
exit;		
				//header('Location:http://localhost/quiz1/student/Exams.php');
	//exit;
	ob_end_flush();
}
else if (mysqli_num_rows( $result) > 0) 
{
	$row1 = mysqli_fetch_assoc($result);
              $i=$QuestionNo;
		  

?>

<div>

<h2>Time Left :
					 
					 <div id="response">
					 </h2>

</div>
<br>
                  <div class="card">
                     <br>
					 
					 
                     <p class="card-header">  <?php echo $i ." : ". $row1['question']; ?> </p>
                    
                   <?php  $optionsT= $row1['options']; 
				   $qtype= $row1['qtype']; 
				   
				   
				   
				   ?>
				   <?php 
                         if($optionsT==2 && $qtype='mcq')
					{
						?> 
<div class="card-block">
					 
<input type="radio" name="option" id="<?php echo $row1['option1']; ?>" value="<?php echo $row1['option1']; ?>" > <?php echo $row1['option1']; ?> 
                        <br>
<input type="radio" name="option" id="<?php echo $row1['option2']; ?>" value="<?php echo $row1['option2']; ?>" > <?php echo $row1['option2']; ?> 
                        <br>
                        <br>
						</div>
						
					 <?php	
					
					
					
					
					
					
					
					
					 }
					 else  if($optionsT==3 && $qtype='mcq' )
					{
                    ?>
						
					<div class="card-block">
					 
<input type="radio" name="option" id="<?php echo $row1['option1']; ?>" value="<?php echo $row1['option1']; ?>" > <?php echo $row1['option1']; ?> 
                        <br>
<input type="radio" name="option" id="<?php echo $row1['option2']; ?>" value="<?php echo $row1['option2']; ?>" > <?php echo $row1['option2']; ?> 
                        <br>
<input type="radio" name="option" id="<?php echo $row1['option3']; ?>" value="<?php echo $row1['option3']; ?>" > <?php echo $row1['option3']; ?> 	
						
						
                        <br>
						</div>	
						
 		 <?php	
		
					 }
					else  if($optionsT==4 && $qtype='mcq')
					{
                    ?>
					<div class="card-block">
					 
<input type="radio" name="option" id="<?php echo $row1['option1']; ?>" value="<?php echo $row1['option1']; ?>" > <?php echo $row1['option1']; ?> 
                        <br>
<input type="radio" name="option" id="<?php echo $row1['option2']; ?>" value="<?php echo $row1['option2']; ?>" > <?php echo $row1['option2']; ?> 
                        <br>
<input type="radio" name="option" id="<?php echo $row1['option3']; ?>" value="<?php echo $row1['option3']; ?>" > <?php echo $row1['option3']; ?> 	
						
											<br>
<input type="radio" name="option" id="<?php echo $row1['option4']; ?>" value="<?php echo $row1['option4']; ?>" > <?php echo $row1['option4']; ?> 	
						
						
                        <br>
						</div>	
						
					 <?php	
					
					 }
					else  if($optionsT==5 && $qtype='mcq')
					{
                    ?>
					
					<div class="card-block">
					 
<input type="radio" name="option" id="<?php echo $row1['option1']; ?>" value="<?php echo $row1['option1']; ?>" > <?php echo $row1['option1']; ?> 
                        <br>
<input type="radio" name="option" id="<?php echo $row1['option2']; ?>" value="<?php echo $row1['option2']; ?>" > <?php echo $row1['option2']; ?> 
                        <br>
<input type="radio" name="option" id="<?php echo $row1['option3']; ?>" value="<?php echo $row1['option3']; ?>" > <?php echo $row1['option3']; ?> 	
						
											<br>
<input type="radio" name="option" id="<?php echo $row1['option4']; ?>" value="<?php echo $row1['option4']; ?>" > <?php echo $row1['option4']; ?> 	
						
						<br>
<input type="radio" name="option" id="<?php echo $row1['option5']; ?>" value="<?php echo $row1['option5']; ?>" > <?php echo $row1['option5']; ?> 	
						
                        <br>
						</div>	
					
					
                     <?php
					
					}

else  if( $qtype='discriptive')
					{
						echo "<br>";
						?>
						
						
						
						
						<textarea name="SAnswer" class="form-control" >Enter your answer here...</textarea>
						
						<br>
						
					 <?php
					 
					 echo "<br>";
					 
					 }
					 
	

$_SESSION['QuestionNo']=$QuestionNo;
	
}



?>



 
 

 <button class="btn btn-success" type="submit" name="done"> Next </button><br>

</div>
 </form>
 </div>



<?php include 'footer.php'; ?>