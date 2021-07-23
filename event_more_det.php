<?php
include("header.php");
$sqlviewevent = "SELECT event.*, event_type.event_type, department.department,course.course_title, staff.staff_name, staff.staff_type FROM event 
LEFT JOIN event_type ON event.event_type_id=event_type.event_type_id 
LEFT JOIN department ON department.department_id=event.department_id LEFT JOIN course ON course.course_id=event.course_id 
LEFT JOIN  staff ON staff.staff_id=event.staff_id
where event.event_id='$_GET[event_id]'";
$qsqlviewevent = mysqli_query($con,$sqlviewevent);
echo mysqli_error($con);
$rsviewevent = mysqli_fetch_array($qsqlviewevent);
?>
</div>
<br>
  <!-- special section -->

  <section class="special_section">
    <div class="container">
      <div class="special_container">
        <div class="box b1">
          <div class="img-box">
            <img src="images/award.png" alt="" />
          </div>
          <div class="detail-box">
            <h4><?php echo  $rsviewevent['event_type']; ?></h4>
          </div>
        </div>
        <div class="box b2">
          <div class="img-box">
            <img src="images/study.png" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              <?php echo  $rsviewevent['event_title']; ?>
            </h4>
          </div>
        </div>
        <div class="box b3">
          <div class="img-box">
            <img src="images/books-stack-of-three.png" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              <?php echo date("d-m-Y h:i A",strtotime($rsviewevent['event_date_time'])) ?>
            </h4>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end special section -->

  <!-- about section -->
  <section class="about_section layout_padding">

    <div class="container  table table-bordered">
      <div class="row">
        <div class="col-md-5">
          <div class="img_container">
            <div class="img-box b1">
<?php
$imge=$rsviewevent['event_banner'];
echo '<img src="imgbanner/' .$imge .'" >';
?>			  
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="detail-box">
            <div class="heading_container">
              <h3>
                <?php echo  $rsviewevent['event_title']; ?> 
              </h3>
            <p>
				<table class="table table-bordered" style="width: 80%;">
					<tr>
						<th>Event Type : </th><td><?php echo  $rsviewevent['event_type']; ?> </td>
					</tr>
					<tr>
						<th>Deparment : </th><td><?php echo  $rsviewevent['department']; ?> </td>
					</tr>
					<tr>
						<th>Course : </th><td><?php echo  $rsviewevent['course_title']; ?> </td>
					</tr>
					<tr>
						<th>Class : </th><td><?php echo  $rsviewevent['st_class']; ?> </td>
					</tr>
					<tr>
						<th>Staff Incharge : </th><td><?php echo  $rsviewevent['staff_name']; ?> (<?php echo  $rsviewevent['staff_type']; ?>) </td>
					</tr>
					<tr>
						<th>Last date for Participation: </th><td><?php echo $stop_date = date('d-m-Y', strtotime($rsviewevent['event_date_time'] . ' -2 day')); ?> </td>
					</tr>
				</table> 
			</p>
              <p><?php echo  $rsviewevent['event_description']; ?>  </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container  table table-bordered" >
      <div class="heading_container">
        <h3>
          Event Rules
        </h3>
        <p><?php echo  $rsviewevent['event_rules']; ?></p>
      </div>

    </div>
  </section>


  <section class="login_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="detail-box">
           <center> 
			<h3>
              Participate Event
            </h3>
            <p>
              No. of Participants - 
			  <?php
			  $sqlparticipantscount  = "SELECT * FROM `event_participation` WHERE event_id='$_GET[event_id]'";
			  $qsqlparticipantscount = mysqli_query($con,$sqlparticipantscount);
			  echo mysqli_num_rows($qsqlparticipantscount);
			  ?>
            </p>
            
<?php
$stop_date = date('Y-m-d', strtotime($rsviewevent['event_date_time'] . ' -2 day'));
$eventdate  = strtotime($dt);
$last_date = strtotime($stop_date);
if($last_date >= $eventdate)
{
?>
<a href="">Click Here to participate</a>
<?php
}
else
{
?>
<a href="#" onclick="alert('Participation not allowed..')" class="btn btn-secondary">Participation Option Closed</a>
<?php
}
?>
			</center>
          </div>
        </div>

	  </div>
    </div>
  </section>

  <!-- end login section -->



<?php
include("footer.php");
?>