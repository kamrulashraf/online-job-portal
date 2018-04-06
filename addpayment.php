<?php
session_start();
  $c1 = oci_connect("system", "sys123", 'localhost/XE');

  
$array = oci_parse($c1,"select project1.seq_company.nextval from DUAL");
oci_execute($array);
$row=oci_fetch_array($array);
echo $row[0];
$finalId = "payment_" . $row[0];
$_SESSION['payment_id'] = $finalId;
$payment_id= $finalId;
$pm1= $_POST['pm'];
$pf1= $_POST['pf'];
$pa1= $_POST['pa'];
$pdate = date('d-m-Y', strtotime($_POST['pd']));
//$division1= $_POST['division'];
//$district1= $_POST['district'];
//$city1= $_POST['city'];
//$country1= $_POST['country'];
//$streetNo1= $_POST['streetNo'];
//$postCode1= $_POST['postCode'];


 
//echo $jobseeker_id1 . "  " . $username1;

$stmt= "INSERT INTO project1.payment(PAYMENT_ID,PAYMENT_METHOD,PAYMENT_FOR,PAYMENT_AMOUNT,PAYMENT_DATE,PAYMENT_STATUS) 
		VALUES (:pi_bv,:pm_bv,:pf_bv,:pa_bv,to_date('" . $pdate . "','dd-mm-yy'),'Yes')";
 $s=oci_parse($c1, $stmt);

oci_bind_by_name($s, "pi_bv", $payment_id);
oci_bind_by_name($s, "pm_bv", $pm1);
oci_bind_by_name($s, "pf_bv", $pf1);
oci_bind_by_name($s, "pa_bv", $pa1);


oci_execute($s);

if($pf1=="Advertisement"){
	$cid = $_SESSION['companyId'];
 echo $cid;

$stmt= "INSERT INTO project1.PAY(PAYMENT_ID,COMPANY_ID) VALUES (:pid_bv, :cid_bv)";
 $s=oci_parse($c1, $stmt);

oci_bind_by_name($s, "pid_bv", $payment_id);
oci_bind_by_name($s, "cid_bv", $cid);


oci_execute($s);
echo "Inserted";
	
	
	header('location:advertisementform.php');

}
if($pf1=="Job"){
	
	$cid = $_SESSION['companyId'];
 echo $cid;

$stmt= "INSERT INTO project1.PAY(PAYMENT_ID,COMPANY_ID) VALUES (:pid_bv, :cid_bv)";
 $s=oci_parse($c1, $stmt);

oci_bind_by_name($s, "pid_bv", $payment_id);
oci_bind_by_name($s, "cid_bv", $cid);


oci_execute($s);
echo "Inserted";

header('location:jobFrom.php');
}



echo "Inserted";
?>


