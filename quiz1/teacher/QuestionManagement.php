<?php include '../config.php'; ?>
<?php include 'header.php'; ?>
<?php
//checkAuth('Teacher');
$user = $_SESSION['auth'];
 echo $user;
?>


<?php
if(isset($_POST['done']))
{
	$qType1 = $_POST['qType'];
	
	if($qType1=="discriptive")
	{
	echo $qType1;	
	$subjectsName = $_POST['subjectsName'];
 $qType = $_POST['qType'];
 //SubjectID,Title,Department,Description
 $question = $_POST['question'];
 $marks = $_POST['marks'];
 $Toptions = $_POST['Toptions'];//total option
 
                                                                             //INSERT INTO `questions`( `subjectID`, `Question`, `qType`, `marks`, `options`) VALUES
 $q1 = "INSERT INTO `questions`( `subjectID`, `Question`, `qType`, `marks`, `options`)  VALUES ('$subjectsName','$question','$qType','$marks','$Toptions')";

 $query = mysqli_query($con,$q1);
echo 'Record is saved successfully'; 
		
	}
	
	else
	{
		
		
		
	
	
	
	
//subjectsName,qType,question,marks,Toptions,op1,op2,op3,op4,op5,options
if(empty($_POST['question'])||empty($_POST['marks'])||empty($_POST['Toptions'])||empty($_POST['options']))
 {
	  echo 'Fields should not empty';
}
 else
 {
	try {
		
 $subjectsName = $_POST['subjectsName'];
 $qType = $_POST['qType'];
 //SubjectID,Title,Department,Description
 $question = $_POST['question'];
 $marks = $_POST['marks'];
 $Toptions = $_POST['Toptions'];//total option
 
 $op1 = $_POST['op1'];
 $op2 = $_POST['op2'];
 $op3 = $_POST['op3'];
 $op4 = $_POST['op4'];
  $op5 = $_POST['op5'];
 $options = $_POST['options'];//correct option
                                                                             //INSERT INTO `questions`( `subjectID`, `Question`, `qType`, `marks`, `options`) VALUES
 $q1 = "INSERT INTO `questions`( `subjectID`, `Question`, `qType`, `marks`, `options`)  VALUES ('$subjectsName','$question','$qType','$marks','$Toptions')";

 $query = mysqli_query($con,$q1);
 
                                                                                                        //INSERT INTO `options`(`quesID`, `option1`, `option2`, `option3`, `option4`, `option5`, `Answer`) VALUES
 $q2 = "INSERT INTO `options`(`quesID`, `option1`, `option2`, `option3`, `option4`, `option5`, `Answer`) VALUES ('$question','$op1','$op2','$op3','$op4','$op5','$options')";

 $query2 = mysqli_query($con,$q2);
 
 
 
 
 echo 'Record is saved successfully';
 
 
 }

//catch exception
catch(Exception $e)
 {
  echo 'Error: ' .$e->getMessage();
}
  
 }
 
}
}
?>
















<?php
$record = mysqli_query($con,"SELECT * FROM `users` WHERE Email='$user' and userType='teacher'");
$row = mysqli_fetch_row($record);
 // the email value
$name=$row[1];//name
?>
<form method="post">
 

 

 <br>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-secondary"><span class="text-success">Q</span>uestions Management </h1>
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
 <br>
<div class="form-group p-1">
                       
<input type="radio" name="qType"
<?php if (isset($qType) && $qType=="mcq") echo "checked";?>
 value="mcq">MCQ<br>
  <input type="radio" name="qType"
  <?php if (isset($qType) && $qType=="discriptive") echo "checked";?> value="discriptive">Discriptive<br>
 
  <br>
 </div>

<label> Question : </label>
 <input type="text" name="question" class="form-control"> <br>
 
 <label> Marks : </label>
 <input type="text" name="marks" class="form-control"> <br>
 <label> Options : </label>
 <input type="text" name="Toptions" class="form-control"> <br>
 
<label>  option 1: </label>
 <input type="text" name="op1" class="form-control"> <br>
 
 <label>  option 2: </label>
 <input type="text" name="op2" class="form-control"> <br>
 <label>  option 3: </label>
 <input type="text" name="op3" class="form-control"> <br>
 
 <label>  option 4: </label>
 <input type="text" name="op4" class="form-control"> <br>
 <label>  option 5: </label>
 <input type="text" name="op5" class="form-control"> <br>
 
 <label>  correct option: </label>
<br>
 <input type="radio" name="options"
<?php if (isset($options) && $options=="1") echo "checked";?>
 value="1">1<br>
  
  
  <input type="radio" name="options"
<?php if (isset($options) && $options=="2") echo "checked";?>
 value="2">2<br>
   <input type="radio" name="options"
<?php if (isset($options) && $options=="3") echo "checked";?>
 value="3">3<br>
  <input type="radio" name="options"
<?php if (isset($options) && $options=="4") echo "checked";?>
 value="4">4<br>
 <input type="radio" name="options"
<?php if (isset($options) && $options=="5") echo "checked";?>
 value="5">5<br>
  <br>
 
 
 
 
 
 
 
 

 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>










<?php include 'footer.php'; ?>