<?php
include("header.php");
if(isset($_GET['event_id']))
{
	$sqlevent_participation = "SELECT * FROM event_participation WHERE event_id='$_GET[event_id]'";
	$qsqlevent_participation = mysqli_query($con,$sqlevent_participation);
	$rsevent_participation = mysqli_fetch_array($qsqlevent_participation);
}
?>
</div>
<br>&nbsp;
  <!-- event section -->
  <section class="event_section">
    <div class="container">
      <div class="heading_container">
        <h3>
          Event Participants
        </h3>
        <p>
          View Event Participants
        </p>
      </div>
      <?php
		    $sqlview = "SELECT * FROM  event where event_id=$_GET[event_id]";
		    $qsqlview = mysqli_query($con,$sqlview);
	    	while($rsview = mysqli_fetch_array($qsqlview))
		    {
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
			<b>No. of Participants <?php 
			$sqlpart = "SELECT * FROM event_participation where event_id='$rsview[event_id]'";
			$qsqlpart = mysqli_query($con,$sqlpart);
			echo  mysqli_num_rows($qsqlpart)
			?></b>
          </div>
        </div>
        <?php
      }
        ?>
    </div>
  </section>

  <!-- event section -->
  <section class="event_section">
    <div class="container">
      <div class="event_container">
<hr>
        <div class="">
         <div class="login_form">
		  
		          <div class="col-md-12">
          <centeR><div class="detail-box">
            <h5>
              <b >View Participants</b>
            </h5>
          </div></center>
        </div>	
			<div class="row">
				  <div style="text-align: left;" class="col-md-12">
<table class="table table-bordered" >
<thead>
		<tr>
			<th>Image</th>
			<th>Student Roll No.</th>
			<th>Class</th>
			<th>Student Name</th>
			<th>Application Date</th>
		</tr>
	</thead>
	<tbody>
  <?php 
  	$sqlview = "SELECT event_participation.*,student.student_name,student.student_image, student.st_class, student.student_rollno, course.course_title FROM `event_participation` LEFT JOIN student ON event_participation.student_id=student.student_id LEFT JOIN course ON course.course_id=student.course_id WHERE event_participation.event_id='$_GET[event_id]'";
	$qsqlview = mysqli_query($con,$sqlview);
	echo mysqli_error($con);
	while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td style='width: 50px;height: 50px;'><img src='studentimg/$rsview[student_image]' style='width: 100px;height: 100px;' ></td>
				<td>$rsview[student_rollno]</td>
				<td>$rsview[course_title]<br>$rsview[st_class]</td>
				<td>$rsview[student_name]</td>
				<td>" . date("d-m-Y",strtotime($rsview['apply_dt_tim'])) . "</td>";
			echo"</tr>";
		}
  ?>
	</tbody>
</table>
				  </div>
			</div>
          </div>
        </div>
		
      </div>
    </div>
  </section>
<br>
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
<script>
function confirmst()
{
	if(confirm("Are you sure?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>