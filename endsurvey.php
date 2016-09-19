<?php session_start();
echo "Welcome ".$_SESSION['email'];
$errormsg = "";
?>

<html>
<head><!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css" type="text/css">
<title>Computer Science Exit Interview</title>
</head>
<body>
  <h1>Exit Survey</h1>
  <h2>Department of Computer Science</h2>
  <h2>Valdosta State University</h2>
  <p style="color:#ff0000"> <?php echo $errormsg; ?></p>
<form id="survey" name="survey" method="post">
  <br>
  What are your plans after graduation?
  <select name="question_1">
    <option value="Back to school - at Valdosta State">Back to school - at Valdosta State </option>
    <option value="Back to school - elsewhere">Back to school - elsewhere</option>
    <option value="Employment in CS or a related field">Employment in CS or a related field</option>
    <option value="Employment in some other field">Employment in some other field</option>
    <option value="Taking a year off!">Taking a year off!</option>
    <option value="Not sure yet">Not sure yet</option>
    <option value="Other">Other</option>
  </select>
      <br>

      <br>
			What do you perceive to be the strengths of the computer science program?<br/>
			<textarea name="question_2" cols="54" rows="5" maxlength="500"></textarea>
      <br>

      <br>
			What do you perceive to be the weaknesses of the computer science program?<br/>
			<textarea name="question_3" cols="56" rows="5" maxlength="500"></textarea>
      <br>


      <p style="text-align: center; font-weight: bold">Thank you for your time and effort!</p>
      <div style="text-align: center"><input type="submit"  name="submit" value="Submit"/></div>
</form>


<?php
function push(){
    global $errormsg;
  if ($_POST['question_2'] && $_POST['question_3'] == null) {
    $errormsg = "* All questions must be answered!";
    return;
  }
  elseif ($_POST['question_2'] == null) {
    $errormsg = "* Question 2 must be answered!";

  }
  elseif ($_POST['question_3'] == null) {
    $errormsg = "* Question 3 must be answered!";
  }
  else {
    // Do SQL Stuff
    // Creating connection to database
    $conn = new mysqli("localhost","root","password","endSurvey");
    // Check connection
    if($conn->connect_error){
      die("Connection failed: " . $conn->connect_error);
    }
    $email = $_SESSION['email'];
    $question_1 = $_POST['question_1'];
    $question_2 = $_POST['question_2'];
    $question_3 = $_POST['question_3'];
    $sql="INSERT INTO endSurveyTable(email,question1,question2, question3)
    VALUES('$email','$question_1','$question_2','$question_3')";

    if($conn->query($sql)=== true) {
      echo "we did it yay!!";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header( 'Location: startpage.php');
  }
}
if (isset($_POST['submit'])) {
  push();
}
 ?>

</body>


</html>
