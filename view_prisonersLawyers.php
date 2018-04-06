<?php

$c1 = oci_connect('system', 'aaaaa', 'localhost/XE');
echo '<body bgcolor="#d1d1e0">' ;
echo ' <center> <h1> Prisoners And Their Lawyers</h1></center> ';
    $stid = oci_parse($c1, 'SELECT * FROM asmi.PrisonerLawyer');
                oci_execute($stid);

echo "<center>";

echo "<table border='10'>\n";
echo'<th>Prisoner Name</th>';
echo'<th>Prisoner NID</th>';
echo'<th>Prisoner ID</th>';
echo'<th>Lawyer Name</th>';
echo'<th>Lawyer NID</th>';






while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</center>";

echo "</table>\n";
echo "</body>\n";


?>

