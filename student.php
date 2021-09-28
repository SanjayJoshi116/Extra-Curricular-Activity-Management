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
	$sql = "INSERT INTO student(student_name,course_id,student_rollno,student_password,st_class,student_image,gender,dob,language,elective_paper,extension_activities,student_status) VALUES('$_POST[student_name]','$_POST[course_id]','$_POST[student_rollno]','$pwd','$_POST[st_class]','$studentimg','$_POST[gender]','$_POST[dob]','$_POST[language]','$_POST[elective_paper]','$_POST[extension_activities]','Pending')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		$insid = mysqli_insert_id($con);
		$_SESSION['sessioncode'] = rand(111111,999999);
		include("phpmailer.php");
		$protocol = 'http'.(!empty($_SERVER['HTTPS']) ? 's' : '');
		$root = $protocol.'://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
		$link = $root . "/login.php?sessionid=".$_SESSION['sessioncode']."&studentid=".$insid;
		$email = $_POST['student_rollno'] . "@sdmcujire.in";
		//$email = "aravinda@technopulse.in";
		$subject="ExtraCurricular Email Activation Link";
		$message = "<b>Hi $_POST[student_name],<br><br>
		Thanks for creating Account in Extra Curricular Activity Management. To activate your account you need to click following link:
		<br>
		<a href='$link'>Click Here to Activate</a></b>
		<br><br>
		SDM College (Autonomous), Ujire, 574240<br>
		sdmcollege@sdmcujire.in<br>
		Call : 08256-236221, 225";
		sendmail($email,$_POST['student_name'],$subject,$message);
		echo "<script>alert('Kindly check your Email account to activate account..');</script>";
		echo "<script>window.location='index.php';</script>";
	}
}
?>
</div>

  <!-- login section -->
  <section class="login_section layout_padding">
    <div class="container"><br>
      <div class="row">
        <div class="col-md-12"><br>
          <centeR><div class="detail-box">
            <h3>
              Registration Panel
            </h3>
            <p>
             Kindly enter Registration details...
            </p>
          </div></center>
        </div>
        <div class="col-md-12">
          <div class="login_form">
            <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateform()">
			<div class="row mdtextalign">
				<div class="col-md-6">
					<label class="labelproperty">Name</label>
					<span class="errormessage" id="id_student_name"></span>
					<input type="text" name="student_name" id="student_name" placeholder="Enter your Name" />
				</div>
			  
			   <div class="col-md-6">
                <label class="labelproperty">Roll Number</label>
					<span class="errormessage" id="id_student_rollno"></span>
				<input type="text" name="student_rollno" id="student_rollno" class="form-control" placeholder="Enter your Roll Number"  />
              </div>
			</div>
			<div class="row mdtextalign">
				<div class="col-md-6">
					<label class="labelproperty">Password</label>
					<span class="errormessage" id="id_student_password"></span>
					<input type="password" name="student_password" id="student_password" class="form-control" placeholder="Enter your Password" />
				</div>
				<div class="col-md-6">
					<label class="labelproperty">Confirm Password</label>
					<span class="errormessage" id="id_cpassword"></span>
					<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password"  />
				</div>
			</div>
			<div class="row mdtextalign">
              <div class="col-md-6">
				<label class="labelproperty">Course</label>
					<span class="errormessage" id="id_course_id"></span>
				<select name="course_id" id="course_id" class="form-control" >
				<option value="">All Course</option>
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
					<span class="errormessage" id="id_st_class"></span>
				<select name="st_class" id="st_class" class="form-control" >
				<option value="">Select Class</option>
                <?php
				$arr = array("First Year","Second Year","Third Year");
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
					<span class="errormessage" id="id_gender"></span>
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
					<span class="errormessage" id="id_dob"></span>
                <input type="date" name="dob" id="dob" placeholder="Enter your DOB"  />
              </div>
            </div>
			<div class="row mdtextalign">
			  
              <div class="col-md-6">
				<label class="labelproperty">Language</label>
				<span class="errormessage" id="id_language"></span>
				<select name="language" id="language" class="form-control" >
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
					<span class="errormessage" id="id_elective_paper"></span>
				<select name="elective_paper" id="elective_paper" class="form-control" >
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
					<span class="errormessage" id="id_extension_activities"></span>
					<select name="extension_activities" id="extension_activities" class="form-control" >
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
					<label class="labelproperty" id="id_student_rollno">Upload Image</label>
					<span class="errormessage" id="id_student_image"></span>
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
include("footer.php");
?>
<script>
function validateform()
{
	//Regex Starts Here
	var numericExpression = /^[0-9]+$/;
	var alphaExp = /^[a-zA-Z]+$/;
	var alphaSpaceExp = /^[a-zA-Z\s]+$/;
	var alphaNumericExp = /^[0-9a-zA-Z]+$/;
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	//Regex Ends Here
	$('.errormessage').html('');
	var errmsg = "No";
	if(!$('#student_name').val().match(alphaSpaceExp))
	{
		$('#id_student_name').html("Student name should contain charcter values...");
		errmsg = "Yes";
	} 
	if($('#student_name').val() == "")
	{
		$('#id_student_name').html("Student Name should not be empty..");
		errmsg = "Yes";
	} 
	if(!$('#student_rollno').val().match(numericExpression))
	{
		$('#id_student_rollno').html("Roll Number should contain numeric values..");
		errmsg = "Yes";
	} 
	if($('#student_rollno').val() == "")
	{
		$('#id_student_rollno').html("Student Roll Number should not be empty..");
		errmsg = "Yes";
	}
	
	if($('#student_password').val().length < 8 )
	{
		$('#id_student_password').html("Password should contain more than 8 characters..");
		errmsg = "Yes";
	} 
	if($('#student_password').val() == "")
	{
		$('#id_student_password').html("Student Password should not be empty..");
		errmsg = "Yes";
	} 
	if($('#student_password').val()  != $('#cpassword').val())
	{
		$('#id_cpassword').html("Password and Confirm Password not matching...");
		errmsg = "Yes";
	}
	if($('#cpassword').val() == "")
	{
		$('#id_cpassword').html("Confirm Password should not be empty..");
		errmsg = "Yes";
	}
	if($('#course_id').val() == "")
	{
		$('#id_course_id').html("Kindly select the course..");
		errmsg = "Yes";
	} 
	    
	if($('#st_class').val() == "")
	{
		$('#id_st_class').html("Student class should not be empty..");
		errmsg = "Yes";
	}  
	if($('#gender').val() == "")
	{
		$('#id_gender').html("Gender should not be empty..");
		errmsg = "Yes";
	}
	if($('#dob').val() == "")
	{
		$('#id_dob').html("Date of Birth should not be empty..");
		errmsg = "Yes";
	}
	if($('#language').val() == "")
	{
		$('#id_language').html("Kindly select language..");
		errmsg = "Yes";
	}
	if($('#elective_paper').val() == "")
	{
		$('#id_elective_paper').html("Kindly select Elective paper..");
		errmsg = "Yes";
	}       
	if($('#extension_activities').val() == "")
	{
		$('#id_extension_activities').html("Kindly select extension activities ...");
		errmsg = "Yes";
	}
	if($('#student_image').val() == "")
	{
		$('#id_student_image').html("Student Image should not be empty..");
		errmsg = "Yes";
	}
	if(errmsg == "Yes")
	{
		return false;
	}
	if(errmsg == "No")
	{
		return true;
	}
} 
</script>