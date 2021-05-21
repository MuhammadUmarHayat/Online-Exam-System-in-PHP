<?php include '../config.php'; ?>
<?php include 'header.php'; ?>
<?php
//TakeExam.php;
$user = $_SESSION['auth'];
 echo $user;
?>
<?php
if(isset($_POST['done']))
{
////tName,subjectsName
if(empty($_POST['subjectsName']))
 {
	  echo 'Fields should not empty';
 }
 else
 {
	
 $studentName =$user ;
 $subjectsName = $_POST['subjectsName'];
 //$user = $_SESSION['auth'];
 }
$record = mysqli_query($con,"SELECT * FROM  `quizcriteria` WHERE subject='$subjectsName'");
$row = mysqli_fetch_array($record);

 $rowcount=mysqli_num_rows($record);
 
  echo "<br>";
    echo "<br>";
	echo "<br>";
    echo "<br>";
 
 //echo $rowcount;
if($rowcount==0)
{
	
	echo "<h1> No data is found </h1>";
}
else
{
try
 {
 $d1 = date('Y-m-d',strtotime($row['startingDate']));
 
 $d2 = date('Y-m-d',strtotime($row['endingDate']));
 
 //compare dates     date("Y-m-d") <=  $d1;//compare
  $cd= date('Y-m-d');
  if($cd<=$d2)
 {
 $i=1;
$mcq=$row['mcq'];
$TwoM=$row['twoM'];
$threeM=$row['threeM'];
$fiveM=$row['fiveM'];
echo $mcq;
echo $TwoM;
echo $threeM;
echo $fiveM;

$TotalQuestions=$mcq+$TwoM+$threeM+$fiveM;
echo $TotalQuestions;
//exit;

$TotalMarks=$mcq+$TwoM*2+$threeM*3+$fiveM*5;//3+2+3+5

$duration = $TotalMarks*1.5; // in minutes
//exit;
$QuestionNo=0;

//Fetch and Save MCQ

 $qry = "SELECT questions.*,options.* FROM questions  INNER JOIN options ON questions.Question=options.quesID having questions.subjectID='$subjectsName'  LIMIT $mcq";

$result = mysqli_query($con,$qry);//questions
if (mysqli_num_rows($result) > 0) 
{
while($row1 = mysqli_fetch_assoc($result)) 
			  {
				  $QuestionNo=$QuestionNo+1;	

				  echo "<br>";
				
					 
					$qtype="mcq";
					$question=$row1['Question'];
					$option1=$row1['option1'];
					$option2=$row1['option2'];
					$option3=$row1['option3'];
					$option4=$row1['option4'];
					$option5=$row1['option5'];
					$Correct=$row1['Answer'];
					$TotalOptions=$row1['options'];
				//save mcqs	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////subject,question,qtype,option1,option2,option3,option4,correct,options,QuestionNo
				  $q2 = "INSERT INTO `studentquiz`(subject,question,qtype,option1,option2,option3,option4,option5,correct,options,QuestionNo) VALUES ( '$subjectsName','$question','$qtype','$option1','$option2','$option3','$option4','$option5','$Correct','$TotalOptions','$QuestionNo')";
	 $query2 = mysqli_query($con,$q2);
				  
				  
				
				 echo "<br> MCQ Done <br>";  
				  
				  
			    }//mcq
				
}//end mcq



 if($TwoM>0)
	{
					  
		$qtype="discriptive";			  
					$marks=2;//$TwoM;
					//subject,question,qt,$twoM 
					  if($marks==2)
					  {
						  
 $qryM2 = "SELECT * from  Questions WHERE subjectID='$subjectsName' and qType='discriptive' and marks=2  LIMIT $TwoM";

    $resultM2 = mysqli_query($con,$qryM2);//questions
if (mysqli_num_rows($resultM2) > 0) 
{
	

while($rowM2 = mysqli_fetch_assoc($resultM2)) 
			  {
				 $QuestionNo=$QuestionNo+1; 
				 $question=$rowM2['Question'];
				 
$qM2 = "INSERT INTO `studentquiz`(subject,question,qtype,marks,QuestionNo) VALUES ( '$subjectsName','$question','$qtype','$marks','$QuestionNo')";
	 $query3 = mysqli_query($con,$qM2);
					  				  
				  
				  
				  
			  }
						  
		 echo "<br> 2 Done <br>";
			}
					  
			}
			  		  
	
			  
				  }//end 2 marks
/////////////////////////////////////3 marks///////////



if($threeM>0)
	{
					  
		//$qtype=="discriptive"			  
					$marks=3;//$TwoM;
					//subject,question,qt,$twoM 
					  if($marks==3)
					  {
						  
 $qryM3 = "SELECT * from  Questions WHERE subjectID='$subjectsName' and qType='discriptive' and marks=3  LIMIT $threeM";

    $resultM3 = mysqli_query($con,$qryM3);//questions
if (mysqli_num_rows($resultM3) > 0) 
{
	

while($rowM3 = mysqli_fetch_assoc($resultM3)) 
			  {
				   $question=$rowM3['Question'];
				$QuestionNo=$QuestionNo+1;  
$qM3 = "INSERT INTO `studentquiz`(subject,question,qtype,marks,QuestionNo) VALUES ( '$subjectsName','$question','$qtype','$marks','$QuestionNo')";
	 $query3 = mysqli_query($con,$qM3);
					  				  
				  
				  
				  
			  }
						  
		 echo "<br> 3 Done <br>";
			}
					  
			}
			  		  
		
			  
			  
				  }//end 3 marks
//////////////////////////////////////////5 Marks questions/////////////////////////


if($fiveM>0)
	{
					  
		//$qtype=="discriptive"			  
					$marks=5;//$TwoM;
					//subject,question,qt,$twoM 
					  if($marks==5)
					  {
						  
 $qryM5 = "SELECT * from  Questions WHERE subjectID='$subjectsName' and qType='discriptive' and marks=5  LIMIT $fiveM";

    $resultM5 = mysqli_query($con,$qryM5);//questions
if (mysqli_num_rows($resultM5) > 0) 
{
	

while($rowM5 = mysqli_fetch_assoc($resultM5)) 
			  {
				  
				  
				  $question=$rowM5['Question'];
				$QuestionNo=$QuestionNo+1;  
$qM5 = "INSERT INTO `studentquiz`(subject,question,qtype,marks,QuestionNo) VALUES ( '$subjectsName','$question','$qtype','$marks','$QuestionNo')";
	 $query3 = mysqli_query($con,$qM5);
					  				  
				  
				  
				  
			  }
						  
		 echo "<br> 5 Done <br>";
			}
					  
			}
			  		  
						  
		
				  }//end 5 marks



 $_SESSION['studentName']=$studentName;
 
 $_SESSION['subjectsName']=$subjectsName;

 $_SESSION['TotalQuestions']=$TotalQuestions;
 
  $_SESSION['TotalMarks']=$TotalMarks;
	 
	 $_SESSION['QuestionNo'] =1;
	 
	 //timmer code
	 
	 
	 
	 
	 
	 
	 
$start_time = date("Y-m-d H:i:s");
$end_time = date('Y-m-d H:i:s', strtotime('+' . $duration . ' minutes', strtotime($start_time)));

$_SESSION["duration"] = $duration;
$_SESSION["start_time"] = $start_time;
$_SESSION["end_time"] = $end_time;
	 

		header('Location:http://localhost/quiz1/student/Exams.php');
	 
 }

 
 else if($cd>$d2)
 {
	 
		echo "Date is over "; 
	 
 }
 
 
 }
 catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}

}
}
 ?>








<div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Take Exam </h1>
 </div><br>
  <br>
 
 <br>
 SubjectID: 
 <select name="subjectsName">
    <option disabled selected>-- Select Subject--</option>
    <?php
	//mysqli_query($con,$q1);
        include "../config.php";  // Using database connection file here
        $records = mysqli_query($con, "SELECT `studentID`, `subjectID` FROM `student_subjects` WHERE studentID='$user'");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['subjectID'] ."'>" .$data['subjectID'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
   
 <br>

 <button class="btn btn-success" type="submit" name="done"> Start Exam </button><br>

 </div>
 </form>
 </div>
</body>
</html>
<?php include 'footer.php'; ?>


 





