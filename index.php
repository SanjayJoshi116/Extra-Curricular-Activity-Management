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
<!-- Quotes -->
<article class="article">
    <blockquote>
    <p>When I was a teenager, I began to settle into school because I'd discovered the extracurricular activities that interested me: music and theater.</p>
    <cite><span class="cite-last-name">Morgan Freeman</span></cite>
    <div class="blockquote-author-image" style="--image: url('images/morganfreeman.jfif')"></div>
  </blockquote>
</article>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Vollkorn:ital,wght@0,600;1,500&display=swap');

:root {
  --type-body: Open Sans, Helvetica, Arial, sans-serif;
  --type-quote: Vollkorn;
  --quote-image-width: 140px;
  --border-rad: 7px;
  --accent-color: hsl(322deg 85% 65%);
  --quote-bg: hsl(0 0% 97%);
}


*,
*::before,
*::after {
  box-sizing: border-box;
}

a {
  text-decoration: none;
  color: var(--accent-color);
}

a:hover,
a:focus {
  text-decoration: underline;
}

body {
  margin: 15px 10px;
  font-family: var(--type-body);
  color: hsl(0 0% 15%);
}

.article {
  max-width: 900px;
  margin: auto;
}

h1 {
  width: max-content;
  margin: 0 auto 1.8em;
  box-shadow:
    0 2px 0 var(--accent-color),
    0 4px 0 white,
    0 6px 0 var(--accent-color);
  font: 1.4rem var(--type-quote);
  color: hsl(0 0% 25%);
}


blockquote {
  position: relative;
  margin: 40px 0;
  padding: 1.6em 2.4em .7em calc(1.4em + var(--quote-image-width));
  font: italic 1.2rem var(--type-quote);
  background: var(--quote-bg) no-repeat left / var(--quote-image-width);
  border-radius: var(--border-rad);
  border: 2px solid white;
  box-shadow: 2px 2px 4px hsl(0 0% 0% / 20%);
  text-indent: 1.6em;
}

@media (min-width: 768px) {
  blockquote {
    margin: 40px 60px;
  }
}

blockquote::before {
  content: "";
  pointer-events: none;
  position: absolute;
  z-index: 1;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  border-radius: var(--border-rad);
  box-shadow:
    inset -2px -2px 1px hsl(0 0% 100%),
    inset 2px 2px 4px hsl(0 0% 0% / 20%);
}

blockquote::after {
  content: "❝";
  position: absolute;
  z-index: 1;
  left: 50%;
  top: -2px;
  transform: translate(-50%, -50%);
  width: 1.3em;
  height: 1.3em;
  background: white;
  box-shadow: 0 4px 5px -1px hsla(0 0% 0% / 20%);
  border-radius: 999px;
  display: grid;
  place-content: center;
  padding-top: .5em;
  color: var(--accent-color);
  font-size: 36px;
  font-style: normal;
  text-indent: 0;
}

.blockquote-author-image {
  position: absolute;
  left: 0;
  top: 0;
  width: var(--quote-image-width);
  height: 100%;
  opacity: 0.75;
  background: var(--accent-color) var(--image) no-repeat center / cover;
  background-blend-mode: hard-light;
  border-top-left-radius: var(--border-rad);
  border-bottom-left-radius: var(--border-rad);
}

cite {
  display: block;
  margin-top: 30px;
  text-indent: 0;
  text-align: center;
  font: bold .9rem var(--type-body);
  text-transform: uppercase;
  color: hsl(0 0% 20%);
}

@media (min-width: 768px) {
  cite {
    margin-left: calc(1rem - var(--quote-image-width));
  }
}

.cite-last-name {
  background: var(--accent-color);
  color: var(--quote-bg);
}
.controls {
  position: fixed;
  bottom: 10px;
  right: 10px;
  font-size: 0.8em;
  opacity: 0.7;
  transition: .2s;
}

.controls:hover,
.controls:focus {
  opacity: 1;
}

.controls label {
  font-weight: bold;
  text-transform: lowercase;
}

.controls input {
  display: block;
  width: 100%;
  border: 0;
  outline: none;
  padding: 0;
}
</style>
<script>
  document.querySelector('.js-accent-color').addEventListener('change', (e) => {
  document.documentElement.style.setProperty('--accent-color', e.target.value)
})
</script>
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
<?php
include("footer.php");
?>