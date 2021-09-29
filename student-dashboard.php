<?php
include("header.php");
if(!isset($_SESSION['student_id']))
{
	echo "<script>window.location='studentlogin.php';</script>";
}
?>
  </div>

  <!-- login section -->
  <section class="login_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <h3>
              STUDENT DASHBOARD
            </h3>
            <p>
              View my Statistics
            </p>
            <a href="viewpointstable.php">
            <center>View Points Table</center>
            </a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="login_form">
            <h3>
             MY POINTS
            </h3>
            <form action="">
              <div class="mypointslabel">
<?php
$sqlpoint= "SELECT ifnull(sum(point),0) FROM event_result_status WHERE student_id='$_SESSION[student_id]' ";
$qsqlpoint = mysqli_query($con,$sqlpoint);
$rspoint = mysqli_fetch_array($qsqlpoint);
echo $rspoint[0];
?>               
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-3">
          <div class="login_form">
            <h3>
             MY RANKING
            </h3>
            <form action="">
              <div class="mypointslabel">
<?php
$sqlpoint= "SELECT z.rank FROM (SELECT student_id, student_name, student_rollno, ifnull((SELECT sum(point) FROM event_result_status WHERE student_id=student.student_id),0) as totalpoint, @rownum := @rownum + 1 AS rank FROM `student`, (SELECT @rownum := 0) r ORDER BY `totalpoint` DESC) as z WHERE student_id='$_SESSION[student_id]' ";
$qsqlpoint = mysqli_query($con,$sqlpoint);
$rspoint = mysqli_fetch_array($qsqlpoint);
echo $rspoint[0];
?>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end login section -->
<br>

  <!-- special section -->

  <section class="special_section">
    <div class="container">
      <div class="special_container">
<span style="width: 300px;">Team Token Code :</span>
 <input type="text" name="token_code" id="token_code" class="form-control" style="background-color: #e1dddd;" value="<?php echo md5($_SESSION['student_id'].$hr); ?>">
 <input type="button" name="btn_token_code" id="btn_token_code" class="btn btn-info" value="Copy to Clipboard" onclick="fun_copy_to_clipboard()" >
<script>
function fun_copy_to_clipboard() {
  /* Get the text field */
  var copyText = document.getElementById("token_code");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  alert("Team Token Code Copied" );
}
</script>
      </div>
    </div>
  </section>
  <!-- end special section -->
  
<hr>

  <!-- event section -->
  <section class="event_section">
    <div class="container">
      <div class="heading_container">
       <h3>
          My Participation on Upcoming Event
        </h3>
      </div>
<?php
$flag=0;
$sqlview = "SELECT * FROM  event_participation LEFT JOIN event ON event_participation.event_id=event.event_id where event.event_date_time > '$dttim' AND student_id='$_SESSION[student_id]'";
$sqlview = $sqlview. " ORDER BY event_date_time DESC limit 1";
$qsqlview = mysqli_query($con,$sqlview);
while($rsview = mysqli_fetch_array($qsqlview))
{
  $flag=1;
?>
<div class="event_container">
	<div class="box">
		<div class="img-box">
		<h5>
			<?php
			$imge=$rsview['event_banner'];
			echo '<img src="imgbanner/' .$imge .'" width="150" height="150">';
			?>
		</h5>
		</div>
		<div class="detail-box">
			<h4>
				<?php echo $rsview['event_title'];?>
			</h4>
		<h6>
		  <?php echo $rsview['event_venue'];?>
		</h6>
		</div>
		<div class="date-box">
		<h3>
		<?php echo date("d-M-Y h:i A",strtotime($rsview['event_date_time']));?>
		</h3>
			  <a href="event_more_det.php?event_id=<?php echo $rsview['event_id']; ?>" class="btn btn-info">View More</a>
		(<?php echo $rsview['event_participation_type'];?> Event)
		</div>
	</div>
</div>
<?php
}
if($flag==0)
{
  ?>
  <div style="  font-family: Lucida Console, Courier New, monospace;">
    <br><h3 style=" color : red"> You dont have any upcoming events...</h3>
  <a href="upcoming-event.php">Click here to check new events to participate...</a>
      <br><br>
  </div>
  <?php
}
?>
    </div>
  </section>

  <!-- end event section -->

<hr>

  <!-- event section -->
  <section class="event_section">
    <div class="container">
      <div class="heading_container">
       <h3>
          My Recent Participation Result
        </h3>
      </div>
<?php
$sqlview = "SELECT * FROM  event_participation LEFT JOIN event ON event_participation.event_id=event.event_id where event.event_date_time < '$dttim' AND student_id='$_SESSION[student_id]'";
$sqlview = $sqlview. " ORDER BY event_date_time DESC limit 1";
$qsqlview = mysqli_query($con,$sqlview);
$flag=0;
while($rsview = mysqli_fetch_array($qsqlview))
{
  $flag=1;
?>
<div class="event_container">
	<div class="box">
		<div class="img-box">
		<h5>
			<?php
			$imge=$rsview['event_banner'];
			echo '<img src="imgbanner/' .$imge .'" width="150" height="150">';
			?>
		</h5>
		</div>
		<div class="detail-box">
			<h4>
				<?php echo $rsview['event_title'];?>
			</h4>
		<h6>
		  <?php echo $rsview['event_venue'];?>
		</h6>
		</div>
		<div class="date-box">
		<h3>
		<?php echo date("d-M-Y h:i A",strtotime($rsview['event_date_time']));?>
		</h3>
			  <a href="team_event_result_report.php?event_id=<?php echo $rsview['event_id']; ?>" class="btn btn-info">View Result</a>
		(<?php echo $rsview['event_participation_type'];?> Event)
		</div>
	</div>
</div>
<?php
}
if($flag==0)
{
  ?>
  <div style="  font-family: Lucida Console, Courier New, monospace;">
    <br><h3 style=" color : red"> You are not partcipated in any events...</h3>
  <a href="upcoming-event.php">Click here to check new events to participate...</a>
      <br><br>
  </div>
  <?php
}
?>
    </div>
  </section>

  <!-- end event section -->

<?php
include("footer.php");
?>