<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_POST['submit']))
{
	$sql = "INSERT INTO dept_course(department_id,course_id,dept_status) VALUES('$_POST[department_id]','$_POST[course_id]','$_POST[dept_status]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('Department Record Inserted successfully...');</script>";
		echo "<script>window.location='departmentcourse.php';</script>";
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
                Department Course
              </h3>
              <p>
                Add  Courses under Department
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
              Kindly enter Courses under Department
            </h5>
            <form action="" method="post" name="frm" id="frm" enctype="multipart/form-data">
			
              <div>
				<label class="labelproperty">Department</label>
				<select class="form-control" id="department_id" name="department_id">
					<option value="">Select department</option>
					<?php
					$sqldepartment = "SELECT * FROM department WHERE department_status='Active'";
					$qsqldepartment = mysqli_query($con,$sqldepartment);
					while($rsdepartment = mysqli_fetch_array($qsqldepartment))
					{
						echo "<option value='$rsdepartment[department_id]'>$rsdepartment[department]</option>";
					}
					?>
				</select>
              </div>
			  
              <div>
                <label class="labelproperty">Course</label>
				<select class="form-control" id="course_id" name="course_id">
					<option value="">Select Course</option>
					<?php
					$sqlcourse = "SELECT * FROM course WHERE course_status='Active'";
					$qsqlcourse = mysqli_query($con,$sqlcourse);
					while($rscourse = mysqli_fetch_array($qsqlcourse))
					{
						echo "<option value='$rscourse[course_id]'>$rscourse[course_title]</option>";
					}
					?>
				</select>
              </div>
			  
              <div>
				<label class="labelproperty">Status</label>
				<select name="dept_status" id="dept_status" class="form-control" >
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