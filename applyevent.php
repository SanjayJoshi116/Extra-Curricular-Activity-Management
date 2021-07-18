<?php
include("header.php");
/*if(!isset($_SESSION['student_id']))
{
	echo "<script>window.location='login.php';</script>";
}*/
if(isset($_POST['submit']))
{
	$sql = "INSERT INTO event_participation() VALUES('$_POST[event_id]','$_SESSION[student_id]','$_POST[apply_dt_tim]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('Event application success...');</script>";
		//echo "<script>window.location='applyevent.php';</script>";
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
                Apply Events
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
              Kindly verify the details 
            </h5>
            <form action="" method="post" name="frmevent_apply" id="frmevent_apply">
			
              <div>
	<label class="labelproperty">Event ID</label>
	<select class="form-control" name="event_id" id="event_id">
		<option value="">Select Event Type</option>
		<?php
		$sqleventtype = "SELECT * FROM event WHERE event_status='Active'";
		$qsqleventtype = mysqli_query($con,$sqleventtype);
		echo mysqli_error($con);
		while($rseventtype = mysqli_fetch_array($qsqleventtype))
		{
			echo "<option value='$rseventtype[event_id]'>$rseventtype[event_title]</option>";
		}
		?>
	</select>
              </div>
			  
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
                <input type="file" name="event_banner" id="event_banner" placeholder="Enter Event Banner" />
              </div>
			  
			  
              <div>
				<label class="labelproperty">Department</label>
                <select name="department_id" id="department_id" class="form-control" >
					<option value="">All Department</option>
		<?php
		$sqldepartment = "SELECT * FROM department WHERE department_status='Active'";
		$qsqldepartment = mysqli_query($con,$sqldepartment);
		echo mysqli_error($con);
		while($rsdepartment = mysqli_fetch_array($qsqldepartment))
		{
			echo "<option value='$rsdepartment[department_id]'>$rsdepartment[department]</option>";
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