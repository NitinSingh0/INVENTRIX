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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate form data
    $email = $_POST['email'];
    $name = $_POST['name'];
     $message = $_POST['message'];
     
    $sql = "INSERT INTO suggestion (name,email,message)
            VALUES ('$name','$email','$message')";
    $q=$conn->query($sql);
    // $count=mysqli_num_rows($q);
    if($q){
   
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style=" width:100%; position: fixed; top: 0; left: 0; background-color:black; color:white;">
    <strong>Thank you!</strong> we will definetly consider your suggestion.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
   
    echo '<META HTTP-EQUIV="Refresh" Content="0.5; URL=../index.html">';
    }
    else{
        echo '<div class="container"><h2 style="color:#ff3b3f">
        An error occurred while submitting the registration details.</h2></div>';
        }
}
?>