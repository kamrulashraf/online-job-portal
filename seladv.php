<?PHP
 
$conn=OCILogon("system", "sys123", "localhost/XE");
IF ( ! $conn ) {
 ECHO "Unable to connect: " . VAR_DUMP( OCIError() );
 DIE();
}
 

$sql = 'SELECT * FROM PROJECT1.ADVERTISEMENT';
$stid = oci_parse($conn, $sql);

oci_execute($stid);
while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
   // echo " " .$row['ADVERTISEMENT_ID'] ."----\n";
	echo "Advertisement Wide; ".$row['ADVERTISEMENT_WIDE'] ."<br>";
	echo "Advertisement Height; ".$row['ADVERTISEMENT_HEIGHT'] ."<br>";
	echo "Advertisement Wide; ".$row['COST_PER_SQURE'] ."<br>";
	echo "Total Cost; ".$row['TOTAL_COST'] ."<br>";
	echo "Start Time; ".$row['START_TIME'] ."<br>";
	echo "Ending Time; ".$row['ENDING_TIME'] ."<br>";
	echo "Advertisement Status; ".$row['ADVERTISEMENT_STATUS'] ."<br>";
	echo "Advertisement Title; ".$row['ADVERTISEMENT_TITLE'] ."<br?";
	echo "Advertisement Type; ".$row['ADVERTISEMENT_TYPE'] ."<br>\n";
	echo "<br>" ."<br>". "<br>";
}
 

 
?>