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
          Live Events
        </p>
      </div>
      <?php
	  $dt = date("Y-m-d");
		    $sqlview = "SELECT * FROM  event where event_date_time BETWEEN '$dt 00:00:00' AND '$dt 23:59:59'";
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
            <?php echo "{$rsview['event_title']}";?>
            </h4>
            <h6>
              <?php echo "{$rsview['event_venue']}";?>
            </h6>
          </div>
          <div class="date-box">
            <h3>
            <?php echo "{$rsview['event_date_time']}";?>
            </h3>
          </div>
        </div>
        <?php
      }
      if($flag==0)
      {
        ?>
        <hr><br>
        <div style="  font-family: Lucida Console, Courier New, monospace;">
         <h1 style=" color : red">Currently there is no live events... </h1>
       </div><hr>
      <?php
      } 
      ?>
    </div>
  </section>

  <!-- end event section -->
<?php
include("footer.php");
?>