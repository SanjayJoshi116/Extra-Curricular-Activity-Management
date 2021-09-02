<?php 
include "header.php";
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<style type="text/css">
	label{
		font-size: 22px;
		padding-left: 10px;
		}
	.label{
		font-size: 20px;
		padding-left: 0px;
		}
	</style>
	<body>

	<div class="container">
		<B><h1 align="center">PROFILE</h1></B>
		<div class="row" >
	<div class="col-md-2"></div>
			<div class="col-md-4" >
				
				<div class="card" style="background-color: #033E3E;border-radius: 20px;padding-left: 20px;">
	<br>
	<?php
	$result = "SELECT * FROM staff WHERE staff_id='$_SESSION[staff_id]'";
	$qresult = mysqli_query($con,$result);
	$row=mysqli_fetch_array($qresult);
	?>
	<div class="row" style="color: white" align="left">
	<div class="col-md-12">
		<label>Name:</label>
		<label><?php echo $row['staff_name']; ?></label>
	</div>
	
	<div class="col-md-12">
	<label>Staff Type:</label>
	<label><?php echo $row['staff_type']?></label>
	</div>
	
	<div class="col-md-12">
	<label class="label">Department ID:</label>
	<label><?php echo $row['department_id']?></label>
	</div>
	
	<div class="col-md-12">
	<label class="label">Login ID:</label>
	<label><?php echo $row['login_id']?></label>
	</div>
	
	<div class="col-md-12">
	<label class="label">Gender:</label>
	<label><?php echo $row['gender']?></label>
	</div>
	
	<div class="col-md-12">
	<label class="label">DOB:</label>
	<label><?php echo $row['dob']?></label>
	</div>
	
	</div>
	</div>
	</div>
	<div class="col-md-6">
				<img src="staffimg/<?php echo $row['staff_dp']?>" style="width:300px;height: 300px;border-radius: 20px;">
	</div>
	</div>
	</div>
</body>
</html>	
<?php
include "footer.php";
?>