<?php
include("header.php");
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
          Event Result
        </h3>
        <p>
          Publish Event Result
        </p>
      </div>
      <?php
		    $sqlview = "SELECT * FROM  event where event_date_time <= CURDATE()  ORDER BY event_id DESC";
		    $qsqlview = mysqli_query($con,$sqlview);
        $flag=0;
	    	while($rsview = mysqli_fetch_array($qsqlview))
		    {
          if($rsview['staff_id'] == $_SESSION['staff_id'] || $rsstaffprofile['staff_type'] == "Admin")
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
<?php
if($rsview['event_participation_type'] == "Team")
{
?>
<a href="event_team_result.php?event_id=<?php echo $rsview['event_id']; ?>" class="btn btn-success">Publish Result</a>
(<?php echo $rsview['event_participation_type'];?> Event)
<?php
}
else
{
?>
<a href="event_result.php?event_id=<?php echo $rsview['event_id']; ?>" class="btn btn-success">Publish Result</a>
(<?php echo $rsview['event_participation_type'];?> Event)
<?php
}
?>
          </div>
        </div>
        <?php
      }
    }
  if($flag==0)
  {
  ?>
  <div style="  font-family: Lucida Console, Courier New, monospace;">
    <br><h3 style=" color : red">You are not added any events ...</h3>
  <a href="addevent.php">Click here to add new event</a>
      <br><br>
  </div>
  <?php
  }
    ?>
        ?>
    </div>
  </section>

  <!-- end event section -->
<?php
include("footer.php");
?>