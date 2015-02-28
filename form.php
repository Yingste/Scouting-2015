<?php


	$team = "";
	$test = "";
	$keyold = "";
	$row = "0";
	
	
function console($ctext)
{
	$time = time();
	$console = $time . " : " . $ctext . "\n";
	file_put_contents('console.txt',$console, FILE_APPEND);
}
	
	

// Create connection
$con=mysqli_connect("mysql.hostinger.co.uk","u730988852_scout","scouting" , "u730988852_scout");

// Check connection
if (mysqli_connect_errno())
  {
  console( "Failed to connect to MySQL: " . mysqli_connect_error());
  }
	
	if (!mysqli_connect_errno())
  {
  console( "Connection successful or something" . mysqli_connect_error());
  }

	



	
foreach ($_POST as $key => $value)
{
	if ($key == 'team')
		{
			//echo "$value";
			$team = $value;
		}
	if ($key == 'match')
		{
			$match = $value;
		}
	
	
}
	
/*
$sql = "INSERT INTO scout (`team`, `match`, `id`, `value`) VALUES ('1','2','3','4')";
		if (mysqli_query($con, $sql)) {
			echo "New record created successfully";
		} else {
			echo mysqli_error($con);
		}
*/


foreach ($_POST as $key => $value)
{
	if (($key == "match") || ($key == "team"))
	{
	
	}else
	{
		//mysqli_query($con,"INSERT INTO scout (team, match, id, value) VALUES ('$team', '$match', '$key', $value)");
		//mysqli_query($con,"INSERT INTO `scout`(`team`, `match`, `id`, `value`) VALUES ($team,$match,$key,$value)");
		
		$sql = "INSERT INTO scout (`team`, `match`, `id`, `value`) VALUES ('$team','$match','$key','$value')";
		if (mysqli_query($con, $sql)) {
			echo "New record created successfully";
		} else {
			echo mysqli_error($con);
		}
		$response[$row] .= $team . "," . $match . "," . $key . "," . $value . "\n";
		file_put_contents('scouting.csv',$response[$row], FILE_APPEND);
		$row += 1;
	}
	
	
	
}




// auto go back to scouting interface
header('Location: ' . $_SERVER['HTTP_REFERER']);

















?>
