<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_POST['submit']))
{
	$sql = "INSERT INTO course(course_title,course_description,course_status) VALUES('$_POST[course_title]','$_POST[course_description]','$_POST[course_status]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('Course Record Inserted successfully...');</script>";
		echo "<script>window.location='courseentry.php';</script>";
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
                Course
              </h3>
              <p>
                Add Course
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
              Kindly enter Course details 
            </h5>
            <form action="" method="post" name="frmevent_type" id="frmevent_type" enctype="multipart/form-data">
			
              <div>
				<label class="labelproperty">Course title</label>
                <input type="text" name="course_title" id="course_title" placeholder="Enter Course title" />
              </div>
			  
              <div>
                <label class="labelproperty">Course Description</label>
				<textarea name="course_description" id="course_description" class="form-control" placeholder="Enter Course Description"></textarea>
              </div>
			  
              <div>
				<label class="labelproperty">Course Status</label>
				<select name="course_status" id="course_status" class="form-control" >
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