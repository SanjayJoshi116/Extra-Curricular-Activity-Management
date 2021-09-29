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
<style>
ul{
  margin: 0px;
  padding: 0px;
  list-style: none;
}

ul.dropdown{ 
  position: relative; 
  width: 100%; 
}

ul.dropdown li{ 
  font-weight: bold; 
  float: left; 
  width: 180px; 
  position: relative;
  background: #ecf0f1;
}

ul.dropdown a:hover{ 
  color: #000; 
}

ul.dropdown li a { 
  display: block; 
  padding: 20px 8px;
  color: #34495e; 
  position: relative; 
  z-index: 2000; 
  text-align: center;
  text-decoration: none;
  font-weight: 300;
}

ul.dropdown li a:hover,
ul.dropdown li a.hover{ 
  background: #3498db;
  position: relative;
  color: #fff;
}


ul.dropdown ul{ 
 display: none;
 position: absolute; 
  top: 0; 
  left: 0; 
  width: 180px; 
  z-index: 1000;
}

ul.dropdown ul li { 
  font-weight: normal; 
  background: #f6f6f6; 
  color: #000; 
  border-bottom: 1px solid #ccc; 
}

ul.dropdown ul li a{ 
  display: block; 
  color: #34495e !important;
  background: #eee !important;
} 

ul.dropdown ul li a:hover{
  display: block; 
  background: #3498db !important;
  color: #fff !important;
} 

.drop > a{
  position: relative;
}

.drop > a:after{
  content:"";
  position: absolute;
  right: 10px;
  top: 40%;
  border-left: 5px solid transparent;
  border-top: 5px solid #333;
  border-right: 5px solid transparent;
  z-index: 999;
}

.drop > a:hover:after{
  content:"";
   border-left: 5px solid transparent;
  border-top: 5px solid #fff;
  border-right: 5px solid transparent;
}
</style>
<table class="table table-bordered">
  <tr>
    <th style="vertical-align: middle;"><h2>Select Event Type :- </h2></th>
    <th>
    <nav>
      <ul class="dropdown" style="z-index: 0;">
        <li><a href="upcoming-event.php?eventtype=All" 
        <?php
        if($_GET['eventtype'] != "Single" && $_GET['eventtype'] != "Team" )
        {
        ?>
        style="background-color: red;color: white;"
        <?php
        }
        ?>
        >All Types of Events</a></li>
        <li><a href="upcoming-event.php?eventtype=Single" 
        <?php
        if($_GET['eventtype'] == "Single" )
        {
        ?>
        style="background-color: red;color: white;"
        <?php
        }
        ?> >Individual Event</a></li>
        <li><a href="upcoming-event.php?eventtype=Team"
        <?php
        if($_GET['eventtype'] == "Team" )
        {
        ?>
        style="background-color: red;color: white;"
        <?php
        }
        ?>>Team Event</a></li>
      </ul>
    </nav>
    </th>
  </tr>
</table>
      <?php
		    $sqlview = "SELECT * FROM  event where event_date_time > '$dttim' ";
        if($_GET['eventtype'] == "Single")
        {
          $sqlview = $sqlview . " AND  event.event_participation_type='Single' ";
        }
        if($_GET['eventtype'] == "Team")
        {
          $sqlview = $sqlview . " AND  event.event_participation_type='Team' ";
        }
        $sqlview = $sqlview. " ORDER BY event_date_time DESC";
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
        <hr><br>
        <div >
         <h1 style=" color : red">Currently there is no upcomming events... Events will be added soon...</h1>
       </div><hr>
      <?php
      } 
      ?>
  </section>

  <!-- end event section -->
<?php
include("footer.php");
?>