<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
//Insert & Update Statement condition starts here
if(isset($_POST['submit']))
{
	$pwd = md5($_POST['student_password']);
	$studentimg  = rand() . $_FILES["student_image"]["name"];
	move_uploaded_file($_FILES["student_image"]["tmp_name"],"studentimg/".$studentimg);
	if(isset($_GET['editid']))
	{
		$sql="UPDATE student SET student_name='$_POST[student_name]',course_id='$_POST[course_id]',student_rollno='$_POST[student_rollno]'";
		if($_POST['student_password'] != "")
		{
		$sql = $sql . ",student_password='$pwd'";
		}
		$sql = $sql . ",st_class='$_POST[st_class]'";
		if($_FILES["student_image"]["name"] != "")
		{
		$sql = $sql . ",student_image='$studentimg'";
		}
		$sql = $sql . ",gender='$_POST[gender]',dob='$_POST[dob]',language='$_POST[language]',elective_paper='$_POST[elective_paper]',extension_activities='$_POST[extension_activities]',student_status='$_POST[student_status]' WHERE student_id='$_GET[editid]'";
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
		$sql = "INSERT INTO student(student_name,course_id,student_rollno,student_password,st_class,student_image,gender,dob,language,elective_paper,extension_activities,student_status) VALUES('$_POST[student_name]','$_POST[course_id]','$_POST[student_rollno]','$pwd','$_POST[st_class]','$studentimg','$_POST[gender]','$_POST[dob]','$_POST[language]','$_POST[elective_paper]','$_POST[extension_activities]','$_POST[student_status]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con)==1)
		{
			echo "<script>alert('Student Account Added successfully..');</script>";
			echo "<script>window.location='viewstudent.php';</script>";
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit= "SELECT * FROM student where student_id='$_GET[editid]'";
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
               Student Account
              </h3>
              <p>
                Add/Edit Student Account
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
              Kindly Enter Student Detail
            </h5>
            <form action="" method="post" name="registration" id="registration" enctype="multipart/form-data" onsubmit="return validateform()">
			
              <div>
				<label class="labelproperty">Name</label>
				<span class="errormessage" id="id_student_name"></span>
				<input type="text" name="student_name" id="student_name" placeholder="Enter your Name" value="<?php echo $rsedit['student_name']; ?>" />
              </div>
			  
              <div>
                <label class="labelproperty">Roll Number</label>
				<span class="errormessage" id="id_student_rollno"></span>
				<input type="text" name="student_rollno" id="student_rollno" class="form-control" placeholder="Enter your Roll Number" value="<?php echo $rsedit['student_rollno']; ?>"  />
              </div>
			  
              <div>
				<label class="labelproperty">Password</label>
				<span class="errormessage" id="id_student_password"></span>
				<input type="password" name="student_password" id="student_password" class="form-control" placeholder="Enter your Password" />
              </div>
			  
              <div>
				<label class="labelproperty">Confirm Password</label>
				<span class="errormessage" id="id_cpassword"></span>
				<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password"  />
              </div>
			  
              <div>
				<label class="labelproperty">Course</label>
				<span class="errormessage" id="id_course_id"></span>
				<select name="course_id" id="course_id" class="form-control" >
				<option value="">Select Course</option>
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
						else
						{
						echo "<option value='$rscourse[course_id]'>$rscourse[course_title]</option>";
						}
					}
				?>
				</select>
              </div>
			  
			  <div>
				<label class="labelproperty">Class</label>
				<span class="errormessage" id="id_st_class"></span>
				<select name="st_class" id="st_class" class="form-control" >
				<option value="">All Class</option>
                <?php
				$arr = array("First Year","Second Year","Third Year");
				foreach($arr as $val)
				{
					if($val == $rsedit['st_class'])
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
                <label class="labelproperty">Gender</label>
				<span class="errormessage" id="id_gender"></span>
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

			  <div>
                <label class="labelproperty">Date of Birth</label>
				<span class="errormessage" id="id_dob"></span>
                <input type="date" name="dob" id="dob" placeholder="Enter your DOB" value="<?php echo $rsedit['dob']; ?>"  />
              </div>
			  
			  <div>
                <label class="labelproperty">Language</label>
				<span class="errormessage" id="id_language"></span>
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
			  
              <div>
				<label class="labelproperty">Elective Paper </label>
				<span class="errormessage" id="id_elective_paper"></span>
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
              
              <div>
				<label class="labelproperty">Extension Activities</label>
				<span class="errormessage" id="id_extension_activities"></span>
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
              
              <div>
				<label class="labelproperty">Upload Image</label>
					<input type="file" name="student_image" id="student_image" placeholder="Upload Image" class="form-control"/>
					<?php
					if(isset($_GET['editid']))
					{
						if($rsedit['student_image'] == "")
						{
							echo "<img src='images/defaultimage.png' style='width: 170px;height:200px;' />";
						}
						else if(file_exists("studentimg/" . $rsedit['student_image']))
						{
							echo "<img src='studentimg/" . $rsedit['student_image'] . "' style='width: 170px;height:200px;' />";
						}
						else
						{
							echo "<img src='images/defaultimage.png' style='width: 170px;height:200px;' />";
						}
					}
					?>
              </div>
              
              <div>
				<label class="labelproperty">Student Account Status</label>
				<span class="errormessage" id="id_student_status"></span>
				<select name="student_status" id="student_status" class="form-control" >
				<option value="">Select Status</option>
                <?php
				$arr = array("Active","Inactive");
				foreach($arr as $val)
				{
					if($val == $rsedit['student_status'])
					{
					echo "<option value='$val' selected >$val</option>";
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
	if($('#student_status').val() == "")
	{
		$('#id_student_status').html("Student Status should not be empty..");
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