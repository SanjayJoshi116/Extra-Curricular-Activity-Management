<?php
include("header.php");
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
          View Students
        </h3>
        <p>
          View Student Records
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Student Name</th>
			<th>Course</th>
			<th>Roll No.</th>
			<th>Class</th>
			<th>Image</th>
			<th>Gender</th>
			<th>DOB</th>
			<th>Language</th>
			<th>Elective Paper</th>
			<th>Extension Activities</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT * FROM  student ";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[student_name]</td>
				<td>$rsview[course_id]</td>
				<td>$rsview[student_rollno]</td>
				<td>$rsview[st_class]</td>
				<td>$rsview[student_image]</td>
				<td>$rsview[gender]</td>
				<td>$rsview[dob]</td>
				<td>$rsview[language]</td>
				<td>$rsview[elective_paper]</td>
				<td>$rsview[extension_activities]</td>
				<td>$rsview[student_status]</td>
				<td>Edit | Delete</td>
			</tr>";
		}
		?>
	</tbody>
</table>
<!-- ####################VIEW TABLE ENDS HERE ######### ---->
        </div>
		
      </div>
    </div>
  </section>

  <!-- end event section -->
<?php
include("footer.php");
?>