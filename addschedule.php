<?php
session_start();
  $c1 = oci_connect("system", "sys123", 'localhost/XE');

  $finalId = $_SESSION['course_id'];
  
$company_id1= $finalId;
$starttime= $_POST['starttime'];
$endtime= $_POST['endtime'];
$loc2= $_POST['cl'];
$cdate = date('d-m-Y', strtotime($_POST['c_date']));

//$division1= $_POST['division'];
//$district1= $_POST['district'];
//$city1= $_POST['city'];
//$country1= $_POST['country'];
//$streetNo1= $_POST['streetNo'];
//$postCode1= $_POST['postCode'];


 
//echo $jobseeker_id1 . "  " . $username1;
$stmt= "INSERT INTO project1.schedule(COURSE_ID,CLASS_LOCATION,CLASS_START_TIME,CLASS_END_TIME,CLASS_DATE) 
		VALUES (:courseid_bv,:cl_bv,:st_bv,:et_bv,to_date('" . $cdate . "','dd-mm-yy'))";
 $s=oci_parse($c1, $stmt);

oci_bind_by_name($s, "courseid_bv", $company_id1);
oci_bind_by_name($s, "cl_bv", $loc2);
oci_bind_by_name($s, "st_bv", $starttime);
oci_bind_by_name($s, "et_bv", $endtime);

oci_execute($s);

if(isset($_POST['sub']))
{
	 header('location:companyProfile.php');
}

if(isset($_POST['addval']))
{
	echo "Hi";
	header('location:scheduleform.php');
}

echo "inserted";


?>