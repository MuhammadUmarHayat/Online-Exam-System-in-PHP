
<?php include '../config.php';
//quiz_criteria.php
 ?>
 
<?php include 'header.php'; ?>


<?php
if(isset($_POST['done']))
{
//subject,mcq,twoM,threeM,fiveM,startingdate,endingdate,totalMarks,TotalTime
if(empty($_POST['subject'])||empty($_POST['mcq']))
 {
	  echo 'Fields should not empty';
}
 else
 {
//subject,mcq,twoM,threeM,fiveM,startingdate,endingdate,totalMarks,TotalTime	 startingdate ,endingdate
 $subject = $_POST['subject'];
 $mcq = $_POST['mcq'];
  $twoM = $_POST['twoM'];
 $threeM = $_POST['threeM'];
  $fiveM = $_POST['fiveM'];
  
 $startingdate=$_POST['startingdate'];
  $endingdate=$_POST['endingdate'];
 
 //https://www.youtube.com/watch?v=v7OZAddmiHs
  //https://www.daniweb.com/programming/web-development/threads/498614/php-insert-date-from-datepicker-to-mysql
 
 $sum=1;
 $two=$twoM*2;
 $three=$threeM*3;
 $five=$fiveM*5;
 
 $sum=$mcq + $two+ $three+$five;
 $totalMarks =$sum;
 $TotalTime=$totalMarks*1.5;//each one marks question is of 1.5 minutes
 
  
 //subject,mcq,twoM,threeM,fiveM,startingdate,endingdate,totalMarks,TotalTime//INSERT INTO `quizcriteria`( `subject`, `mcq`    VALUES('". $_POST['post_title'] ."',CAST('". $date ."' AS DATE))") or die(mysql_error());
  
 $q1 = "INSERT INTO `quizcriteria`( `subject`, `mcq`, `twoM`, `threeM`, `fiveM`, `startingdate`, `endingdate`, `totalMarks`, `TotalTime`)  VALUES ('$subject','$mcq','$twoM','$threeM','$fiveM','$startingdate','$endingdate','$totalMarks','$TotalTime')";
 
$query = mysqli_query($con,$q1);
 
 //echo $q1;
 //exit;
 echo 'Data is saved  successfully';
 
  
 }
 
}
?>





<div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Generate Quiz  </h1>
 </div>
 <br>
 <br>
 SubjectID: 
 <select name="subject">
    <option disabled selected>-- Select Subject--</option>
    <?php
	//mysqli_query($con,$q1);
        include "../config.php";  // Using database connection file here
        $records = mysqli_query($con, "SELECT title From subject");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['title'] ."'>" .$data['title'] ."</option>";  // displaying data in option menu
        }
		
    ?>  
  </select>
 <br>
 Questions of 1 marks (MCQ):
<input type="number" id="mcq" name="mcq" min="1" max="10" value=1 >
<br>
Questions of 2 marks :
<input type="number" id="twoM" name="twoM" min="0" max="5" value=0>
<br>

Questions of 3 marks (MCQ):
<input type="number" id="threeM" name="threeM" min="0" max="5" value=0 >
<br>
Questions of 5 marks (MCQ):
<input type="number" id="fiveM" name="fiveM" min="0" max="5" value=0 >
<br>starting Date:
<br>


<input type="date" name="startingdate" id="startingdate">

<br>

 Due Date
<input type="date" name="endingdate" id="endingdate">
</fieldset>
<br>
 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>
 </div>
 </form>
 </div>
</body>
</html>
<?php include 'footer.php'; ?>