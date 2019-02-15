<?php
include("csv.php");
$csv = new csv() ;

if(isset($_POST['sub'])){
	$csv->Import($_FILES['file']['tmp_name']);
	//var_dump($_FILES['file']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CSV</title>
</head>
<body>
	My CSV Page 
	<form method="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" name="sub" value="Import">
	</form>
</body>
</html>