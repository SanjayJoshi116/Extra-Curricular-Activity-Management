<?php
include("header.php");
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
          View Event Result
        </h3>
        <p>
          View Event Result Reports
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
			<a href="event_result_report.php?event_id=<?php echo $rsview['event_id']; ?>" class="btn btn-success">View Result</a>
            (<?php echo $rsview['event_participation_type'];?> Event)
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