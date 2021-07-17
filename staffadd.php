<?php
include("header.php");
/*(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}*/
if(isset($_POST['submit']))
{
	$staffimg  = rand() . $_FILES["staff_dp"]["name"];
	move_uploaded_file($_FILES["staff_dp"]["tmp_name"],"staffimg/".$staffimg);
	$sql = "INSERT INTO staff(staff_name,login_id,gender,dob,staff_type,department_id,staff_dp,password) VALUES('$_POST[staff_name]','$_POST[login_id]','$_POST[gender]','$_POST[dob]','$_POST[staff_type]','$_POST[department_id]',$staffimg,'$_POST[password]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('Registered successfully...');</script>";
		//echo "<script>window.location='index.php';</script>";
	}
}
?>
</div>

  <!-- contact section -->

  <section class="contact_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h3>
               Registration
              </h3>
              <p>
                Staff Registration
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
                <input type="text" name="staff_name" id="staff_name" placeholder="Enter Name" required="" />
              </div>
			  
              <div>
                <label class="labelproperty">Staff ID</label>
				<input type="text" name="login_id" id="login_id" class="form-control" placeholder="Enter Staff ID" required="" />
              </div>
			  
              <div>
				<label class="labelproperty">Gender</label>
                <select name="gender" id="gender" class="form-control" required="">
				<option hidden value="">--Select--</option>
				<option>Male
				<option>Female</select>
              </div>
			  
              <div>
				<label class="labelproperty">Date of Birth</label>
                <input type="date" name="dob" id="dob" required="" />
              </div>
			  
              <div>
				<label class="labelproperty">Staff Type</label>
				<select name="staff_type" id="staff_type" class="form-control" required="">
				<option hidden value="">--Select--</option>
				<option>Assistant Professor
				<option>Lecturer
				<option>Guest Lecturer
				<option>Lab Assistant</select>
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
					echo "<option value='$rsdepartment[department_id]'>$rsdepartment[department]</option>";
				}
				?>
				</select>
              </div>
			  
			  <div>
                <label class="labelproperty">Upload Image</label>
				<input type="file" name="staff_dp" id="staff_dp" placeholder="Upload Image"/>
              </div>

			  <div>
                <label class="labelproperty">Password</label>
				<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required="" />
              </div>
			  
              </div>
			  
              <div class="d-flex justify-content-center">
                <button type="submit" name="submit" id="submit" class="btn_on-hover">Click Here to Submit</button>
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