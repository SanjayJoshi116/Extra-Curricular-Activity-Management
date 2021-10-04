<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM department where department_id='$_GET[delid]'";
	$qsqldel = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Department Record deleted successfully..');</script>";
		echo "<script>window.location='viewdepartment.php';</script>";
	}
}
//Approve or Suspend department starts here
if(isset($_GET['acid']))
{
	$sqlas ="UPDATE department SET department_status='$_GET[st]' WHERE department_id='$_GET[acid]'";
	$qsqlas = mysqli_query($con,$sqlas);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('department status updated to $_GET[st]');</script>";
		echo "<script>window.location='viewdepartment.php';</script>";
	}
}
//Approve or Suspend department ends here
?>
<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
<link href="multiselect/jquery.multiselect.css" rel="stylesheet" />
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
          View Department
        </h3>
        <p>
          View Department Records
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<form method="post" action="" name="frmdept" id="frmdept" >
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Department</th>
			<th>Department Details</th>
			<th>Courses Under department</th>
			<th>Department Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sqlcourserec = "SELECT * FROM course WHERE course_status='Active'";
			$qsqlcourserec = mysqli_query($con,$sqlcourserec);
			while($rscourserec = mysqli_fetch_array($qsqlcourserec))
			{
				$rscoursearr[] = $rscourserec;
			}
			$sqldept_course= "SELECT * FROM dept_course WHERE dept_status='Active'";
			$qsqldept_course = mysqli_query($con,$sqldept_course);
			while($rsdept_course = mysqli_fetch_array($qsqldept_course))
			{
				$rs_dept_course_arr[$rsdept_course['department_id']][] = $rsdept_course;
			}
function myfunction($products, $field, $value)
{
   foreach($products as $key => $product)
   {
      if ( $product[$field] === $value )
		  if($key == 0)
		  {
			return 9999;
		  }
		  else
		  {
			return $key;
		  }
   }
   return false;
}			
$myval = myfunction($rs_dept_course_arr[3], 'course_id','3');
		$sqlview = "SELECT * FROM  department ";
		$qsqlview = mysqli_query($con,$sqlview);
		$myval=0;
		while($rsview = mysqli_fetch_array($qsqlview))
		{
	$myval=0;
			echo "<tr>
				<td>$rsview[department]</td>
				<td>$rsview[department_detail]</td>
				<td>";
			echo "<select name='dept_course_id". $rsview[0] ."[]' id='dept_course_id" . $rsview[0] ."' multiple='multiple' class='3col active' onchange='fundepartmentcourse(" . $rsview[0] . ")' >";
			for($i=0;$i<count($rscoursearr);$i++)
			{
				$myval = myfunction($rs_dept_course_arr[$rsview[0]], 'course_id', $rscoursearr[$i][0]);
				if($myval != 0)
				{
					echo "<option value='" . $rscoursearr[$i][0] . "' selected>" . $rscoursearr[$i][1] . "</option>";
				}
				else
				{
					echo "<option value='" . $rscoursearr[$i][0] . "'>" . $rscoursearr[$i][1] . "</option>";
				}
			}
			echo "</select>";
			echo "</td>
				<td>$rsview[department_status]";
				if($rsview['department_status'] == "Active")
				{
				echo "<br><a href='viewdepartment.php?st=Suspended&acid=$rsview[department_id]' class='btn btn-secondary' onclick='return confirmst()' >Suspend</a>";
				}	
				else
				{
				echo "<br><a href='viewdepartment.php?st=Active&acid=$rsview[department_id]' class='btn btn-primary' onclick='return confirmst()'  >Approve</a>";
				}
				echo "</td><td>
				<a href='department.php?editid=$rsview[department_id]' class='btn btn-info'>Edit</a> 
				<a href='viewdepartment.php?delid=$rsview[department_id]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a>
			</tr>";
		}
		?>
	</tbody>
</table>
</form>
<!-- ####################VIEW TABLE ENDS HERE ######### ---->
        </div>
		
      </div>
    </div>
  </section>

  <!-- end event section -->
<?php
include("footer.php");
?>
<script>
function confirmdel()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>
<script>
function confirmst()
{
	if(confirm("Are you sure?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="multiselect/jquery.multiselect.js"></script>
<script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 2,
            placeholder: 'Select Course',
            search: true,
            searchOptions: {
                'default': 'Search Course'
            },
            selectAll: true
        });

    });
</script>
<script>
function fundepartmentcourse(department_id)
{
	var varname = "dept_course_id" + department_id + "";
	$.post( "departmentcourse.php", { dept_course_id: department_id, departmentcourse: $("#"+varname).val() } );
}
</script>