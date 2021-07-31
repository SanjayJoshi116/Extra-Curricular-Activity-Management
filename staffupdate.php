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
  if(isset($_GET['editid']))
	{
		$sql="UPDATE staff SET staff_name='$_POST[staff_name]'";
		if($_FILES["student_image"]["name"] != "")
		{
		$sql = $sql . ",staff_dp='$staffimg'";
		}
		$sql = $sql . ",staff_type='$_POST[staff_type]',department_id='$_POST[department_id]',login_id='$_POST[login_id]'";
    if($_POST['student_password'] != "")
		{
		$sql = $sql . ",student_password='$pwd'";
		}
    $sql = $sql . ",staff_status='$_POST[staff_status]',gender='$_POST[gender]' WHERE staff_id='$_GET[editid]'";
    $qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Student Record updated successfully..');</script>";
			echo "<script>window.location='viewstudent.php';</script>";
		}
	}
	else
	{
	$sql = "INSERT INTO staff(staff_name,staff_dp,staff_type,department_id,login_id,password,staff_status,gender) VALUES('$_POST[staff_name]','$staffimg','$_POST[staff_type]','$_POST[department_id]','$_POST[login_id]','$pwd','$_POST[staff_status]','$_POST[gender]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('Registered successfully...');</script>";
		echo "<script>window.location='staffadd.php';</script>";
	}
}
  }
if(isset($_GET['editid']))
{
	$sqledit= "SELECT * FROM staff where staff_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>

  <!-- contact section -->

  <section class="contact_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h3>
               Staff Account
              </h3>
              <p>
                Add/Edit Staff
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
              Kindly Register to get benefits
            </h5>
            <form action="" method="post" name="registration" id="registration" enctype="multipart/form-data">
			
              <div>
				<label class="labelproperty">Name</label>
                <input type="text" name="staff_name" id="staff_name" placeholder="Enter Name" required="" value="<?php echo $rsedit['staff_name']; ?>" />
              </div>
			  
              <div>
                <label class="labelproperty">Staff ID</label>
				<input type="text" name="login_id" id="login_id" class="form-control" placeholder="Enter Staff ID" required="" value="<?php echo $rsedit['staff_id']; ?>"/>
              </div>
			  
              <div>
				<label class="labelproperty">Gender</label>
                <select name="gender" id="gender" class="form-control" required="">
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
			  
              <div>
				<label class="labelproperty">Date of Birth</label>
                <input type="date" name="dob" id="dob" required="" value="<?php echo $rsedit['dob']; ?>"/>
              </div>
			  
              <div>
				<label class="labelproperty">Staff Type</label>
				<select name="staff_type" id="staff_type" class="form-control" required="">
				<option hidden value="">--Select--</option>
				<?php
				$arr = array("Assistant Professor","Lecturer","Guest Lecturer","Lab Assistant");
				foreach($arr as $val)
				{
					if($val == $rsedit['staff_type'])
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
			  
			  <div>
				<label class="labelproperty">Department</label>
                <select name="department_id" id="department_id" class="form-control" >
				<option value="">Department</option>
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
          else
          {
            echo "<option value='$rsdepartment[department_id]'>$rsdepartment[department]</option>";
          }	
				}
				?>
				</select>
              </div>
			  
			  <div>
                <label class="labelproperty">Upload Image</label>
				<input type="file" name="staff_dp" id="staff_dp" placeholder="Upload Image" class="form-control"/>
				<?php
					if(isset($_GET['editid']))
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

			  <div>
                <label class="labelproperty">Password</label>
				<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required="" />
              </div>
			  
			  <div>
                <label class="labelproperty">Confirm Password</label>
				<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm the password" required="" />
              </div>
			  
              
              <div>
				<label class="labelproperty">Select Staff Account Status</label>
				<select name="staff_status" id="staff_status" class="form-control" >
				<option value="">Select Status</option>
				<?php
				$arr = array("Active","Inactive");
				foreach($arr as $val)
				{
					if($val == $rsedit['staff_status'])
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