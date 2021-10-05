<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	if(!isset($_SESSION['student_id']))
	{
		echo "<script>window.location='login.php';</script>";
	}
}
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
          Recently Completed Events
        </p>
      </div>
      <?php
      $count=1;
        $sqlres = "SELECT * FROM  event_result";
        $qsqlres = mysqli_query($con,$sqlres);
        $sqlview = "SELECT * FROM  event where event_date_time < CURDATE()";
        $qsqlview = mysqli_query($con,$sqlview);
        while($rsview = mysqli_fetch_array($qsqlview))
        {
          if($count<=6)
          {
         ?>
     <div class="boxd">
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
            <?php echo date("d-M-Y",strtotime($rsview['event_date_time']));?>
            </h3>
          </div>
      <div>
        <?php
        $sqlres = "SELECT * FROM  event_result where event_id=" .$rsview['event_id'];
        $qsqlres = mysqli_query($con,$sqlres);
             if(!$rsview['event_id'] == $rsres['event_id'])
              {
          ?>
      <a href="event_result_report.php?event_id=<?php echo $rsview['event_id']; ?>" class="btn btn-success">View Result</a>
      (<?php echo $rsview['event_participation_type'];?> Event)
      <?php 
          }
      else
      {
        ?>
        <button class="button-3" role="button" >Result will be added shortly</button>

      <?php } ?>

      </div>
      </div>
    </div>
  </div>
        <?php
    
        $count=$count+1;
      }
      }
        ?>
    </div>
  </section>
  <style>
.boxd {
  background: white;
}

.boxd:hover {
  background-color: #febfb9;
  cursor: pointer;
  -webkit-transition: background-color 2s ease-out;
  -moz-transition: background-color 2s ease-out;
  -o-transition: background-color 2s ease-out;
  transition: background-color 2s ease-out;
}
.button-3 {
  appearance: none;
  background-color: #e64242;
  border: 5px solid rgba(27, 31, 35, .15);
  border-radius: 6px;
  box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,system-ui,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji";
  font-size: 18px;
  font-weight: 600;
  line-height: 20px;
  padding: inherit;
  position: relative;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  white-space: nowrap;
}

.button-3:focus:not(:focus-visible):not(.focus-visible) {
  box-shadow: none;
  outline: none;
}

.button-3:hover {
  background-color: #2c974b;
}

.button-3:focus {
  box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
  outline: none;
}

.button-3:disabled {
  background-color: #94d3a2;
  border-color: rgba(27, 31, 35, .1);
  color: rgba(255, 255, 255, .8);
  cursor: default;
}

.button-3:active {
  background-color: #298e46;
  box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
}
</style>

  <!-- end event section -->
<?php
include("footer.php");
?>