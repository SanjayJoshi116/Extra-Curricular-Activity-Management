<?php
include("header.php");
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
<?php
	if(isset($_SESSION['student_id']))
	{
?>
<center><a class="btn btn-info"  href="complaint.php">New Complaint</a></center><hr>
<?php
	}
  $flag=0;
?>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<?php
$sqlview = "SELECT complaint_report.*,student.student_name, student.student_rollno, staff.staff_name, staff.login_id,event.event_title,event.event_date_time,event.staff_id  FROM complaint_report LEFT JOIN student ON student.student_id=complaint_report.student_id LEFT JOIN staff ON complaint_report.staff_id=staff.staff_id LEFT JOIN event ON event.event_id=complaint_report.event_id ORDER BY complaint_report.complaint_report_id DESC";
$qsqlview = mysqli_query($con,$sqlview);
echo mysqli_error($con);
while($rsview = mysqli_fetch_array($qsqlview))
{
  if(! $rsview['student_id'] == 0)
  {
    if(($rsview['student_id'] == $_SESSION['student_id']) ||  $rsview['staff_id'] == $_SESSION['staff_id'] || $rsstaffprofile['staff_type'] == "Admin")
    {
      $flag=1;
?>
    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

          <!-- Blog Post -->
          <div class="card mb-4">
            <div class="card-header"><b>Complaint No.</b> <?php echo $rsview[0]; ?> | <b>Published on</b>  <?php echo date("d-m-Y h:i A",strtotime($rsview['complaint_date_tim'])); ?> |  <b>Sent By</b>  <?php echo $rsview['student_name']; ?> (<b>Roll No.</b> <?php echo $rsview['student_rollno']; ?>)</div>
			<?php
			if($rsview['event_id'] != 0)
			{
			?>
            <div class="card-header" style="background-color: rgb(255 240 240 / 3%);"><b>Event : </b> <?php echo $rsview['event_title']; ?> - <?php echo date("d-m-Y h:i A",strtotime($rsview['event_date_time'])); ?></div>
			<?php
			}
			?>
            <div class="card-body">
              <p class="card-text">
			  <?php echo $rsview['complaint_detail']; ?><br>
				 <?php
				 if(file_exists("doccomplaint/" . $rsview['complain_doc']))
				 {
					echo "<a href='doccomplaint/$rsview[complain_doc]' download class='btn-warning' style='padding-left: 10px;padding-right:10px;'>Download</a>";
				 }
				 ?>
				</p>
            </div>
            <div class="card-footer text-muted">
              <a href="viewcomplaintdetail.php?complaint_report_id=<?php echo $rsview[0]; ?>" class="btn btn-primary">View More</a> | Complaint Status - <?php echo $rsview['complaint_status']; ?>
            </div>
          </div>


        </div>


        </div>
          
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
<?php
}
}
}
?>
<!-- ####################VIEW TABLE ENDS HERE ######### ---->
        </div>
		
      </div>
    </div>
 <?php
      if($flag==0)
      {
        ?>
        <hr><br>
        <div >
         <center><h1 style=" color : red ;font-family :monospace">You dont have any complaints to views...</h1></center>
       </div><hr>
        <?php 
}?>
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