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
		    $sqlview = "SELECT * FROM  event ";
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
        ?>
       <?php /*<div class="box">
          <div class="img-box">
            <img src="images/event-img.jpg" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              Education Events 2021
            </h4>
            <h6>
              8:00 AM - 5:00 PM VENICE, ITALY
            </h6>
          </div>
          <div class="date-box">
            <h3>
              <span>
                15
              </span>
              February
            </h3>
          </div>
        </div>\
	</div>*/?>
     
      <div class="btn-box">
        <a href="">
          Read More
        </a>
      </div>
    </div>
  </section>

  <!-- end event section -->
<?php
include("footer.php");
?>