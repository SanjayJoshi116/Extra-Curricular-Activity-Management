<?php
include("header.php");
if(!isset($_SESSION['student_id']) && !isset($_SESSION['staff_id']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	$sql = "INSERT INTO complaint_report(student_id,staff_id,reply_complaint_report_id,complaint_detail,complain_doc) VALUES('$_POST[student_id]','$_POST[staff_id]','','$_POST[complaint_detail]','$_POST[complain_doc]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('Event Result Published successfully...');</script>";
		echo "<script>window.location='complaint.php';</script>";
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
            <form action="" method="post" name="frmcomplaint_report" id="frmcomplaint_report">
              <div>
                <label class="labelproperty">STUDENT ID</label>
				<textarea name="student_id" id="student_id" class="form-control"></textarea>
              </div>
              <div>
                <label class="labelproperty">STAFF INCHARGE</label>
				<textarea name="staff_id" id="staff_id" class="form-control"></textarea>
              </div>
              <div>
                <label class="labelproperty">COMPLAINT DETAILS</label>
				<textarea name="complaint_detail" id="complaint_detail" class="form-control"></textarea>
              </div>
              <div>
                <label class="labelproperty">COMPLAIN DOC</label>
				<textarea name="complain_doc" id="complain_doc" class="form-control"></textarea>
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