<?php
	session_start();
	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$name = "";
	$email = "";
	$password = "";
	$mobile = "";
	$address = "";
	$query = "select * from users";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registered user</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Hand:wght@400..700&family=Sevillana&display=swap"
		rel="stylesheet">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="../style.css">
</head>

<body style="overflow: auto;">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="admin_dashboard.php"><b><b>B</b>ook<b>K</b>eeper</b> - A library management
				system</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
			</button>

			<span style="color:lightgreen;  font-family: Edu AU VIC WA NT Hand, cursive;"><strong><span
						style="color:white;  font-family: cursive;">Welcome: </span>
					<?php echo $_SESSION['name']; ?>
				</strong></span>
			<span style="color:lightgreen;  font-family: Edu AU VIC WA NT Hand, cursive;"><strong><span
						style="color:white;  font-family: cursive;">Email ID: </span>
					<?php echo $_SESSION['email']; ?>
				</strong></span>

			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Profile</a>
					<div class="dropdown-menu" aria-labelledby="profileDropdown">
						<a class="dropdown-item" href="view_profile.php">View Profile</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="change_password.php">Change Password</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</nav>
	<nav class="navbar navbar-expand-lg navbar-light  nav-trans">
		<div class="container-fluid">

			<ul class="nav navbar-nav navbar-center">
				<li class="nav-item">
					<a class="nav-link nav-btn" href="admin_dashboard.php">Dashboard</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle nav-btn" data-toggle="dropdown">Books </a>
					<div class="dropdown-menu">
						<a class="dropdown-item dropdown-btn" href="add_book.php">Add New Book</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item dropdown-btn" href="manage_book.php">Manage Books</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle nav-btn" data-toggle="dropdown">Category </a>
					<div class="dropdown-menu">
						<a class="dropdown-item dropdown-btn" href="add_cat.php">Add New Category</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item dropdown-btn" href="manage_cat.php">Manage Category</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle nav-btn" data-toggle="dropdown">Authors</a>
					<div class="dropdown-menu">
						<a class="dropdown-item dropdown-btn" href="add_author.php">Add New Author</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item dropdown-btn" href="manage_author.php">Manage Author</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link nav-btn" href="issue_book.php">Issue Book</a>
				</li>
			</ul>
		</div>
	</nav>
	<span>
	<marquee behavior="alternate" direction="left" scrollamount="12"> <strong>BookKeeper: Unveiling the world of knowledge from 8
    AM to 10 PM.</strong></marquee>
	</span>
	<div class="row">
		<span style="color:aqua;"><center><h3><u>Registered User details</u></h3><br></center></span>
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<form>
					<table class="table-bordered" style="margin:auto;">
						<tr>
							<th>NAME</th>
							<th>EMAIL ID</th>
							<th>MOBILE</th>
							<th>ADDRESS</th>
						</tr>
				
					<?php
					
						$query_run = mysqli_query($connection,$query);
						while ($row = mysqli_fetch_assoc($query_run)){
							$name = $row['name'];
							$email = $row['email'];
							$mobile = $row['mobile'];
							$address = $row['address'];
					?>
						<tr>
							<td><?php echo $name;?></td>
							<td><?php echo $email;?></td>
							<td><?php echo $mobile;?></td>
							<td><?php echo $address;?></td>
						</tr>
					<?php
						}
					?>	
				</table>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
</body>
</html>
