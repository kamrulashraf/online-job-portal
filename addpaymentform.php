<?php
	echo '<body bgcolor="#AED6F1">' ;
?>

<html>
<body>

<form action="addpayment.php" method="post">
Payment Method:<br> <input type="text" name="pm"> <br>
Payment For: <br><input type="text" name="pf"><br>
Payment Date: <br><input type="date" name="pd" value = "dd-mm-yyy">  <br>
Payment Amount: <br><input type="number" name="pa"><br>


<input type="submit">
</form>

</body>
</html>