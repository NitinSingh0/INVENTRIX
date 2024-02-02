<?php
// Connecting to the Database
$servername = "localhost";
$username = "id21786985_inventrix";
$password = "M@keith@ppen1";
$database = "id21786985_registration";
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stumble Guys Registration</title>
  <link rel="stylesheet" href="registration.css">
  <link rel="shortcut icon" href="../logo.png">
  
</head>
<body>
  
  <div class="container">
    <h1 class="heading">Stumble Guys Registration</h1>
    <form action="stumple.php" method="post">
        <div class="field">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="eg abc@gmail.com" required>
      </div>
      <div class="field">
        <label for="name">First Name:</label>
        <input type="text" id="fname" name="fname" required>
      </div>
      <div class="field">
        <label for="name">Middle Name:</label>
        <input type="text" id="mname" name="mname" required>
      </div>
      <div class="field">
        <label for="name">Last Name:</label>
        <input type="text" id="lname" name="lname" required>
      </div>
      <div class="field">
        <label for="roll">Roll No.:</label>
        <input type="text" id="rollno" name="rollno" placeholder="eg 4044A038" required>
      </div>
      <div class="field">
        <label for="clas">Course:</label>
        <input type="text" id="clas" name="clas" placeholder="eg SYIT" required>
      </div>
      
      <div class="field">
        <label for="department">Department:</label>
        <select id="course" name="course" required>
          <option value="" selected disabled>Select department</option>
          <?php
                $sql = "SELECT * FROM courses";
                $result=mysqli_query($conn,$sql);
                foreach ($result as $row) {
                  echo '<option style="color:white;" value="' . $row["name"] . '">' . $row["name"] . '</option>';
                }
                ?>
            <option value="">other</option>
        </select>
      </div>
      <div class="field">
        <label for="contact">Contact Number:</label>
        <input type="text" id="contact_no" name="contact_no" placeholder="eg 9876543210"required>
      </div>
      <div style="color:red;">(NOTE:-Registration is based on First come First  serve basis.)</div><br><br>
      <button type="submit" class="submit-button">Register Now</button>
    </form>
  </div>
  
<?php

// Process form data if submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate form data
    $email = $_POST['email'];
    $fname = $_POST['fname'];
     $mname = $_POST['mname'];
      $lname = $_POST['lname'];
      $rollno=$_POST['rollno'];
    $course =$_POST['clas'];
    $department=$_POST['course'];
   
    $contact_no = $_POST['contact_no'];

    // Additional validation (optional)
    // ...

    // Prepare and execute SQL query securely
    $sql = "INSERT INTO details (email, fname,mname,lname,rollno, course,department, game, contact_no)
            VALUES ('$email', '$fname','$mname','$lname','$rollno', '$course','$department', 'Stumble guys', '$contact_no')";
    $q=$conn->query($sql);
    // $count=mysqli_num_rows($q);
    if($q){
    $event="Stumble guys";
   $table="details";
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style=" width:100%; position: fixed; top: 0; left: 0; background-color:black; color:white; ">
    <strong>Registration Successful!</strong> Please check your email for further instructions.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    require ('sendotp.php');
    echo '<META HTTP-EQUIV="Refresh" Content="0.5; URL=../event1.html">';
    
    }
    else{
        echo '<div class="container"><h2 style="color:#ff3b3f">
        An error occurred while submitting the registration details.</h2></div>';
        }
}
?>
</body>
</html>