<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BookKeeper login page</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Hand:wght@400..700&family=Sevillana&display=swap" rel="stylesheet">
<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
  
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><b><b>B</b>ook<b>K</b>eeper</b> - A library management system</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      </button>
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Admin Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php">User Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../signup.php">Register</a>
        </li>
    </div>
  </nav>
  <marquee behavior="alternate" direction="left" scrollamount="12"> BookKeeper: Unveiling the world of knowledge from 8
    AM to 10 PM.</marquee>
    <br>
    <div style="background-color:rgba(0,0,0,0.2);padding:5px;">&nbsp;</div>
  <div class="row">
    <div class="col-md-4" id="side_bar">
      <br>
      <h5><b>Library Timing</b></h5>
      <ul>
        <li>Opening Timing 08:00 AM</li>
        <li>Closing Timing 10:00 PM</li>
        <li>SUNDAYS OFF</li>
      </ul>
      <br>
      <h5><b>Our features</b></h5>
      <ul>
        <li>Diverse collection of books and resources</li>
        <li>Study spaces (individual and group)</li>
        <li>Free Wi-fi</li>
        <li>News paper and Reference services</li>
        <li>Quite and Comfortable environment</li>
        <li>Access to electronic resources</li>
        <li>Special collections</li>
        <li>Pure water</li>
      </ul>
    </div>
    <div class="col-md-4" id="main_content">
      <center>
        <h2 style=" color: lightgreen;"> <u> Admin Login Form</u> </h2>
      </center>
      <form action="" method="post">
        <br>
          <img class="user_icon" src="../images\admin_icon.png" alt="">
          
        <div class="form-group">
          <label for="name"><b>Email ID:</b></label>
            <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
        </div>
        
        
        <div class="form-group">
          <label for="name"><b>Password:</b></label>
            <input type="password" name="password" class="form-control" placeholder="Enter secret password" required>
        </div>
        <br>
        <button type="submit" name="login" class="btn btn-primary">&nbsp;&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;</button>
      </form>
      <?php 
if(isset($_POST['login'])){
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"lms");
    $query = "select * from admins where email = '$_POST[email]'";
    $query_run = mysqli_query($connection,$query);
    
    $email_found = false;
    
    while ($row = mysqli_fetch_assoc($query_run)) {
        $email_found = true;
        if($row['email'] == $_POST['email']){
            if($row['password'] == $_POST['password']){
                $_SESSION['name'] =  $row['name'];
                $_SESSION['email'] =  $row['email'];
                $_SESSION['id'] =  $row['id'];
                header("Location: admin_dashboard.php");
                exit();
            } else {
                ?>
                <div id="password_wrong_Alert" class="password_alert" style="color:red; margin-left:80px;">
                    <span class="closebtn" onclick="closeAlert()">&times;</span>
                    <strong>Error!</strong> Wrong password... Try again.
                </div>
                <?php
            }
        }
    }
    
    if (!$email_found) {
        ?>
        <div id="email_wrong_Alert" class="email_alert" style="color:red; margin-left:80px;">
            <span class="closebtn" onclick="closeAlert()">&times;</span>
            <strong>Error!</strong> Email not found... Try again.
        </div>
        <?php
    }
}
?>

    </div>
    <div class="col-md-4" id="notification">
      <h2 style=" color: lightgreen; margin: 0px 50px 0px 85px ; font-weight: bold;"> <u> Notification and Quotes</u> </h2>
      <div class="scroll-content">
        <p>"The only thing that you absolutely have to know, is the location of the library." - Albert Einstein</p>
        <p>"A library is not a luxury but one of the necessities of life." - Henry Ward Beecher</p>
        <p>"I have always imagined that Paradise will be a kind of library." - Jorge Luis Borges</p>
        <p>"Libraries store the energy that fuels the imagination. They open up windows to the world and inspire us to explore and achieve, and contribute to improving our quality of life." - Sidney Sheldon</p>
        <p>"When in doubt, go to the library." - J.K. Rowling, Harry Potter and the Chamber of Secrets</p>
        <p>"A library is a place where you can lose your innocence without losing your virginity." - Germaine Greer</p>
        <p>"The library is the temple of learning, and learning has liberated more people than all the wars in history." - Carl T. Rowan</p>
        <p>"Libraries are the backbone of our educational system and the cornerstone of our communities." - Bill Gates</p>
        <p>"A library outranks any other one thing a community can do to benefit its people. It is a never failing spring in the desert." - Andrew Carnegie</p>
        <p>"In the nonstop tsunami of global information, librarians provide us with floaties and teach us to swim." - Linton Weeks</p>
        <p>"The only thing that you absolutely have to know, is the location of the library." - Albert Einstein</p>
        <p>"A library is not a luxury but one of the necessities of life." - Henry Ward Beecher</p>
        <p>"I have always imagined that Paradise will be a kind of library." - Jorge Luis Borges</p>
        <p>"Libraries store the energy that fuels the imagination. They open up windows to the world and inspire us to explore and achieve, and contribute to improving our quality of life." - Sidney Sheldon</p>
        <p>"When in doubt, go to the library." - J.K. Rowling, Harry Potter and the Chamber of Secrets</p>
        <p>"A library is a place where you can lose your innocence without losing your virginity." - Germaine Greer</p>

      </div>
    </div>

  </div>



</body>

</html>