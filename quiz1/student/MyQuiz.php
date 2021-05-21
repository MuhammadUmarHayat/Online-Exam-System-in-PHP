<?php  include '../config.php'; ?>
<?php include 'header.php'; ?>
<?php
//session_start();
//TakeExam.php;


$user = $_SESSION['auth'];
 $studentName =$_SESSION['studentName'];
  $subjectsName =$_SESSION['subjectsName'];
  
$mcq=$_SESSION['mcq'];

$twoM=$_SESSION['twoM'];

$threeM=$_SESSION['threeM'];

$fiveM=$_SESSION['fiveM'];
$startingdate=$_SESSION['startingdate']; 
$endingdate=$_SESSION['endingdate']; 
$totalMarks=$_SESSION['totalMarks'];
$TotalTime=$_SESSION['TotalTime'];  
 
 echo $user;
 echo "<br>";
 echo "<h1>".$mcq."</h1>";
 echo "<br>";
 echo  "<h1>".$twoM."</h1>";
 echo "<br>";
 
 echo "<br>";
 echo "<h1>".$threeM."</h1>";
 echo "<br>";
 echo  "<h1>".$fiveM."</h1>";
 echo "<br>";
 
 
 
 echo "<br>";
 echo "<h1>".$startingdate."</h1>";
 echo "<br>";
 echo  "<h1>".$endingdate."</h1>";
 echo "<br>";
 echo "<br>";
 echo "<h1>".$totalMarks."</h1>";
 echo "<br>";
 echo  "<h1>".$TotalTime."</h1>";
 echo "<br>";
 
 //$recordMCQ = mysqli_query($con,"SELECT * FROM  `quizcriteria` WHERE subject='$subjectsName'");
//$rowMCQ = mysqli_fetch_array($recordMCQ);
 //$rowcountMCQ=mysqli_num_rows($recordMCQ);
 
  //echo $rowcountMCQ;
 
 //define functions
 function saveMCQ($question,$qtype,$option1,$option2,$option3,$option4,$option5,$Correct) 
 {
	 
	$q2 = "INSERT INTO `studentquiz`(question,qtype,option1,option2,option3,option4,option5) VALUES ('$question','$qtype','$option1','$option2','$option3','$option4','$option5','$Correct')";
	 $query2 = mysqli_query($con,$q2);
  //echo $query2;
   
}
 function saveDescriptive($question,$qtype,$DesMarks) 
 {
	 
	$q3 = "INSERT INTO `studentquiz`(question,qtype,DesMarks) VALUES ('$question','$qtype','$DesMarks')";
	 $query3 = mysqli_query($con,$q3);
 //  echo $query3;
   
}
 ////////////////////////////////////////////////
 $qry = "SELECT questions.*,options.* FROM questions  INNER JOIN options ON questions.Question=options.quesID WHERE questions.subjectID='Introduction to programming'";

$result = mysqli_query($con,$qry);//questions
if (mysqli_num_rows($result) > 0) {
	
$i=1;
while($row1 = mysqli_fetch_assoc($result)) 
			  {
				echo $qt1=$row1['qType'];  
				echo "<br>".$qt1."<br>";
				  
				  if( $qt1=="mcq")
				  {
					  $m=1;
				while($m<=$mcq)
				{
					$a=$row1['Question'];
					$b=$row1['qType'];
					$c=$row1['option1'];
					$d=$row1['option2'];
					$e=$row1['option3'];
					$f=$row1['option4'];
					$g=$row1['option5'];
					$h=$row1['Answer'];
				  saveMCQ($a,$b,$c,$d,$e,$f,$g,$h);
				
				 $m++;
				}
				 echo "<br> MCQ Done <br>";
				  }
				  else if( $qt1=="discriptive")
				  {
					$qa= $row1['Question']; 
					$tp=$row1['qtype'];
					$mk=$row1['marks'];
					  if(marks==2)
					  {
						$t=1;  
					while($t<=$twoM)
					  {
					  saveDescriptive($qa,$tp,$mk);
					
					  
					  
					  
					  $t++;
					  }
					   echo "<br> 2 Done <br>";
					  }
					  if(marks==3)
					  {
						  $thr=1;
					while($thr<=$threeM)
					  {
					   saveDescriptive($qa,$tp,$mk);
					 
					  $thr++;
					  }
					   echo "<br> 3 Done <br>";
					  }
					  
					  if(marks==5)
					  {
						  $f=1;
					while($f<=$fiveM)
					  {
					   saveDescriptive($qa,$tp,$mk);
					  
					  
					  
					  $f++;
					  }
					   echo "<br> 5 Done <br>";
					  }
					  
					  
					  
					  
					  
				  }
				  
				   
				  
				  
			  }//end while







}//end if
 ?>
<?php
 if(isset($_POST['done']))
{
	
	
}
 
 
 
?>

<form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Start Quiz </h1>
 </div><br>
  

 

 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

</div>
 </form>
 </div>



<?php include 'footer.php'; ?>