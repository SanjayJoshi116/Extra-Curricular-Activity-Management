<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
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
		    $sqlview = "SELECT * FROM  event where event_date_time > CURDATE()  ORDER BY event_id DESC";
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
            <?php echo $rsview['event_title'];?> <br><center><span style="font-size: 12px;">(<?php echo $rsview['event_participation_type'];?> Event)</span></center>
            </h4>
            <h6>
              <?php echo $rsview['event_venue'];?>
            </h6>
          </div>
          <div class="date-box">
            <h3>
            <?php echo date("d-M-Y h:i A",strtotime($rsview['event_date_time']));?>
            </h3>
			<a href="view_event_participant_list.php?event_id=<?php echo $rsview['event_id']; ?>" class="btn btn-success">View Participant List</a>
			<b>No. of  <?php
			if($rsview['event_participation_type'] == "Team")
			{
				echo " Teams - ";
			$sqlpart = "SELECT * FROM event_participation where event_id='38' AND event_participation_type='Team' AND team='Team Leader' and event_id='$rsview[event_id]'";
			}
			else
			{
				echo " Participants - ";
			$sqlpart = "SELECT * FROM event_participation where event_id='$rsview[event_id]'";
			}
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

  <!-- end event section -->
<?php
include("footer.php");
?>