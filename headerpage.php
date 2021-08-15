<style type="text/css">
#header .navbar-light .navbar-nav .nav-link:focus,
#header .navbar-light .navbar-nav .nav-link:hover {
    color: #ef4211;
}
#header nav{
  padding: 15px 0px;
}
#header .navbar-light .navbar-nav .nav-link {
  color: #5a5a5a;
  font-size: 20px;
}
#header {
    border-bottom: 1px solid #ddd;
    background-color: #3498db;
    float: left;
    width: 100%;
}
#header ul.navbar-nav {
    position: absolute;
    right: 0;
}
#header li.nav-item {
    margin: 0px 10px;
}
#header .navbar-light .navbar-nav .active>.nav-link, #header .navbar-light .navbar-nav .nav-link.active, #header .navbar-light .navbar-nav .nav-link.show, #header .navbar-light .navbar-nav .show>.nav-link {
    color: #ef4211;
}
#header .dropdown-menu.show {
    border: none;
}
.topbar {
    background-color: #3498db;
    color: #fff;
    padding: 4px 0px;
}
.topbar ul{
  margin: 0px;
  padding: 0px;
}
.topbar ul li {
    float: left;
    list-style: none;
    margin: 3px 7px;
    font-size: 15px;
}
.topbar ul li a{
  color: #fff;
}
.topbar ul li i {
    font-size: 18px;
    margin-right: 3px;
}
.topbar ul li.followus-label {
    font-weight: bold;
}
#header .social-icon {
    float: right;
}
/*=============Responsive css==================*/
@media (max-width: 991px){
.topbar ul li {
    margin: 3px 3px;
    font-size: 12px;
}
#header ul.navbar-nav {
    position: static;
    width: 100%;
    border-top: 1px solid #ddd;
    margin: 15px 0px 0px;
}
}
</style>

<div id="header">
  <header>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.php"><img src="images/logo_new.jpg" alt="logo" style="width: 400px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbartoggle" aria-controls="navbartoggle" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbartoggle">
<div class="nav-fostrap">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="about.php">About</a></li>
<?php
if(isset($_SESSION['staff_id']))
{
?>	

		<li><a href="javascript:void(0)">Events<span class="arrow-down"></span></a>
		<!-- drop menu -->
			<ul class="dropdown">
				<li><a href="upcoming-event.php">Upcoming Events</a></li>
				<li><a href="live-event.php">Live Events</a></li>
				<li><a href="completed-event.php">Completed Events</a></li>
				<li><a href="addevent.php">Add Event</a></li>
				<li><a href="event_type.php">Add Event Type</a></li>
			</ul>
		</li>
		<li><a href="javascript:void(0)">Result<span class="arrow-down"></span></a>
		<!-- drop menu -->
			<ul class="dropdown">
				<li><a href="event_result.php">Add Event Result</a></li>
				<li><a href="event_result_status.php">Add Event Result Status</a></li>
			</ul>
		</li>
<?php
}
?>
		<li><a href="javascript:void(0)">Events<span class="arrow-down"></span></a>
		<!-- drop menu -->
			<ul class="dropdown">
				<li><a href="upcoming-event.php">Upcoming Events</a></li>
				<li><a href="live-event.php">Live Events</a></li>
				<li><a href="completed-event.php">Completed Events</a></li>
				<li><a href="addevent.php">Add Event</a></li>
				<li><a href="event_type.php">Add Event Type</a></li>
			</ul>
		</li>
		
		
		<li><a href="javascript:void(0)">Blogger<span class="arrow-down"></span></a>
		<!-- drop menu -->
		<ul class="dropdown">
			<li><a href="#">Widget</a></li>
			<li><a href="#">Tips</a></li>
		</ul>
		</li>
		
		<li><a href="#">Business</a></li>
		
	</ul>
</div>
            </div>
          </nav>
        </div>
      </div>
    </div>  
  </header>
</div>