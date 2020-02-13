<?php 



header('Content-Type: application/json');

require_once('conn.php');

$qry = "SELECT type, count(*) as number FROM projects GROUP BY type ";
$result = $conn->query($qry);



$rlt = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($rlt as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>

