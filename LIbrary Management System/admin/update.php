<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$query = "update admins set name = '$_POST[name]',email = '$_POST[email]',mobile = '$_POST[mobile]'";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Updated successfully...\n         Log out and login again");
	window.location.href = "view_profile.php";
</script>