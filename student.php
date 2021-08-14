<?php
include("header.php");
//This code checks whether staff already logged in or not.
if(isset($_SESSION['staff_id']))
{
	echo "<script>window.location='dashboard.php';</script>";
}
if(isset($_SESSION['student_id']))
{
	echo "<script>window.location='student-dashboard.php';</script>";
}
//..
if(isset($_POST['btnsubmit']))
{
	$pwd = md5($_POST['student_password']);
	$studentimg  = rand() . $_FILES["student_image"]["name"];
	move_uploaded_file($_FILES["student_image"]["tmp_name"],"studentimg/".$studentimg);
	$sql = "INSERT INTO student(student_name,course_id,student_rollno,student_password,email,st_class,student_image,gender,dob,language,elective_paper,extension_activities,student_status) VALUES('$_POST[student_name]','$_POST[course_id]','$_POST[student_rollno]','$pwd','$_POST[email]','$_POST[st_class]','$studentimg','$_POST[gender]','$_POST[dob]','$_POST[language]','$_POST[elective_paper]','$_POST[extension_activities]','Pending')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('Registered successfully. Staff needs to verify your account..');</script>";
		echo "<script>window.location='index.php';</script>";
	}
}
?>
</div>

  <!-- login section -->
  <section class="login_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="detail-box">
            <h3>
              Registration Panel
            </h3>
            <p>
             Kindly enter Registration details...
            </p>
          </div>
        </div>
        <div class="col-md-12">
          <div class="login_form">
            <form action="" method="post" enctype="multipart/form-data">
			<div class="row mdtextalign">
				<div class="col-md-6">
					<label class="labelproperty">Name</label>
					<input type="text" name="student_name" id="student_name" placeholder="Enter your Name" />
				</div>
			  
			   <div class="col-md-6">
                <label class="labelproperty">Roll Number</label>
				<input type="text" name="student_rollno" id="student_rollno" class="form-control" placeholder="Enter your Roll Number"  />
              </div>
			</div>
			<div class="row mdtextalign">
				<div class="col-md-6">
					<label class="labelproperty">Password</label>
					<input type="password" name="student_password" id="student_password" class="form-control" placeholder="Enter your Password" />
				</div>
				<div class="col-md-6">
					<label class="labelproperty">Confirm Password</label>
					<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password"  />
				</div>
				<div class="col-md-6">
					<label class="labelproperty">E-Mail ID</label>
					<input type="mail" name="email" id="email" class="form-control" placeholder="Enter your E-Mail ID"  />
				</div>
				<div class="col-md-6">
					<label class="labelproperty">Confirm E-Mail ID</label>
					<input type="mail" name="cemail" id="cemail" class="form-control" placeholder="Confirm your E-Mail ID"  />
				</div>
				</div>
			<div class="row mdtextalign">
              <div class="col-md-6">
				<label class="labelproperty">Course</label>
				<select name="course_id" id="course_id" class="form-control" >
				<option value="">--Select--</option>
				<?php
					$sqlcourse = "SELECT * FROM course WHERE course_status='Active'";
					$qsqlcourse = mysqli_query($con,$sqlcourse);
					echo mysqli_error($con);
					while($rscourse = mysqli_fetch_array($qsqlcourse))
					{
						echo "<option value='$rscourse[course_id]'>$rscourse[course_title]</option>";
					}
				?>
				</select>
              </div>
			  
			   <div class="col-md-6">
				<label class="labelproperty">Class</label>
				<select name="st_class" id="st_class" class="form-control" >
				<option value="">--Select--</option>
                <?php
				$arr = array("All Class","First Year","Second Year","Third Year");
				foreach($arr as $val)
				{
					echo "<option value='$val'>$val</option>";
				}
				?>
				</select>
              </div>
            </div>
			<div class="row mdtextalign">
			   <div class="col-md-6">
				<label class="labelproperty">Gender</label>
                <select name="gender" id="gender" class="form-control" >
				<option hidden value="">--Select--</option>
                <?php
				$arr = array("Male","Female");
				foreach($arr as $val)
				{
					echo "<option value='$val'>$val</option>";
				}
				?>
				</select>				
              </div>
			  
             <div class="col-md-6">
				<label class="labelproperty">Date of Birth</label>
                <input type="date" name="dob" id="dob" placeholder="Enter your DOB"  />
              </div>
			  
			  
            </div>
			<div class="row mdtextalign">
			  
              <div class="col-md-6">
				<label class="labelproperty">Language</label>
				<select name="language" id="language" class="form-control" required="">
				<option value="">--Select--</option>
				<?php
				$arr = array("Sanskrit","Hindi","Kannada");
				foreach($arr as $val)
				{
					echo "<option value='$val'>$val</option>";
				}
				?>
				</select>
              </div>
			  <div class="col-md-6">
                <label class="labelproperty">Elective Paper</label>
				<select name="elective_paper" id="elective_paper" class="form-control" required="">
				<option hidden value="">--Select--</option>
				<?php
				$arr = array("Sanskrit","Hindi","Kannada","English","History","Economics and Rural Development","Political Science","Journalism","Home Science","Physics","Chemistry");
				foreach($arr as $val)
				{
					echo "<option value='$val'>$val</option>";
				}
				?>				
				</select>
              </div>
            </div>
			<div class="row mdtextalign">
				<div class="col-md-6">
					<label class="labelproperty">Extension Activities</label>
					<select name="extension_activities" id="extension_activities" class="form-control" required="">
					<option hidden value="">--Select--</option>
					<?php
					$arr = array("NCC","NSS","Rovers & Rangers","Cultural","Sports","None");
					foreach($arr as $val)
					{
						echo "<option value='$val'>$val</option>";
					}
					?>				
					</select>
				</div>
				<div class="col-md-6">
					<label class="labelproperty">Upload Image</label>
					<input type="file" name="student_image" id="student_image" placeholder="Upload Image" class="form-control"/>
				</div>
            </div>

              <button type="submit" name="btnsubmit" id="submit" class="btn_on-hover">Click Here to Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end login section -->
<?php
/*$to_email="receipient@gmail.com";
$subject="Registration";
$body="Registration successful. We'll notify you after the approval. Thank You for registering.";
$headers="From: sender email";
if(mail($to_email,$subject,$body,$headers))
{
	echo "E-mail successfully sent to $to_email...";
}
else
{
	echo "Failed to send E-mail";
}*/
include("footer.php");
?>