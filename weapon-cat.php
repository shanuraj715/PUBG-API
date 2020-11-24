<?php
include './config.php';
include './db_connect.php';

$string = "SELECT * FROM `gun-category`";
$query = mysqli_query($conn, $string);
echo '[';
if($query){
	$rows = mysqli_num_rows($query);
	$current_row = 0;
	while( $result = mysqli_fetch_assoc($query)){
		$result['image'] = DOMAIN . '/images/gun-category/' . $result['image'];
		echo json_encode( $result );

		$current_row++;
		if($current_row < $rows){
			echo ',';
		}
	}
}

echo ']';

?>