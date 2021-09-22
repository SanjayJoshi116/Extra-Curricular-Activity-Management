<?php
include("header.php");
include("slider.php");
?>
<br>
  </div>
<!-- special section -->

  <section class="special_section">
    <div class="container">
      <div class="special_container">
        <div class="box b1">
          <div class="img-box">
            <img src="images/award.png" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              BEST <br />
              INDUSTRY LEADERS
            </h4>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="box b2">
          <div class="img-box">
            <img src="images/study.png" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              LEARN <br />
              COURSES ONLINE
            </h4>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="box b3">
          <div class="img-box">
            <img src="images/books-stack-of-three.png" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              BEST <br />
              LIBRARY & STORE
            </h4>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end special section -->

  <!-- about section -->
  <section class="about_section layout_padding">
    <div class="side_img">
      <img src="images/side-img.png" alt="" />
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img_container">
            <div class="img-box b1">
              <img src="images/sdmujire.jpg" alt="" />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h3>
                About Our College
              </h3>
              <p>
                SDM College, Ujire is an autonomous college under Mangalore University. Founded in 1966, the college offers Bachelors and Masters Programmes in a serene campus at the foothills of the Western Ghats in Karnataka (India). The college is a recognized centre for research programmes of Mangalore University, Tumkur University and Kannada University Hampi. Managed by SDM Educational Society, it is headed by the visionary, Dr. D. Veerendra Heggade, Dharmadhikari of Shri Kshetra Dharmasthala. 
              </p>
              <a href="about.php">
                Read More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->
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
      <ul class="dropdown">
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
            <a href="event_more_det.php?event_id=<?php echo $rsview['event_id']; ?>" class="btn btn-info">View More</a>
            (<?php echo $rsview['event_participation_type'];?> Event)
          </div>
        </div>
        <?php
      }
        ?>
    </div>
  </section>


  <!-- contact section -->
<?php
if(isset($_POST['submit']))
{
  $complain_doc = rand() . $_FILES['complain_doc']['name'];
  move_uploaded_file($_FILES['complain_doc']['tmp_name'],"doccomplaint/" . $complain_doc);
  $sql = "INSERT INTO complaint_report(student_id,staff_id,reply_complaint_report_id,complaint_detail,complain_doc) VALUES('$_SESSION[student_id]','$_SESSION[staff_id]','','$_POST[complaint_detail]','$complain_doc')";
  $qsql = mysqli_query($con,$sql);
  echo mysqli_error($con);
  if(mysqli_affected_rows($con)==1)
  {
    echo "<script>alert('Complaint Report submitted  successfully...');</script>";
    echo "<script>window.location='complaint.php';</script>";
  }
}
?>
</div>

  <!-- contact section -->

  <section class="contact_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h3>
                Report Complain 
              </h3>
              <p>
                Enter your complain details
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
            
            </h5>
            <form action="" method="post" name="frmcomplaint_report" id="frmcomplaint_report" enctype="multipart/form-data">
              <div>
                <label class="labelproperty">COMPLAINT DETAILS</label>
        <textarea name="complaint_detail" id="complaint_detail" class="form-control"></textarea>
              </div>
              <div>
                <label class="labelproperty">COMPLAIN DOC</label>
        <input type="file" name="complain_doc" id="complain_doc" class="form-control" >
              </div>
              <div class="d-flex justify-content-center">
                <button type="submit" name="submit" id="submit" class="btn_on-hover">Click Here to Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->
<?php
include("footer.php");
?>