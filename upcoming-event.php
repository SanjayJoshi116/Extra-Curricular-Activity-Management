<?php
include("header.php");
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
          Events
        </h3>
        <p>
          Upcoming Events
        </p>
      </div>
      <?php
		    $sqlview = "SELECT * FROM  event where event_date_time > CURDATE()";
		    $qsqlview = mysqli_query($con,$sqlview);
	    	while($rsview = mysqli_fetch_array($qsqlview))
		    {
          ?>
      <div class="event_container">
        <div class="box">
          <div class="img-box">
           <h5>
		  <?php
			$rsjsonarr = json_encode($rsview);
			if($rsview['event_banner'] == "")
			{
				$filename= "images/defaultimage.png";
			}
			else if(file_exists("imgbanner/" .$rsview['event_banner']))
			{
				$filename= "imgbanner/" .$rsview['event_banner'];
			}
			else
			{
				$filename= "images/defaultimage.png";
			}
			echo "<img src='$filename' style='width: 100px;height:100px;' >";
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
            <?php echo date("d-m-Y h:i A",strtotime($rsview['event_date_time']));?>
            </h3>
			<a href="event_more_det.php?event_id=<?php echo $rsview['event_id']; ?>" class="btn btn-info">View More</a>
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