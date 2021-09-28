<?php
include("header.php");
if(!isset($_SESSION['student_id']) && !isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_POST['submit']))
{
	$complain_doc = rand() . $_FILES['complain_doc']['name'];
	move_uploaded_file($_FILES['complain_doc']['tmp_name'],"doccomplaint/" . $complain_doc);
	$sql = "INSERT INTO complaint_report(student_id,staff_id,reply_complaint_report_id,complaint_detail,complain_doc,complaint_status,complaint_date_tim,event_id) VALUES('$_SESSION[student_id]','$_SESSION[staff_id]','0','$_POST[complaint_detail]','$complain_doc','New','$dttim','$_POST[event_id]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('New Complaint added successfully...');</script>";
		echo "<script>window.location='view-complaint.php';</script>";
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
                Report Complain 
              </h3>
              <p>
                Enter your complain details
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
            
            </h5>
            <form action="" method="post" name="frmcomplaint_report" id="frmcomplaint_report" enctype="multipart/form-data" onsubmit="return validateform()">
              <div>
			  <span class="errormessage" id="id_complaint_detail"></span>
                <label class="labelproperty">COMPLAINT DETAILS</label>
				<textarea name="complaint_detail" id="complaint_detail" class="form-control"></textarea>
              </div>
              <div>
                <label class="labelproperty">Event Title</label>
				<select class="form-control" name="event_id" id="event_id">
					<option value="">Not Applicable</option>
					<?php
		$sqlviewevent = "SELECT event.*,department.department,event_type.event_type FROM  event LEFT JOIN department ON event.department_id=department.department_id LEFT JOIN event_type ON event.event_type_id=event_type.event_type_id ORDER BY event_date_time DESC";
		$qsqlviewevent = mysqli_query($con,$sqlviewevent);
		while($rsviewevent = mysqli_fetch_array($qsqlviewevent))
		{
			echo "<option value='$rsviewevent[event_id]'>$rsviewevent[event_title] -   " .date("d-m-Y h:i A",strtotime($rsviewevent['event_date_time'])) . "</option>";
		}
					?>
				</select>
              </div>
              <div>
                <label class="labelproperty">COMPLAINT DOCUMENT</label>
				<input type="file" name="complain_doc" id="complain_doc" class="form-control" >
              </div>
              <div class="d-flex justify-content-center">
                <button type="submit" name="submit" id="submit" class="btn_on-hover">Click Here to Send Complaint</button>
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
<script>
function validateform()
{
	$('.errormessage').html('');
	var errmsg = "No";
	if($('#complaint_detail').val() == "")
	{
		$('#id_complaint_detail').html("Kindly enter the complaint details..");
		errmsg = "Yes";
	}
if(errmsg == "Yes")
	{
		return false;
	}
	if(errmsg == "No")
	{
		return true;
	}
}
</script>