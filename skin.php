<?php
include './config.php';
include './db_connect.php';

// It takes parameter "cat"

$string = 'SELECT * FROM `skins`';

if(isset($_GET['item']) and !empty($_GET['item'])){
	$item = mysqli_real_escape_string($conn, $_GET['item']);
	$string = "SELECT * FROM `skins` WHERE `item_for` = '$item'";
}

if(isset($_GET['id']) and !empty($_GET['id'])){
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$string = "SELECT * FROM `skins` WHERE `id` = $id";
}

$query = mysqli_query($conn, $string);
echo '[';
if($query){
	$rows = mysqli_num_rows($query);
	$current_row = 0;
	while( $result = mysqli_fetch_assoc($query)){
		$result['image'] = DOMAIN . '/images/skins/AR/AKM/' . $result['image'];
		echo htmlspecialchars( json_encode( $result ) );
		
		$current_row++;
		if($current_row < $rows){
			echo ',';
		}
	}
}

echo ']';
?>
