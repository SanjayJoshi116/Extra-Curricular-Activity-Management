<?php
include("header.php");
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
               Student Registration
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
              Kindly enter Registration Detail
            </h5>
            <form action="" method="post" name="frmevent_type" id="frmevent_type">
			
              <div>
				<label class="labelproperty">Name</label>
                <input type="text" name="student_name" id="student_name" placeholder="Enter your Name" />
              </div>
			  
			  
              <div>
				<label class="labelproperty">Course</label>
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
			  
			  
              <div>
				<label class="labelproperty">Class</label>
				<select name="st_class" id="st_class" class="form-control" >
				<option value="">All Class</option>
                <?php
				$arr = array("First Year","Second Year","Third Year");
				foreach($arr as $val)
				{
					echo "<option value='$val'>$val</option>";
				}
				?>
				</select>
              </div>
			   
              <div>
                <label class="labelproperty">Roll Number</label>
				<input type="text" name="student_rollno" id="student_rollno" class="form-control" placeholder="Enter your Roll Number"  />
              </div>
			  
			  
			  <div>
                <label class="labelproperty">Password</label>
				<input type="password" name="student_password" id="student_password" class="form-control" placeholder="Enter your Password" />
              </div>
			  
			  
			  <div>
                <label class="labelproperty">Upload Image</label>
				<input type="file" name="student_image" id="student_image" class="form-control" placeholder="Upload Image"/>
              </div>
			  
			  
			  <div>
                <label class="labelproperty">Password</label>
				<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password"  />
              </div>
			  
              <div>
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
			  
			  
              <div>
				<label class="labelproperty">Date of Birth</label>
                <input type="date" name="dob" id="dob" placeholder="Enter your DOB"  />
              </div>
			  
			  
              <div>
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
			  
			  <div>
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
				
			<div>
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
			  				
			<div>
                <label class="labelproperty">Status</label>
				<select name="student_status" id="student_status" class="form-control" required="">
				<option hidden value="">--Select--</option>
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
