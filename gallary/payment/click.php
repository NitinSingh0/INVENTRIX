<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>payment</title>
   <link rel="shortcut icon" href="../logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</head>
<style>
  body {
    background-color: #eee;
    font-family: 'Nunito', sans-serif;
  }
  .login {
   
    text-align: center;
    text-transform: uppercase;
    margin-top: 30px;
    margin: 10px auto;
    max-width: 690px;
    padding: 30px 45px;
    box-shadow: 5px 25px 35px #3535356b;
    background-color: white;
    border-radius: 40px;
  }
  .login h1 {
    margin-top: px;
    font-weight: bold;
    font-size: 35px;
    letter-spacing: 3px;
  }
  .login form {
    max-width: 320px;
    margin: 30px auto;
  }
  .login .btn {
    border-radius: 50px;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 2px;
    font-size: 20px;
    padding: 10px;
    background-color: #00B72E;
  }
  .form-group input {
    font-size: 20px;
    font-weight: lighter;
    border: none;
    background-color: #F0F0F0;
    color: #465347;
    padding: 26px 30px;
    border-radius: 50px;
  }
  .mainsize {
    /* box-shadow: 5px 10px #888888;     ! boxshadow !*/
    margin: 10px auto;
    /* background: ; */
    max-width: 590px;
    padding: 30px 45px;
    box-shadow: 5px 25px 35px #3535356b;
    background-color: white;
    border-radius: 10px;
  }
  
input[type="radio"] {
    background: #fff;
    transition: 300ms ease-in-out 0s;
    cursor: pointer;
}


</style>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="login">
        <h1>Click click Payment Status</h1>
        <form class="row  mg-auto" method="POST" action="click.php">
          <div class="form-group">
            <input type="text" class="form-control " id="user" name="email" placeholder="Email">
          </div>
          
          <button type="submit" class="btn btn-lg btn-block btn-success ">UPDATE</button>
      </div>
      <a href="games.php" >GAMES</a><br>
       <a href="tresure.php" >TRESURE HUNT</a>
    </div>
  </div>
</div>
<!-- PHPPPPP -->
<?php
error_reporting(0);

$servername = "localhost";
$username = "id21786985_inventrix";
$password = "M@keith@ppen1";
$database = "id21786985_registration";
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

if (isset($_POST['status'])) {
 $id=$_POST['id'];
  $status=$_POST['status'];
      $s = "UPDATE stumble set status='$status' WHERE id='$id'";
  $qu = $conn->query($s);
 
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style=" width:100%; position: absolute; top: 0; left: 0; ">
        <strong>sucess!</strong> updated'.$id.' successfully'.$status.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';

  
} else {
   if (isset($_POST['email'])) {
  $email = $_POST['email'];
 // echo $admin;
  $game = $_POST['game'];

  $sql="SELECT * FROM stumble where email='$email'";
  $q = $conn->query($sql);
    $count = mysqli_num_rows($q);
  
    if ($count) {
        $data = mysqli_fetch_array($q);
        $name=$data['leader'];
        $id=$data['id'];
        $roll=$data['roll'];
        $contact=$data['contact'];
        $course=$data['course'];
        $department=$data['department'];
        $status=$data['status'];

      ?>
      <form action="click.php" method="post">
<hr>
        <h1 class="row justify-content-center">Participant Details</h1>


      </form>
      <div class="mainsize">
        <form method="POST" action="click.php" name="form2">
          <fieldset disabled>

            <div class="mb-3">
              <label for="disabledTextInput" class="form-label">ID : </label>
              <input type="text" id="disabledTextInput" class="form-control" name="id" value="<?php echo $id ?>">
            </div>
            <hr class="mx-n3">
            <div class="mb-3">
              <label for="disabledTextInput" class="form-label">Name : </label>
              <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $name ?>">
            </div>
            <hr class="mx-n3">
            
            <div class="mb-3">
              <label for="disabledTextInput" class="form-label">Roll no. : </label>
              <input type="text" id="disabledTextInput1" class="form-control" value="<?php echo $roll ?>">
            </div>
            <hr class="mx-n3">
            
            <div class="mb-3">
              <label for="disabledTextInput" class="form-label">Course : </label>
              <input type="text" id="disabledTextInput1" class="form-control" value="<?php echo $course ?>">
            </div>
            <hr class="mx-n3">
            <div class="mb-3">
              <label for="disabledTextInput" class="form-label">Contact_no: </label>
              <input type="text" id="disabledTextInput1" class="form-control" value="<?php echo $contact ?>">
            </div>
            <hr class="mx-n3">

            <div class="mb-3">
              <label for="disabledTextInput" class="form-label">Department : </label>
              <input type="text" id="disabledTextInput1" class="form-control" value="<?php echo $department ?>">
            </div>
            <hr class="mx-n3">
          </fieldset>
          <div class="mb-3">
              <label for="disabledTextInput" class="form-label">ID : </label>
              <input type="text" id="disabledTextInput" class="form-control" name="id" value="<?php echo $id ?>">
            </div>
          <label for="disabledTextInput" class="form-label">status : </label>
          <?php if ($status == 'paid') { ?>
            <div class="form-check">

              <input class="form-check-input" type="radio" name="status" id="admin1" value='paid' checked>
              <label class="form-check-label" for="admin1">
                PAID
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="admin2" value='unpaid'>
              <label class="form-check-label" for="admin2">
                UNPAID
              </label>
            </div>

          <?php } else {
            ?>
            <div class="form-check">

              <input class="form-check-input" type="radio" name="status" id="admin1" value='paid' >
              <label class="form-check-label" for="admin1">
                PAID
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="admin2" value='unpaid' checked>
              <label class="form-check-label" for="admin2">
                UNPAID
              </label>
            </div>
            <?php
          }
          ?>
          <hr class="mx-n3">

          <button type="submit" class="btn btn-lg btn-block btn-primary ">Submit</button>

        </form>
        <?php


    }
    else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style=" width:100%; position: absolute; top: 0; left: 0; ">
        <strong>Error!</strong> Invalid email.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
  }
}
?>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>