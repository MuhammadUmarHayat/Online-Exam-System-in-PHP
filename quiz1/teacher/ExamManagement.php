<?php include '../config.php'; ?>
<?php include 'header.php'; ?>
<?php

$user = $_SESSION['auth'];
 echo $user;
?>

<?php
$record = mysqli_query($con,"SELECT * FROM `users` WHERE Email='$user' and userType='teacher'");
$row = mysqli_fetch_row($record);
 // the email value
$name=$row[1];//name
?>
<?php

 if(isset($_POST['doneNext']))
{
//show students of the subjects	
$subjectsName=	$_POST['subjectsName'];
	
}
if(isset($_POST['doneShowStudents']))
{
$subjectsName=	$_POST['subjectsName'];	
$StudentName=$_POST['StudentName'];

	
	$query="SELECT  * FROM `studentanswers` WHERE Subject='$subjectsName' and status ='undefine' and qtype='discriptive' and StudentName='$StudentName' LIMIT 1";
	
	 $results = mysqli_query($con, $query);
	 $row = mysqli_fetch_assoc($results);
	 if( $row >0)
	 {
		$question= $row['question']; 
		$Answer1= $row['Answer']; 
		
	
		$_SESSION['QuestionNo']=$question;
		$_SESSION['Answer1']=$Answer1;
		
		if(empty($question) ||empty($Answer1))
  {
	  
	  
	  
  }
  else
  {
	  
	  
  }
		
		
		
		 
	 }
	
}
if(isset($_POST['doneSave']))
{
$subjectsName=	$_POST['subjectsName'];	
$StudentName=$_POST['StudentName'];
	$question=$_SESSION['QuestionNo'];
$status='done';	
$marks=$_POST['marks'];



echo $subjectsName."<br>";
echo $StudentName."<br>";
echo $question."<br>";
echo $status."<br>";
echo $marks."<br>";
	
$q1="UPDATE `studentanswers` SET marks='$marks',status='$status' where StudentName='$StudentName' and question='$question' and  Subject='$subjectsName'";	

$query = mysqli_query($con,$q1);

	echo "Result is saved " ;
	exit;
}










?>

<form method="post">
 


 <br>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-secondary"><span class="text-success">E</span>xams Management </h1>
    </div>

 <select name="subjectsName">
    <option disabled selected>-- Select Subject--</option>
	
    <?php
	//mysqli_query($con,$q1);
        include "../config.php";  // Using database connection file here
        $records = mysqli_query($con, "Select * from teacher_subjects where teacherID='$name'");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['subjectID'] ."'>" .$data['subjectID'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
    <button class="btn btn-success" type="submit" name="doneNext"> Next </button><br>
 <br>
 
 
 
 <br>
 <br>
 <select name="StudentName">
    <option disabled selected>-- Select Student ID--</option>
	
    <?php
	if(empty($_POST['subjectsName']))
	{
		
		
	}
	else
	{
	$subjectsName = $_POST['subjectsName'];
	//mysqli_query($con,$q1);
        include "../config.php";  // Using database connection file here
        $records = mysqli_query($con, "SELECT  DISTINCT `StudentName` FROM `studentanswers` WHERE `Subject`='$subjectsName' and status ='undefine' and qtype='discriptive'");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['StudentName'] ."'>" .$data['StudentName'] ."</option>";  // displaying data in option menu
        }
	}		
    ?>  
  </select>
   <button class="btn btn-success" type="submit" name="doneShowStudents"> show Students Answer </button><br>
  <br>
 
<br><h1> Question</h1>
  <?php 
  if(isset($question))
  {
	 echo " Question". $question;//question
 }
 else
 {
	 echo "Message: No question is found";
 }
  
 
 ?>
<br> <h1> Student Answer </h1> 
<p width="100%"> 
 <?php 
  if(isset($Answer1))
 {
	 echo $Answer1;//student answer
 }
 else{
 echo "Message: No answer is found";

 }?>	
 </p>
  <br>
   <br>
 <label>  Marks: </label>

 <input type="number" id="marks" name="marks" min="0" max="5">
 <br>		
  
 <button class="btn btn-success" type="submit" name="doneSave"> save Marks </button><br>
 
</div>
 </form>
 </div>



<?php include 'footer.php'; ?>