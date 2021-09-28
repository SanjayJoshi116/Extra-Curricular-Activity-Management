<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_POST['submit']))
{	
	if(isset($_GET['editid']))
	{
		$sql="UPDATE department SET department='$_POST[department]'";
		$sql = $sql . ",department_detail='$_POST[department_detail]'";
		$sql = $sql . ",department_status='$_POST[department_status]' WHERE department_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Department Record updated successfully..');</script>";
			echo "<script>window.location='viewdepartment.php';</script>";
		}
	}
	else
	{
		$sql = "INSERT INTO department(department,department_detail,department_status) VALUES('$_POST[department]','$_POST[department_detail]','$_POST[department_status]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con)==1)
		{
			echo "<script>alert('Department Record Inserted successfully...');</script>";
			echo "<script>window.location='department.php';</script>";
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit= "SELECT * FROM department where department_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
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
                Department
              </h3>
              <p>
                Add Department
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
              Kindly enter Department details 
            </h5>
            <form action="" method="post" name="frmevent_type" id="frmevent_type" enctype="multipart/form-data" onsubmit="return validateform()">
			
              <div>
				<label class="labelproperty">Department</label>
				<span class="errormessage" id="id_department"></span>
                <input type="text" name="department" id="department" placeholder="Enter Department Title" value="<?php echo $rsedit['department']; ?>" />
              </div>
			  
              <div>
                <label class="labelproperty">Description</label>
				<span class="errormessage" id="id_department_detail"></span>
				<textarea name="department_detail" id="department_detail" class="form-control" placeholder="Enter Description"><?php echo $rsedit['department_detail']; ?></textarea>
              </div>
			  
              <div>
				<label class="labelproperty">Department Status</label>
				<span class="errormessage" id="id_department_status"></span>
				<select name="department_status" id="department_status" class="form-control" >
				<option value="">Select Status</option>
                <?php
				$arr = array("Active","Inactive");
				foreach($arr as $val)
				{
					if($val == $rsedit['department_status'])
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
	var alphaSpaceExp = /^[a-zA-Z\s]+$/;
	$('.errormessage').html('');
	var errmsg = "No";
	if(!$('#department').val().match(alphaSpaceExp))
	{
		$('#id_department').html("Department title should contain charcter values...");
		errmsg = "Yes";
	} 
	if($('#department').val() == "")
	{
		$('#id_department').html("Department title should not be empty..");
		errmsg = "Yes";
	} 
	if($('#department_detail').val() == "")
	{
		$('#id_department_detail').html("Kindly enter department details..");
		errmsg = "Yes";
	} 
	if($('#department_status').val() == "")
	{
		$('#id_department_status').html("Kindly select department status..");
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