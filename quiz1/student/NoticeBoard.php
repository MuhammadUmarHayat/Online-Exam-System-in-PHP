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
 
 }
$record = mysqli_query($con,"SELECT * FROM  `quizcriteria` WHERE subject='$subjectsName'");
$row = mysqli_fetch_array($record);
 $rowcount=mysqli_num_rows($record);
?>
<?php

 
  echo "<br>";
    echo "<br>";
	echo "<br>";
    echo "<br>";
 
 //echo $rowcount;
if($rowcount==0)
{
	
	echo "<h1> No Exam is annouced yet.. </h1>";
}
else
{

 // the email value
//$name=$row[1];//name
 echo "<br>"."<h1>   Subject ". $row['subject']."</h1>"; echo "<br>";
 echo "Multi Choice Questions :". $row['mcq']; echo "<br>";
 echo "Questions of two numbers".$row['twoM']; echo "<br>";
 echo "Questions of three numbers".$row['threeM']; echo "<br>";
 echo "Questions of five numbers".$row['fiveM']; echo "<br>";
 echo "Starting Date ".$row['startingDate']; echo "<br>";
 echo "Ending Date ".$row['endingDate']; echo "<br>";
 echo "Total Marks ".$row['TotalMarks']; echo "<br>";
echo "Total Time ".$row['TotalTime']; echo "<br>";



try
 {
 $d1 = date('Y-m-d',strtotime($row['startingDate']));
 
 $d2 = date('Y-m-d',strtotime($row['endingDate']));
 
 //compare dates     date("Y-m-d") <=  $d1;//compare
  $cd= date('Y-m-d');//current date
  
 if($cd==$d1)//starting date
 {
	 
	echo "equal"; 
	 
 }
 else if($cd<=$d2)//due date
 {

		echo "You can take exam"; 
	 
 }
 
 else if($cd>$d2)
 {
	 
		echo "Date is over "; 
	 
 }
 
 
 }
 catch(Exception $e) 
 {
  echo 'Message: ' .$e->getMessage();
}

 //header('Location:http://localhost/quiz1/student/MyQuiz.php');

}
}
 ?>





<div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Select Subject </h1>
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

 <button class="btn btn-success" type="submit" name="done"> View Notices</button><br>

 </div>
 </form>
 
 




 
 
 
 </div>
</body>
</html>
<?php include 'footer.php'; ?>


 





