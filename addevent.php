<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='stafflogin.php';</script>";
}
if(isset($_POST['submit']))
{
	$imgbanner  = rand() . $_FILES["event_banner"]["name"];
	move_uploaded_file($_FILES["event_banner"]["tmp_name"],"imgbanner/".$imgbanner);
	$eventdttime =  str_replace("T"," ", $_POST['event_date_time']);
	$sql = "INSERT INTO event(event_type_id,event_title,event_description,event_rules,event_banner,department_id,course_id, st_class, event_date_time, event_venue,staff_id,event_status) VALUES('$_POST[event_type_id]','$_POST[event_title]','$_POST[event_description]','$_POST[event_rules]','$imgbanner','$_POST[department_id]','$_POST[course_id]','$_POST[st_class]','$eventdttime','$_POST[event_venue]','$_SESSION[staff_id]','$_POST[event_status]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('Event added successfully...');</script>";
		//echo "<script>window.location='addevent.php';</script>";
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
              Kindly enter Event details 
            </h5>
            <form action="" method="post" name="frmevent_type" id="frmevent_type" enctype="multipart/form-data">
			
              <div>
	<label class="labelproperty">Event Type</label>
	<select class="form-control" name="event_type_id" id="event_type_id">
		<option value="">Select Event Type</option>
		<?php
		$sqleventtype = "SELECT * FROM event_type WHERE event_type_status='Active'";
		$qsqleventtype = mysqli_query($con,$sqleventtype);
		echo mysqli_error($con);
		while($rseventtype = mysqli_fetch_array($qsqleventtype))
		{
			echo "<option value='$rseventtype[event_type_id]'>$rseventtype[event_type]</option>";
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
				<label class="labelproperty">Event Date & Time</label>
                <input type="datetime-local" name="event_date_time" id="event_date_time" placeholder="Enter Date & Time" min="<?php echo  date("Y-m-d") . "T" .date("H:i"); ?>" />
              </div>
			  
              <div>
                <label class="labelproperty">Venue</label>
				<textarea name="event_venue" id="event_venue" class="form-control" placeholder="Enter Venue"></textarea>
              </div>
			  
              <div>
				<label class="labelproperty">Select Event Status</label>
				<select name="event_status" id="event_status" class="form-control" >
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