<?php
include("header.php");
if(isset($_POST['submit']))
{
	$complain_doc = rand() . $_FILES['complain_doc']['name'];
	move_uploaded_file($_FILES['complain_doc']['tmp_name'],"doccomplaint/" . $complain_doc);
	if(isset($_SESSION['staff_id']))
	{
		$complaintstatus = $_POST['complaint_status'];
	}
	if(isset($_SESSION['student_id']))
	{
		$complaintstatus = "Student Reply";
	}
	$sql = "INSERT INTO complaint_report(student_id,staff_id,reply_complaint_report_id,complaint_detail,complain_doc,complaint_status,complaint_date_tim,event_id) VALUES('$_SESSION[student_id]','$_SESSION[staff_id]','$_GET[complaint_report_id]','$_POST[complaint_detail]','$complain_doc','$complaintstatus','$dttim','$_POST[event_id]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('New Complaint added successfully...');</script>";
		echo "<script>window.location='viewcomplaintdetail.php?complaint_report_id=$_GET[complaint_report_id]';</script>";
	}
}
$sqlviewlastreply = "SELECT complaint_report.*,student.student_name, student.student_rollno, staff.staff_name, staff.login_id FROM complaint_report LEFT JOIN student ON student.student_id=complaint_report.student_id LEFT JOIN staff ON complaint_report.staff_id=staff.staff_id WHERE complaint_report.reply_complaint_report_id='$_GET[complaint_report_id]' ORDER BY complaint_report.complaint_report_id DESC";
$qsqlviewlastreply = mysqli_query($con,$sqlviewlastreply);
$rsviewlastreply = mysqli_fetch_array($qsqlviewlastreply);
?>
</div>
  <!-- login section -->
  <section class="login_section">
    <div class="container"><br>
      <div class="row">
	  
        <div class="col-md-12"><br>
          <centeR><div class="detail-box">
            <h3>
              Complaint Box
            </h3>
          </div></center>
        </div>
		
		</div>
    </div><br>
  </section>
  <!-- end contact section -->

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<?php
$sqlview = "SELECT complaint_report.*,student.student_name, student.student_rollno, staff.staff_name, staff.login_id FROM complaint_report LEFT JOIN student ON student.student_id=complaint_report.student_id LEFT JOIN staff ON complaint_report.staff_id=staff.staff_id WHERE complaint_report.complaint_report_id='$_GET[complaint_report_id]'";
$qsqlview = mysqli_query($con,$sqlview);
$rsview = mysqli_fetch_array($qsqlview);
?>
    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">
<form method="post" action="" enctype="multipart/form-data">
          <!-- Blog Post -->
          <div class="card mb-4">
            <div class="card-header"><b>Complaint No.</b> <?php echo $rsview[0]; ?> | <b>Published on</b>  <?php echo date("d-m-Y",strtotime($rsview['complaint_date_tim'])); ?> |  <b>Sent By</b>  <?php echo $rsview['student_name']; ?> (<b>Roll No.</b> <?php echo $rsview['student_rollno']; ?>)</div>
            <div class="card-body">
              <p class="card-text"><?php echo $rsview['complaint_detail']; ?></p>
				<?php
				 if(file_exists("doccomplaint/" . $rsview['complain_doc']))
				 {
					echo "<a href='doccomplaint/$rsview[complain_doc]' download class='btn-warning' style='padding-left: 10px;padding-right:10px;'>Download</a>";
				 }
				?>
            </div>
            <div class="card-header" style="background-color: #fff1f4;"><b>Complaint Status</b> <?php 
				if(mysqli_num_rows($qsqlviewlastreply) >= 1)
				{
					echo $rsviewlastreply['complaint_status'];
				}
				else
				{
					echo $rsview['complaint_status']; 
				}
				?></div>
<?php
  $sqlviewreply = "SELECT complaint_report.*,student.student_name, student.student_rollno, staff.staff_name, staff.login_id FROM complaint_report LEFT JOIN student ON student.student_id=complaint_report.student_id LEFT JOIN staff ON complaint_report.staff_id=staff.staff_id WHERE complaint_report.reply_complaint_report_id='$_GET[complaint_report_id]'";
$qsqlviewreply = mysqli_query($con,$sqlviewreply);
while($rsviewreply = mysqli_fetch_array($qsqlviewreply))
{
?>
	<div class="card-footer text-muted" style=" background-color: azure;">
		<div class="row">
			<div class="col-md-3 card">
				<?php
				if($rsviewreply['student_id'] != 0)
				{
				?>
				<label><b>Sent By</b> Student</label>
				<label><b>Name: </b> <?php echo $rsviewreply['student_name']; ?> (Roll No. <?php echo $rsviewreply['student_rollno']; ?>)</label>
				<label><b>Sent on</b> <?php echo date("d-m-Y h:i A",strtotime($rsviewreply['complaint_date_tim'])); ?></label>
				<?php
				}
				?>
				<?php
				if($rsviewreply['staff_id'] != 0)
				{
				?>
				<label><b>Sent By</b> Staff</label>
				<label><b>Name: </b> <?php echo $rsviewreply['staff_name']; ?> (<?php echo $rsviewreply['login_id']; ?>)</label>
				<label><b>Sent on</b> <?php echo date("d-m-Y h:i A",strtotime($rsviewreply['complaint_date_tim'])); ?></label>
				<?php
				}
				?>
			</div>
			<div class="col-md-9 card">
				<p class="card-text"><?php echo $rsviewreply['complaint_detail']; ?></p>
				<?php
				 if(file_exists("doccomplaint/" . $rsviewreply['complain_doc']))
				 {
					echo "<a href='doccomplaint/$rsviewreply[complain_doc]' download class='btn-warning' style='padding-left: 10px;padding-right:10px;width: 150px;'>Download</a><br>";
				 }
				?>
			</div>					
		</div>
	</div>
<?php
}
?>
            <div class="card-footer text-muted">
              <textarea class="form-control" name="complaint_detail" id="complaint_detail"></textarea><br>
				<input type="file" name="complain_doc" id="complain_doc" class="form-control" >
			  <?php
			  if(isset($_SESSION['staff_id']))
				{
			  ?><br>
			 <select class="form-control" name="complaint_status" id="complaint_status" >
				<option value="">Select Complaint Status</option>
				<?php
				$arr = array("Processing","Closed");
				foreach($arr as $val)
				{
				echo "<option value='$val' >$val</option>";
				}
				?>
			 </select><hr>
			 <?php
				}
			 ?><hr>
			 <center><input type="submit" name="submit" id="submit" class="btn btn-info" value="Send Reply"></center>
            </div>
          </div>
</form>

        </div>


        </div>
          
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<!-- ####################VIEW TABLE ENDS HERE ######### ---->
        </div>
		
      </div>
    </div>
  </section>

  <!-- end event section -->
<?php
include("footer.php");
?>
<script>
function confirmdel()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>