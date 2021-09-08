<?php
include("header.php");
if(!isset($_SESSION['student_id']))
{
	echo "<script>window.location='login.php';</script>";
}
//Insert & Update Statement condition starts here
if(isset($_POST['submit']))
{
	$pwd = md5($_POST['student_password']);
	$studentimg  = rand() . $_FILES["student_image"]["name"];
	move_uploaded_file($_FILES["student_image"]["tmp_name"],"studentimg/".$studentimg);
	$sql="UPDATE student SET student_name='$_POST[student_name]',course_id='$_POST[course_id]',student_rollno='$_POST[student_rollno]'";
	$sql = $sql . ",st_class='$_POST[st_class]'";
	if($_FILES["student_image"]["name"] != "")
	{
	$sql = $sql . ",student_image='$studentimg'";
	}
	$sql = $sql . ",gender='$_POST[gender]',dob='$_POST[dob]',language='$_POST[language]',elective_paper='$_POST[elective_paper]',extension_activities='$_POST[extension_activities]' WHERE student_id='$_SESSION[student_id]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Student Profile updated successfully..');</script>";
	}
}
if(isset($_SESSION['student_id']))
{
	$sqledit= "SELECT * FROM student where student_id='$_SESSION[student_id]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
<style>
.contact_section::before {
    width: 1%;
}
.sub_page .contact_section {
    margin: 5px 0;
}
</style>
  <!-- contact section -->
  <section class="contact_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="contact-form">
            <h5>
              Student Profile
            </h5>
            <form action="" method="post" name="registration" id="registration" enctype="multipart/form-data" class="row" >
			
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<label class="labelproperty">Upload Image</label>
					<input type="file" name="student_image" id="student_image" placeholder="Upload Image" class="form-control"/>
					<center><?php
					if($rsedit['student_image'] == "")
					{
						echo "<img src='images/defaultimage.png' style='width: 170px;height:200px;border-radius: 50%;' />";
					}
					else if(file_exists("studentimg/" . $rsedit['student_image']))
					{
						echo "<img src='studentimg/" . $rsedit['student_image'] . "' style='width: 170px;height:200px;border-radius: 50%;' />";
					}
					else
					{
						echo "<img src='images/defaultimage.png' style='width: 170px;height:200px;border-radius: 50%;' />";
					}
					?></center>
              </div>
			  <div class="col-md-4"></div>

              <div class="col-md-6">
				<label class="labelproperty">Name</label>
				<input type="text" name="student_name" id="student_name" placeholder="Enter your Name" value="<?php echo $rsedit['student_name']; ?>"  />
              </div>
			  
              <div class="col-md-6">
                <label class="labelproperty">Roll Number</label>
				<input type="text" name="student_rollno" id="student_rollno" class="form-control" placeholder="Enter your Roll Number" value="<?php echo $rsedit['student_rollno']; ?>"  readonly />
              </div>
              <div class="col-md-6">
				<label class="labelproperty">Course</label>
				<select name="course_id" id="course_id" class="form-control" >
				<?php
					$sqlcourse = "SELECT * FROM course WHERE course_status='Active'";
					$qsqlcourse = mysqli_query($con,$sqlcourse);
					echo mysqli_error($con);
					while($rscourse = mysqli_fetch_array($qsqlcourse))
					{
						if($rscourse['course_id'] == $rsedit['course_id'])
						{
						echo "<option value='$rscourse[course_id]' selected>$rscourse[course_title]</option>";
						}
					}
				?>
				</select>
              </div>
			  
			  <div class="col-md-6">
				<label class="labelproperty">Class</label>
				<select name="st_class" id="st_class" class="form-control" >
                <?php
				$arr = array("First Year","Second Year","Third Year");
				foreach($arr as $val)
				{
					if($val == $rsedit['st_class'])
					{
					echo "<option value='$val' selected>$val</option>";
					}
				}
				?>
				</select>
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
                <input type="date" name="dob" id="dob" placeholder="Enter your DOB" value="<?php echo $rsedit['dob']; ?>"  />
              </div>
			  
			  <div class="col-md-6">
                <label class="labelproperty">Language</label>
				<select name="language" id="language" class="form-control" required="">
				<option value="">--Select--</option>
				<?php
				$arr = array("Sanskrit","Hindi","Kannada");
				foreach($arr as $val)
				{
					if($val == $rsedit['language'])
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
				<label class="labelproperty">Elective Paper </label>
				<select name="elective_paper" id="elective_paper" class="form-control" required="">
				<option hidden value="">--Select--</option>
				<?php
				$arr = array("Sanskrit","Hindi","Kannada","English","History","Economics and Rural Development","Political Science","Journalism","Home Science","Physics","Chemistry");
				foreach($arr as $val)
				{
					if($val == $rsedit['elective_paper'])
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
				<label class="labelproperty">Extension Activities</label>
					<select name="extension_activities" id="extension_activities" class="form-control" required="">
					<option hidden value="">--Select--</option>
					<?php
					$arr = array("NCC","NSS","Rovers & Rangers","Cultural","Sports","None");
					foreach($arr as $val)
					{
						if($val  == $rsedit['extension_activities'])
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
            
              
			  
              <div class="col-md-12">
				  <hr>
                <center><button type="submit" name="submit" id="submit" class="btn_on-hover">Update Profile</button></center>
              </div>
			  
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