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
              Kindly Register to get benefits
            </h5>
            <form action="" method="post" name="registration" id="registration">
			
              <div>
				<label class="labelproperty">Name</label>
                <input type="text" name="student_name" id="student_name" placeholder="Enter your Name" required="" />
              </div>
			  
              <div>
                <label class="labelproperty">Roll Number</label>
				<input type="text" name="student_rollno" id="student_rollno" class="form-control" placeholder="Enter your Roll Number" required="" />
              </div>
			  
			  <div>
                <label class="labelproperty">Class</label>
				<select name="class" id="class" class="form-control" required="" >
				<option selected hidden value="">--Select--</option>
				<option>I B.Com
				<option>II B.Com
				<option>III B.Com
				<option>I B.Sc
				<option>II B.Sc
				<option>III B.Sc
				<option>I BCA
				<option>II BCA
				<option>III BCA
				<option>I BA
				<option>II BA
				<option>III BA
				<option>I BBA
				<option>II BBA
				<option>III BBA
				<option>I B.Voc
				<option>II B.Voc
				<option>III B.Voc</select>
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
                <input type="date" name="dob" id="dob" placeholder="Enter your DOB" required="" />
              </div>
			  
			  
              <div>
				<label class="labelproperty">Language</label>
				<select name="lang" id="lang" class="form-control" required="">
				<option hidden value="">--Select--</option>
				<option>Sanskrit
				<option>Hindi
				<option>Kannada</select>
              </div>
			  
			  <div>
                <label class="labelproperty">Elective Paper</label>
				<select name="ep" id="ep" class="form-control" required="">
				<option hidden value="">--Select--</option>
				<option>Sanskrit
				<option>Hindi
				<option>Kannada
				<option>English
				<option>History
				<option>Economics and Rural Development
				<option>Political Science
				<option>Journalism
				<option>Home Science
				<option>Physics
				<option>Chemistry</select>
              </div>
				
				<div>
                <label class="labelproperty">Extension Activities</label>
				<select name="activity" class="form-control" required="">
				<option hidden value="">--Select--</option>
				<option>NCC</option>
				<option>NSS</option>
				<option>Rovers & Rangers</option>
				<option>Cultural</option>
				<option>Sports</option></select>
              </div>
			  
			  <div>
                <label class="labelproperty">Password</label>
				<input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password" required="" />
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