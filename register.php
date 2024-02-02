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
<html>
<head>
    <title>Virtual Registration Form</title>
    <link rel="stylesheet" href="data.css"> 
    <link rel="shortcut icon" href="logo.png">
</head>
<body>
    <h1>Virtual Registration Form</h1>
    <form action="register.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="eg abc@gmail.com" required><br><br>

        <label for="fullname">First Name:</label>
        <input type="text" id="fname" name="fname" required><br><br>
        
        <label for="fullname">Middle Name:</label>
        <input type="text" id="mname" name="mname" ><br><br>

        <label for="fullname">Last Name:</label>
        <input type="text" id="lname" name="lname" required><br><br>

         <label for="ControlID">Roll No.:</label>
        <input type="text" id="rollno" name="rollno" placeholder="eg 4044A038" required><br><br>
        
        <label for="clas">Course:</label>
        <input type="text" id="clas" name="clas" placeholder="eg SYIT" required><br><br>

        <label for="course">Department:</label>
        <select id="course" name="course">
            <option selected disabled style="color:white;">select department</option>
        <?php
                $sql = "SELECT * FROM courses";
                $result=mysqli_query($conn,$sql);
                foreach ($result as $row) {
                  echo '<option style="color:white;" value="' . $row["name"] . '">' . $row["name"] . '</option>';
                }
                ?>
            <option value="">Select Course</option>
            </select><br><br>

        <label for="game">Events:</label>
        <select id="game" name="game">
              <option selected disabled style="color:'white';">select game</option>
        <?php
                $sql = "SELECT * FROM games";
                $result=mysqli_query($conn,$sql);
                foreach ($result as $row) {
                  echo '<option style="color:white;" value="' . $row["name"] . '">' . $row["name"] . '</option>';
                }
                ?>
           
            </select><br><br>

        <label for="contact_no">Contact Number:</label>
        <input type="tel" id="contact_no" name="contact_no" placeholder="eg 1234567890" required><br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
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
    $game = $_POST['game'];
    $contact_no = $_POST['contact_no'];

    // Additional validation (optional)
    // ...

    // Prepare and execute SQL query securely
    $sql = "INSERT INTO details (email, fname,mname,lname,rollno, course,department, game, contact_no)
            VALUES ('$email', '$fname','$mname','$lname','$rollno', '$course','$department', '$game', '$contact_no')";
    $q=$conn->query($sql);
    // $count=mysqli_num_rows($q);
    if($q){

    echo "<script>alert('Registration Successful! Please check your email for further instructions.');</script>";
    }
    else{
        echo '<div class="container"><h2 style="color:#ff3b3f">
        An error occurred while submitting the registration details.</h2></div>';
        }
}
?>
