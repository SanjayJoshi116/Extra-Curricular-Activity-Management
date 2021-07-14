<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='stafflogin.php';</script>";
}
if(isset($_POST['submit']))
{
	$sql = "INSERT INTO event_type(event_type,event_type_info, firstplace_point, secondplace_point, thirdplace_point, others_point, event_type_status) VALUES('$_POST[event_type]','$_POST[event_type_info]','$_POST[firstplace_point]','$_POST[secondplace_point]','$_POST[thirdplace_point]','$_POST[others_point]','$_POST[event_type_status]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('Event Type record inserted successfully...');</script>";
		echo "<script>window.location='event_type.php';</script>";
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
                Event Type
              </h3>
              <p>
                Add Event Type
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
              Kindly enter Event type 
            </h5>
            <form action="" method="post" name="frmevent_type" id="frmevent_type">
			
              <div>
				<label class="labelproperty">Event Type</label>
                <input type="text" name="event_type" id="event_type" placeholder="Enter Event Type" />
              </div>
			  
              <div>
                <label class="labelproperty">Info about Event Type</label>
				<textarea name="event_type_info" id="event_type_info" class="form-control"></textarea>
              </div>
			  
              <div>
				<label class="labelproperty">Points For First Place</label>
                <input type="number" name="firstplace_point" id="firstplace_point" placeholder="Enter Point" />
              </div>
			  
              <div>
				<label class="labelproperty">Points For Second Place</label>
                <input type="number" name="secondplace_point" id="secondplace_point" placeholder="Enter Point" />
              </div>
			  
			  
              <div>
				<label class="labelproperty">Points For Third Place</label>
                <input type="number" name="thirdplace_point" id="thirdplace_point" placeholder="Enter Point" />
              </div>
			  
              <div>
				<label class="labelproperty">Points For others</label>
                <input type="number" name="others_point" id="others_point" placeholder="Enter Point" />
              </div>
			  
              <div>
				<label class="labelproperty">Status</label>
                <select name="event_type_status" id="event_type_status" class="form-control">
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