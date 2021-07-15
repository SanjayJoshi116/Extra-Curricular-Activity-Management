<?php
include("header.php");
/*if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='stafflogin.php';</script>";
}*/
if(isset($_POST['submit']))
{
	$sql = "INSERT INTO event_result(event_id,result_detail, event_documentry, staff_id) VALUES('$_POST[event_id]','$_POST[result_detail]','$_POST[event_documentry]','$_POST[staff_id]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('Event Result Published successfully...');</script>";
		echo "<script>window.location='event_result.php';</script>";
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
                Event Result
              </h3>
              <p>
                Enter Event Result
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
              Kindly update Event Result
            </h5>
            <form action="" method="post" name="frmevent_result" id="frmevent_result">
              <div>
				<label class="labelproperty">Event</label>
                <select name="event_id" id="event_id" class="form-control" >
					<option value="">Select Event</option>
				</select>
              </div>
              <div>
                <label class="labelproperty">About  Event Result</label>
				<textarea name="result_detail" id="result_detail" class="form-control"></textarea>
              </div>
              <div>
                <label class="labelproperty">Event Document</label>
				<textarea name="event_documentry" id="event_documentry" class="form-control"></textarea>
              </div>
              <div>
				<label class="labelproperty">Staff</label>
                <select name="staff_id" id="staff_id" class="form-control" >
					<option value="">Select Staff</option>
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