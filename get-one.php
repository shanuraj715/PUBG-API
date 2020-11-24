<?php
include './config.php';
include './db_connect.php';

// It takes parameter "cat"

if(isset($_GET['type']) and !empty($_GET['type'])){
	$type = mysqli_real_escape_string($conn, $_GET['type']);
	if(isset($_GET['id']) and !empty($_GET['id'])){
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		if($type == 'asset'){
			$table = 'all-assets';
		}
		elseif($type == 'weapon'){
			$table = 'guns';
		}
	}
}


$string = "SELECT * FROM `$table` WHERE id = $id";
$query = mysqli_query($conn, $string);
echo '[';
if($query){
	$rows = mysqli_num_rows($query);
	$current_row = 0;
	$result = mysqli_fetch_assoc($query);
	$result['image'] = DOMAIN . '/images/all-images/' . $result['image'];
	echo htmlspecialchars( json_encode( $result ) );
}

echo ']';
?>
