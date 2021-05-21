
<?php include '../config.php'; ?>
<?php include 'header.php'; ?>
<?php
//student
$user = $_SESSION['auth'];
 echo $user;
 
 
 //SELECT SUM(`marks`) FROM `studentanswers` where StudentName='zu@gmail.com'  and  Subject='Introduction To Programming'
  if(isset($_POST['doneNext']))
{
//show students of the subjects	
$subjectsName=	$_POST['subjectsName'];


$query="SELECT SUM(`marks`) As 'Marsks_Obtained' FROM `studentanswers` where StudentName='$user'  and  Subject='$subjectsName' and status='done'";
$results = mysqli_query($con, $query);
	 $row = mysqli_fetch_assoc($results);
	 if( $row >0)
	 {
 //https://stackoverflow.com/questions/5808522/get-sum-of-mysql-column-in-php/5808565
		 $result=$row['Marsks_Obtained'];
		 echo $result;
	 }	
}




?>






<form method="post">
 

 <br>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-secondary"><span class="text-success">S</span> tudent Result  </h1>
    </div>

 <select name="subjectsName">
    <option disabled selected>-- Select Subject--</option>
	
    <?php
	//mysqli_query($con,$q1);
        include "../config.php";  // Using database connection file here
        $records = mysqli_query($con, "Select Distinct subjectID from `student_subjects` where studentID='$user'");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['subjectID'] ."'>" .$data['subjectID'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
  
  <br>
  <p>
    <br>
   <?php 
if(empty($subjectsName)){}
else{
   echo " Subject Name : ". $subjectsName; 
}
   
   ?>
       <br>
   <?php 
if(empty($result)){}
else{
  echo "Marks obtained : ". $result;
}
   ?>
  </p>
  
  
    <button class="btn btn-success" type="submit" name="doneNext"> Next </button><br>
 <br>
