<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_POST['submit']))
{
	$staffimg  = rand() . $_FILES["staff_dp"]["name"];
	move_uploaded_file($_FILES["staff_dp"]["tmp_name"],"staffimg/".$staffimg);
	$pwd = md5($_POST['password']);
	$sql="UPDATE staff SET staff_name='$_POST[staff_name]'";
	if($_FILES["staff_dp"]["name"] != "")
	{
	$sql = $sql . ",staff_dp='$staffimg'";
	}
	$sql = $sql . ",staff_type='$_POST[staff_type]',department_id='$_POST[department_id]',login_id='$_POST[login_id]'";
	$sql = $sql . ",gender='$_POST[gender]',dob='$_POST[dob]' WHERE staff_id='" . $_SESSION['staff_id'] . "'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Staff Profile updated successfully..');</script>";
	}
}
if(isset($_SESSION['staff_id']))
{
	$sqledit= "SELECT * FROM staff where staff_id='" . $_SESSION['staff_id'] . "'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
<style>
.contact_section::before {
    width: 1%;
}
.sub_page .contact_section {
    margin: 15px 0;
}
</style>
  <!-- contact section -->

  <section class="contact_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="contact-form">
			 <center><h3 style="color: white;">Staff Profile</h3></center>
            <h5>
              Kindly update Staff Profile
            </h5>
            <form action="" method="post" name="registration" id="registration" enctype="multipart/form-data">
<div class="row">			
	  <div class="col-md-6">
		<label class="labelproperty">Name</label>
		<input type="text" name="staff_name" id="staff_name" placeholder="Enter Name" class="form-control" value="<?php echo $rsedit['staff_name']; ?>" />
		
				<label class="labelproperty">Department</label>
                <select name="department_id" id="department_id" class="form-control" >
				<?php
				$sqldepartment = "SELECT * FROM department WHERE department_status='Active'";
				$qsqldepartment = mysqli_query($con,$sqldepartment);
				echo mysqli_error($con);
				while($rsdepartment = mysqli_fetch_array($qsqldepartment))
				{
          if($rsdepartment['department_id'] == $rsedit['department_id'])
          {
          echo "<option value='$rsdepartment[department_id]' selected>$rsdepartment[department]</option>";
          }
				}
				?>
				</select>
				
		<label class="labelproperty">Staff Type</label>
		<select name="staff_type" id="staff_type" class="form-control">
		<?php
		$arr = array("Admin","HOD","Assistant Professor","Lecturer","Guest Lecturer","Lab Assistant");
		foreach($arr as $val)
		{
			if($val == $rsedit['staff_type'])
			{
			echo "<option value='$val' selected>$val</option>";
			}
		}
		?>
		</select>
	  </div>
	  
	<div class="col-md-6">
		<label class="labelproperty">Upload Image</label>
		<input type="file" name="staff_dp" id="staff_dp" placeholder="Upload Image" class="form-control"/>
		<?php
			if(isset($_SESSION['staff_id']))
			{	
				if($rsedit['staff_dp'] == "")
				{
					echo "<img src='images/defaultimage.png' style='width: 170px;height:200px;' />";
				}
				else if(file_exists("staffimg/" . $rsedit['staff_dp']))
				{
					echo "<img src='staffimg/" . $rsedit['staff_dp'] . "' style='width: 170px;height:200px;' />";
				}
				else
				{
					echo "<img src='images/defaultimage.png' style='width: 170px;height:200px;' />";
				}
			}
			?>
	</div>
			  
	  <div class="col-md-6">
		<label class="labelproperty">Staff ID</label>
		<input type="text" name="login_id" id="login_id" class="form-control" placeholder="Enter Staff ID" required="" value="<?php echo $rsedit['login_id']; ?>"/>
	  </div>
	  
	  <div class="col-md-6">

	  </div>
			   
	   <div class="col-md-6">
				<label class="labelproperty">Gender</label>
                <select name="gender" id="gender" class="form-control" >
				<option hidden value="">--Select--</option>
				<?php 
				$arr = array("Male","Female");
				foreach($arr as $val)
				{
					if($val == $rsedit['gender'])
					{
					echo "<option value='$val' selected>$val</option>";
					}
					else
					{
					echo "<option value='$val'>$val</option>";
					}
				}
				?>
				</select>
        </div>
		
			  
	  <div class="col-md-6">
		<label class="labelproperty">Date of Birth</label>
		<input type="date" name="dob" id="dob" required="" value="<?php echo $rsedit['dob']; ?>"/>
	  </div>
	  
</div>


              <div class="d-flex justify-content-center">
                <button type="submit" name="submit" id="submit" class="btn_on-hover">Click Here to Submit</button>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->
<?php
include("footer.php");
?>