<?php
include './config.php';
include './db_connect.php';


$string = "SELECT * FROM `other-assets`";
$query = mysqli_query($conn, $string);
echo '[';
if($query){
	$rows = mysqli_num_rows($query);
	$current_row = 0;
	while( $result = mysqli_fetch_assoc($query)){
		$result['image'] = DOMAIN . '/images/assets-images/' . $result['image'];
		echo htmlspecialchars( json_encode( $result ) );
		
		$current_row++;
		if($current_row < $rows){
			echo ',';
		}
	}
}

echo ']';
?>
