<?php
include("dbconnection.php");
$sqldel = "DELETE FROM dept_course where department_id='$_POST[dept_course_id]'";
$qsql = mysqli_query($con,$sqldel);
foreach($_POST['departmentcourse'] as $valcourseid)
{
$sql = "INSERT INTO dept_course(department_id,course_id,dept_status) VALUES('$_POST[dept_course_id]','$valcourseid','Active')";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
}
echo "Department Record Inserted successfully...'";
?>