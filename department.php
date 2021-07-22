<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_POST['submit']))
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
            <form action="" method="post" name="frmevent_type" id="frmevent_type" enctype="multipart/form-data">
			
              <div>
				<label class="labelproperty">Department</label>
                <input type="text" name="department" id="department" placeholder="Enter Department title" />
              </div>
			  
              <div>
                <label class="labelproperty">Description</label>
				<textarea name="department_detail" id="department_detail" class="form-control" placeholder="Enter Description"></textarea>
              </div>
			  
              <div>
				<label class="labelproperty">Department Status</label>
				<select name="department_status" id="department_status" class="form-control" >
				<option value="">Select Status</option>
                <?php
				$arr = array("Active","Inactive");
				foreach($arr as $val)
				{
					echo "<option value='$val'>$val</option>";
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