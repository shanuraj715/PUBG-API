<?php
include './config.php';
include './db_connect.php';

// It takes parameter "cat"

if(isset($_GET['cat']) and !empty($_GET['cat'])){
	$category = mysqli_real_escape_string($conn, $_GET['cat']);
}


$string = "SELECT * FROM `all-assets` WHERE category = '$category'";
$query = mysqli_query($conn, $string);
echo '[';
if($query){
	$rows = mysqli_num_rows($query);
	$current_row = 0;
	while( $result = mysqli_fetch_assoc($query)){
		$result['image'] = DOMAIN . '/images/all-images/' . $result['image'];
		echo htmlspecialchars( json_encode( $result ) );
		
		$current_row++;
		if($current_row < $rows){
			echo ',';
		}
	}
}

echo ']';
?>
