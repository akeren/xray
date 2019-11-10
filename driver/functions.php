<?php
function name($userid, $db){
	$select = mysqli_query($db, "select concat_ws(' ',UPPER(sname), mname,fname) as fullnames, salutation from users where userid = '$userid'") or die(mysqli_error($db));
	$get = mysqli_fetch_array($select,MYSQLI_ASSOC);
	return $get["fullnames"];
}

function userid($db){
	$no = mysqli_num_rows(mysqli_query($db, "select * from users ")) + 1;
	
	if($no < 10){
		$userid = "XDS/000".$no;
	}
	else if($no < 100){
		$userid = "XDS/00".$no;
	}
	else if($no < 1000){
		$userid = "XDS/0".$no;
	}
	else{
		$userid = "XDS/".$no;
	}
	
	
	return $userid;
	}