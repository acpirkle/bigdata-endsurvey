<?php session_start();
if (!isset($_SESSION['email'])) {
  header('Location: startpage.php');
}
?>

<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
   <div class="container">
    <div class="jumbotron">
      <h1>Exit Survey</h1>
      <h2>Department of Computer Science</h2>
      <h2>Valdosta State University</h2>
      <p><?php echo "Welcome ".$_SESSION['email']."!"; ?></p>
     </div>
  </div>
<form id="survey" name="survey" method="post">
  <div class="q1 form-group">
    <label for="question_1">What are your plans after graduation?</label>
    <select id="question_1" name="question_1" class="form-control">
      <option value="Back to school - at Valdosta State">Back to school - at Valdosta State </option>
      <option value="Back to school - elsewhere">Back to school - elsewhere</option>
      <option value="Employment in CS or a related field">Employment in CS or a related field</option>
      <option value="Employment in some other field">Employment in some other field</option>
      <option value="Taking a year off!">Taking a year off!</option>
      <option value="Not sure yet">Not sure yet</option>
      <option value="Other">Other</option>
    </select>
  </div>
  <div class="q2 form-group">
		<label for="question_2">What do you perceive to be the strengths of the computer science program?</label>
		<textarea  id="question_2" class="form-control" name="question_2" rows="5" maxlength="500"></textarea>
  </div>
  <div class="q3 form-group">
		<label for="question_3">What do you perceive to be the weaknesses of the computer science program?</label>
		<textarea name="question_3" class="form-control" id="question_3" rows="5" maxlength="500"></textarea>
  </div>
  <div class="submitSurvey form-group">
    <label for="submitbttn" style="font-weight: bold">Thank you for your time and effort!</label><br>
    <input type="submit" id="submitbttn" class="btn btn-default btn-sm" name="submit" value="Submit"/>
  </div>
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
  session_destroy();
}
 ?>

</body>


</html>
