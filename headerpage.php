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
    float: center;
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
				<li><a href="viewevent.php">View Events</a></li>
				<li><a href="event_type.php">Add Event Type</a></li>
				<li><a href="view_event_type.php">View Event Type</a></li>
			</ul>
		</li>
		<li><a href="javascript:void(0)">Result<span class="arrow-down"></span></a>
		<!-- drop menu -->
			<ul class="dropdown">
				<li><a href="display_event.php">Attendance Entry</a></li>
				<li><a href="event_result.php">Add Event Result</a></li>
				<li><a href="event_result_status.php">Add Event Result Status</a></li>
				<li><a href="view_event_result_status.php">Event Result</a></li>
			</ul>
		</li>

		<li><a href="javascript:void(0)">Admin Panel<span class="arrow-down"></span></a>
		<!-- drop menu -->
			<ul class="dropdown">
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="courseentry.php">Add Course</a></li>
				<li><a href="viewcourse.php">View Course</a></li>
				<li><a href="department.php">Add Department</a></li>
				<li><a href="viewdepartment.php">View Department</a></li>
				<li><a href="departmentcourse.php">Add Department Course</a></li>
				<li><a href="view-departmentcourse.php">View Department Course</a></li>
				<li><a href="view_event_apply.php">View Applications</a></li>
				<li><a href="view_event_result.php">View Event Result</a></li>
				<li><a href="view_event_result_status.php">View Event Result Status</a></li>
				<li><a href="viewstaff.php">View Staff</a></li>
				<li><a href="viewstudent.php">View Student</a></li>
			</ul>
		</li>
<?php
			}
			if(isset($_SESSION['student_id']))
			{
?>
<li><a href="javascript:void(0)">Events<span class="arrow-down"></span></a>
		<!-- drop menu -->
			<ul class="dropdown">
				<li><a href="upcoming-event.php">Upcoming Events</a></li>
				<li><a href="live-event.php">Live Events</a></li>
				<li><a href="completed-event.php">Completed Events</a></li>
				</ul>
				</li>
		<li><a href="student-dashboard.php">Dashboard</a></li>
		
		<li><a href="view_event_result_status.php">Result</a></li>
		<?php
			}
		?>
		
		<?php
		if(isset($_SESSION['staff_id']) || ($_SESSION['student_id']))
		{
		?>
		<li><a href="logout.php">Logout</a></li>
		<?php
		}
		else
		{
		?>
		<li><a href="student.php">Registration</a></li>
		<li><a href="login.php">Login</a></li>
		<?php
		}
		?>
	</ul>
</div>
            </div>
          </nav>
        </div>
      </div>
    </div>  
  </header>
</div>