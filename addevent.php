<?php
include("header.php");
if(isset($_POST['submit']))
{
	$sql = "INSERT INTO event(event_title,event_description,event_rules,event_banner, semester, event_date_time, event_venue) VALUES('$_POST[event_title]','$_POST[event_description]','$_POST[event_rules]','$_POST[event_banner]','$_POST[semester]','$_POST[datetime]','$_POST[event_venue]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('Event added successfully...');</script>";
		echo "<script>window.location='addevent.php';</script>";
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
                Events
              </h3>
              <p>
                Add Events
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
              Kindly Add Events
            </h5>
            <form action="" method="post" name="addevent" id="addevent">
			
              <div>
				<label class="labelproperty">Event Title</label>
                <input type="text" name="event_title" id="event_title" placeholder="Enter Event Title" />
              </div>
			  
              <div>
                <label class="labelproperty">Event Description</label>
				<textarea name="event_description" id="event_description" class="form-control" placeholder="Enter Event Description"></textarea>
              </div>
			  
			  <div>
                <label class="labelproperty">Event Rules</label>
				<textarea name="event_rules" id="event_rules" class="form-control" placeholder="Enter Event Rules"></textarea>
              </div>
			  
              <div>
				<label class="labelproperty">Event Banner</label>
                <input type="text" name="event_banner" id="event_banner" placeholder="Enter Event Banner" />
              </div>
			  
			  
              <div>
				<label class="labelproperty">Semester</label>
                <input type="text" name="semester" id="semester" placeholder="Enter Semester" />
              </div>
			  
			  
              <div>
				<label class="labelproperty">Event Date & Time</label>
                <input type="datetime-local" name="event_date_time" id="event_date_time" placeholder="Enter Date & Time" />
              </div>
			  
			  <div>
                <label class="labelproperty">Venue</label>
				<textarea name="event_venue" id="event_venue" class="form-control" placeholder="Enter Venue"></textarea>
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