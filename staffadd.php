<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
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
               Registration
              </h3>
              <p>
                Staff Registration
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
              Kindly Register to get benefits
            </h5>
            <form action="" method="post" name="registration" id="registration">
			
              <div>
				<label class="labelproperty">Name</label>
                <input type="text" name="staff_name" id="staff_name" placeholder="Enter Name" required="" />
              </div>
			  
              <div>
                <label class="labelproperty">Staff ID</label>
				<input type="text" name="staff_id" id="staff_id" class="form-control" placeholder="Enter Staff ID" required="" />
              </div>
			  
              <div>
				<label class="labelproperty">Gender</label>
                <select name="gender" id="gender" class="form-control" required="">
				<option hidden value="">--Select--</option>
				<option>Male
				<option>Female</select>
              </div>
			  
              <div>
				<label class="labelproperty">Date of Birth</label>
                <input type="date" name="dob" id="dob" required="" />
              </div>
			  
              <div>
				<label class="labelproperty">Staff Type</label>
				<select name="staff_type" id="staff_type" class="form-control" required="">
				<option hidden value="">--Select--</option>
				<option>Assistant Professor
				<option>Lecturer
				<option>Guest Lecturer
				<option>Lab Assistant</select>
              </div>

			  <div>
                <label class="labelproperty">Password</label>
				<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required="" />
              </div>
			  
              </div>
			  
			  
			  
              <div class="d-flex justify-content-center">
                <button type="submit" name="submit" id="submit" class="btn_on-hover">Click Here to Submit</button>
				<button type="reset" name="clear" class="btn_on-hover">Reset</button>
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