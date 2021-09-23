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
		if($_FILES["staff_dp"]["name"] != "")
		{
		$sql = $sql . ",staff_dp='$staffimg'";
		}
		$sql = $sql . ",staff_type='$_POST[staff_type]',department_id='$_POST[department_id]',login_id='$_POST[login_id]'";
    if($_POST['password'] != "")
		{
		$sql = $sql . ",password='$pwd'";
		}
    $sql = $sql . ",gender='$_POST[gender]',dob='$_POST[dob]',staff_status='$_POST[staff_status]' WHERE staff_id='$_GET[editid]'";
    $qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Staff Record updated successfully..');</script>";
			echo "<script>window.location='viewstaff.php';</script>";
		}
	}
	else
	{
	$sql = "INSERT INTO staff(staff_name,staff_dp,staff_type,department_id,login_id,password,gender,dob,staff_status) VALUES('$_POST[staff_name]','$staffimg','$_POST[staff_type]','$_POST[department_id]','$_POST[login_id]','$pwd','$_POST[gender]','$_POST[dob]','$_POST[staff_status]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('Registered successfully...');</script>";
		echo "<script>window.location='staffupdate.php';</script>";
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
<style>
.contact_section::before {
    width: 10%;
}
.sub_page .contact_section {
    margin: 25px 0;
}
</style>
  <!-- contact section -->

  <section class="contact_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="contact-form">
			 <center><h3 style="color: white;">Staff Account</h3></center>
            <h5>
              Kindly Register to get benefits
            </h5>
            <form action="" method="post" name="registration" id="registration" enctype="multipart/form-data" onsubmit="return validateform()">
<div class="row">			
	  <div class="col-md-6">
		<label class="labelproperty">Name</label>
		<span class="errormessage" id="id_staff_name"></span>
		<input type="text" name="staff_name" id="staff_name" placeholder="Enter Name" class="form-control" value="<?php echo $rsedit['staff_name']; ?>" />
	  </div>
	  
	<div class="col-md-6">
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
			  
			  <div class="col-md-6">
				<label class="labelproperty">Department</label>
				<span class="errormessage" id="id_department_id"></span>
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
			  
	  <div class="col-md-6">
		<label class="labelproperty">Staff Type</label>
		<span class="errormessage" id="id_staff_type"></span>
		<select name="staff_type" id="staff_type" class="form-control">
		<option hidden value="">--Select--</option>
		<?php
		$arr = array("Admin","HOD","Assistant Professor","Lecturer","Guest Lecturer","Lab Assistant");
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
			  
	  <div class="col-md-6">
		<label class="labelproperty">Staff ID</label>
		<span class="errormessage" id="id_login_id"></span>
		<input type="text" name="login_id" id="login_id" class="form-control" placeholder="Enter Staff ID" required="" value="<?php echo $rsedit['staff_id']; ?>"/>
	  </div>
	  
	  <div class="col-md-6">

	  </div>
	  <div class="col-md-6">
		<label class="labelproperty">Password</label>
		<span class="errormessage" id="id_password"></span>
		<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password"  />
	  </div>
	  
	  <div class="col-md-6">
		<label class="labelproperty">Confirm Password</label>
		<span class="errormessage" id="id_cpassword"></span>
		<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm the password" />
	  </div>
			   
	   <div class="col-md-6">
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
		
			  
	  <div class="col-md-6">
		<label class="labelproperty">Date of Birth</label>
		<span class="errormessage" id="id_dob"></span>
		<input type="date" name="dob" id="dob" required="" value="<?php echo $rsedit['dob']; ?>"/>
	  </div>
	  
              
              <div  class="col-md-6">
				<label class="labelproperty">Select Staff Account Status</label>
				<span class="errormessage" id="id_staff_status"></span>
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
	staff_name
department_id
staff_type
login_id
password
cpassword
gender
dob
staff_status
	if(!$('#staff_name').val().match(alphaSpaceExp))
	{
		$('#id_staff_name').html("Staff name should contain charcter values...");
		errmsg = "Yes";
	} 
	if($('#staff_name').val() == "")
	{
		$('#id_staff_name').html("Staff name should not be empty..");
		errmsg = "Yes";
	} 
	if($('#department_id').val() == "")
	{
		$('#id_department_id').html("Kindly select the department..");
		errmsg = "Yes";
	}
	if(!$('#login_id').val().match(emailExp))
	{
		$('#id_login_id').html("Enter valid email id...");
		errmsg = "Yes";
	} 
	if($('#login_id').val() == "")
	{
		$('#id_login_id').html("Enter email id ..");
		errmsg = "Yes";
	} 
	if($('#password').val().length < 8 )
	{
		$('#id_password').html("Password should contain more than 8 characters..");
		errmsg = "Yes";
	} 
	if($('#password').val() == "")
	{
		$('#id_password').html("Password should not be empty..");
		errmsg = "Yes";
	} 
	if($('#password').val()  != $('#cpassword').val())
	{
		$('#id_cpassword').html("Password and Confirm Password not matching...");
		errmsg = "Yes";
	}
	if($('#cpassword').val() == "")
	{
		$('#id_cpassword').html("Confirm Password should not be empty..");
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
	if($('#staff_status').val() == "")
	{
		$('#id_staff_status').html("Kindly select staff status..");
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