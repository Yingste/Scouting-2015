<html>

<body style="background-color: #FFFFFF;">

<head><title>Scouting 2015</title>
<!-- css styling -->
<link href="style.css" rel="stylesheet" />
<link href="bootstrap.min.css" rel="stylesheet" />
<link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" />


<!-- tooltip -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( document ).tooltip();
  });
  </script>
  <style>
  label {
    display: inline-block;
    width: 5em;
  }
  </style>
<!-- end of tooltip -->

<!-- sortable tables -->
<script type="text/javascript" src="sorttable.js"></script>
<!-- use by setting class="sortable" -->


<!-- Favicon -->
<link rel="icon"  href="favicon.ico" />

</head>

<!-- posting form --> 
<form method="post" action="view.php" id="searchform">

<!-- Navbar -->
<nav class="navbar navbar-default" style="height:5%;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Pwnage</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.html">Match Scouting <span class="sr-only">(current)</span></a></li>
        <li><a href="#" onclick="rank()">Ranks</a></li>
      </ul>
        <div class="form-group">
          <input type="search" class="form-control" placeholder="Search" name="search" id="search" style="width: 40%; height: 100%;">
        </div>
    </div>
  </div>
</nav>


<script>
function rank()
{
	document.getElementById("search").value = 'rank';
	document.forms["searchform"].submit();
}

function search2()
{
	document.getElementById("search").value = 'searchpage';
	document.forms["searchform"].submit();
}

</script>
</form>



<?php

$team = "";
$test = "";
$keyold = "";
$row = "0";
	
/*
 * These are the constants that will determine the weighting of each value in the equation
 */

//rank 1 //cake topper
$rank_1_autonomous = 3;//3; //0 or 1
$rank_1_auto_tote_set = 2; // 0 or 1
$rank_1_auto_stack_tote_set = 2; // 0 or 1
$rank_1_auto_container_set = 2;//0; // 0 or 1
$rank_1_maneuver = 4;//4; //0-5
$rank_1_traverse_humps_score = 2;//2; //0-5
$rank_1_can_lift = 10;//10;	//0 or 1
$rank_1_can_score_step = 5;//5; // # per match max of 4 in reality
$rank_1_can_score_ground = 5;//5; // # per match max of 3 in reality
$rank_1_lift_totes_max = 2;//2; // max of 6
$rank_1_tote_feeder = 5;//5;  // # per match
$rank_1_tote_landfill = 3;//3; // # per match
$rank_1_knock_stacks = -2;//-2; // going to be low number 1 or 2
$rank_1_auto_can_grab = 4;//5; // max of 4
$rank_1_upstack = 3;//3; // 0 or 1
$rank_1_downstack = 3;//3; //0 or 1
$rank_1_weight = $rank_1_autonomous + $rank_1_auto_tote_set + $rank_1_auto_stack_tote_set + $rank_1_auto_container_set + $rank_1_maneuver + $rank_1_traverse_humps_score + $rank_1_can_lift + $rank_1_can_score_step + $rank_1_can_score_ground + $rank_1_lift_totes_max + $rank_1_tote_feeder + $rank_1_tote_landfill + $rank_1_knock_stacks + $rank_1_auto_can_grab + $rank_1_upstack + $rank_1_downstack;

//rank 2 // all rounder
$rank_2_autonomous = 4;
$rank_2_auto_tote_set = 3;
$rank_2_auto_stack_tote_set = 3;
$rank_2_auto_container_set = 0;
$rank_2_maneuver = 4;
$rank_2_traverse_humps_score = 2;
$rank_2_can_lift = 7;
$rank_2_can_score_step = 5;
$rank_2_can_score_ground = 5;
$rank_2_lift_totes_max = 6;
$rank_2_tote_feeder = 7;
$rank_2_tote_landfill = 7;
$rank_2_knock_stacks = -2;
$rank_2_auto_can_grab = 2;
$rank_2_upstack = 8;
$rank_2_downstack = 4;
$rank_2_weight = $rank_2_autonomous + $rank_2_auto_tote_set + $rank_2_auto_stack_tote_set + $rank_2_auto_container_set + $rank_2_maneuver + $rank_2_traverse_humps_score + $rank_2_can_lift + $rank_2_can_score_step + $rank_2_can_score_ground + $rank_2_lift_totes_max + $rank_2_tote_feeder + $rank_2_tote_landfill + $rank_2_knock_stacks + $rank_2_auto_can_grab + $rank_2_upstack + $rank_2_downstack;

//rank 3 // landfill toter
$rank_3_autonomous = 3;
$rank_3_auto_tote_set = 2;
$rank_3_auto_stack_tote_set = 2;
$rank_3_auto_container_set = 0;
$rank_3_maneuver = 4;
$rank_3_traverse_humps_score = 3;
$rank_3_can_lift = 5;
$rank_3_can_score_step = 6;
$rank_3_can_score_ground = 2;
$rank_3_lift_totes_max = 10;
$rank_3_tote_feeder = 3;
$rank_3_tote_landfill = 50;
$rank_3_knock_stacks = -2;
$rank_3_auto_can_grab = 3;
$rank_3_upstack = 7;
$rank_3_downstack = 4;
$rank_3_weight = $rank_3_autonomous + $rank_3_auto_tote_set + $rank_3_auto_stack_tote_set + $rank_3_auto_container_set + $rank_3_maneuver + $rank_3_traverse_humps_score + $rank_3_can_lift + $rank_3_can_score_step + $rank_3_can_score_ground + $rank_3_lift_totes_max + $rank_3_tote_feeder + $rank_3_tote_landfill + $rank_3_knock_stacks + $rank_3_auto_can_grab + $rank_3_upstack + $rank_3_downstack;

//rank 4 // feeder toter
$rank_4_autonomous = 2;//2
$rank_4_auto_stack_tote_set = 2;//2
$rank_4_auto_tote_stack = 2;//2
$rank_4_auto_container_set = 0;//0
$rank_4_maneuver = 3;//3
$rank_4_traverse_humps_score = 1;//1
$rank_4_can_lift = 5;//5
$rank_4_can_score_step = 2;//2
$rank_4_can_score_ground = 7;//7
$rank_4_lift_totes_max = 10;//10
$rank_4_tote_feeder = 50;//10
$rank_4_tote_landfill = 4;//4
$rank_4_knock_stacks = 2;//-2
$rank_4_auto_can_grab = 3;//3
$rank_4_upstack = 7;//7
$rank_4_downstack = 3;//3
$rank_4_weight = $rank_4_autonomous + $rank_4_auto_tote_set + $rank_4_auto_stack_tote_set + $rank_4_auto_container_set + $rank_4_maneuver + $rank_4_traverse_humps_score + $rank_4_can_lift + $rank_4_can_score_step + $rank_4_can_score_ground + $rank_4_lift_totes_max + $rank_4_tote_feeder + $rank_4_tote_landfill + $rank_4_knock_stacks + $rank_4_auto_can_grab + $rank_4_upstack + $rank_4_downstack;

//end of constants

	
function console($ctext)
{
	$time = time();
	$console = $time . " : " . $ctext . "\n";
	file_put_contents('console.txt',$console, FILE_APPEND);
}
	
	

// Create connection
//$con=mysqli_connect("mysql.hostinger.co.uk","u730988852_scout","scouting" , "u730988852_scout"); //website TODO
$con=mysqli_connect("localhost","scout","scouting" , "scout"); //local

// Check connection
if (mysqli_connect_errno())
  {
  console( "Failed to connect to MySQL: " . mysqli_connect_error());
  }
	
	if (!mysqli_connect_errno())
  {
  console( "Connection successful or something" . mysqli_connect_error());
  }

	



//handling of search results
foreach ($_POST as $key => $value)
{
	if (($key == 'search') || ($key == 'search2'))
	{
		if ($value == 'upload')
		{
			upload();
		} elseif ($value == 'rank')
		{
			rank();
		} elseif ($value == 'search')
		{
			searchf();
		}else
		{
			team($value);
		}
	}
	
}


function team($team)
{

//make sure that all of the team numbers are in the right format
$teamold = $team;
if (strlen($team) == 1)
{
$team = "000" . "$team" ;
}
if (strlen($team) == 2)
{
$team = "00" . "$team" ;
}
if (strlen($team) == 3)
{
$team = "0" . "$team" ;
}

/*
 * These are the constants that will determine the weighting of each value in the equation
 * These values are declared up above
 */

//rank 1 //cake topper
global $rank_1_autonomous;
global $rank_1_auto_tote_set;
global $rank_1_auto_stack_tote_set;
global $rank_1_auto_container_set;
global $rank_1_maneuver;
global $rank_1_traverse_humps_score;
global $rank_1_can_lift;
global $rank_1_can_score_step;
global $rank_1_can_score_ground;
global $rank_1_lift_totes_max;
global $rank_1_tote_feeder;
global $rank_1_tote_landfill;
global $rank_1_knock_stacks;
global $rank_1_auto_can_grab;
global $rank_1_upstack;
global $rank_1_downstack;
global $rank_1_weight;

//rank 2 // all rounder
global $rank_2_autonomous;
global $rank_2_auto_tote_set;
global $rank_2_auto_stack_tote_set;
global $rank_2_auto_container_set;
global $rank_2_maneuver;
global $rank_2_traverse_humps_score;
global $rank_2_can_lift;
global $rank_2_can_score_step;
global $rank_2_can_score_ground;
global $rank_2_lift_totes_max;
global $rank_2_tote_feeder;
global $rank_2_tote_landfill;
global $rank_2_knock_stacks;
global $rank_2_auto_can_grab;
global $rank_2_upstack;
global $rank_2_downstack;
global $rank_2_weight;

//rank 3 // landfill toter
global $rank_3_autonomous;
global $rank_3_auto_tote_set;
global $rank_3_auto_stack_tote_set;
global $rank_3_auto_container_set;
global $rank_3_maneuver;
global $rank_3_traverse_humps_score;
global $rank_3_can_lift;
global $rank_3_can_score_step;
global $rank_3_can_score_ground;
global $rank_3_lift_totes_max;
global $rank_3_tote_feeder;
global $rank_3_tote_landfill;
global $rank_3_knock_stacks;
global $rank_3_auto_can_grab;
global $rank_3_upstack;
global $rank_3_downstack;
global $rank_3_weight;

//rank 4 // all rounder
global $rank_4_autonomous;
global $rank_4_auto_tote_set;
global $rank_4_auto_stack_tote_set;
global $rank_4_auto_container_set;
global $rank_4_maneuver;
global $rank_4_traverse_humps_score;
global $rank_4_can_lift;
global $rank_4_can_score_step;
global $rank_4_can_score_ground;
global $rank_4_lift_totes_max;
global $rank_4_tote_feeder;
global $rank_4_tote_landfill;
global $rank_4_knock_stacks;
global $rank_4_auto_can_grab;
global $rank_4_upstack;
global $rank_4_downstack;
global $rank_4_weight;

//end of constants

//picture file format
$picture = "/upload/" . $team . ".jpg";

//I need to preform calculations for the rank in each catagory after i grab all of the data. I will not process johns


//todo
//comments
//$con=mysqli_connect("mysql.hostinger.co.uk","u730988852_scout","scouting" , "u730988852_scout"); //website TODO
$con=mysqli_connect("localhost","scout","scouting" , "scout"); //local  //TODO
  $result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='comments' and team='$team' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	$comments .= $row['value'] . "<br>";
	}

//auton
$result = mysqli_query($con, "SELECT AVG(value) FROM `scout` WHERE id='autonomous' and team='$team' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	$autonomous = $row['AVG(value)'] ;
	number_format((float)$autonomous, 2, '.', '');
	}
$autonomous = (number_format((float)$autonomous, 2, '.', '') * 100);
number_format((float)$autonomous, 2, '.', '');

//auton tote set
$auto_tote_set;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='auto_tote_set' and team='$team' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$auto_tote_set = $row['value'] ;
	if (($row['value'] == "on"))
		{
			$auto_tote_set_text = "Auto Tote Set" . "<br>";
			$auto_tote_set = 1;
		}
	
	}
	
	
	
//auton stack tote set
$auto_stack_tote_set;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='auto_stack_tote_set' and team='$team' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$auto_tote_set = $row['value'] ;
	if (($row['value'] == "on"))
		{
			$auto_stack_tote_set_text = "Auto Stacked Tote Set" . "<br>";
			$auto_stack_tote_set = 1;
		}
	
	}	

//auton container set
$auto_container_set;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='auto_container_set' and team='$team' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$auto_tote_set = $row['value'] ;
	if (($row['value'] == "on"))
		{
			$auto_container_set_text = "Auto Container Set" . "<br>";
			$auto_container_set = 1;
		}
	
	}



//maneuverability
$maneuverability;
$result = mysqli_query($con, "SELECT AVG(value) FROM `scout` WHERE id='maneuver' and team='$team' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	$maneuverability = $row['AVG(value)'] ;
	number_format((float)$maneuverability, 2, '.', '');
	}
$maneuverability = (number_format((float)$maneuverability, 2, '.', '') );
number_format((float)$maneuverability, 2, '.', '');

//traverse_humps_score
$traverse_humps_score;
$result = mysqli_query($con, "SELECT AVG(value) FROM `scout` WHERE id='traverse_humps_score' and team='$team' and value!='0' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	$traverse_humps_score = $row['AVG(value)'] ;
	number_format((float)$traverse_humps_score, 2, '.', '');
	}
$traverse_humps_score = (number_format((float)$traverse_humps_score, 2, '.', '') );
number_format((float)$traverse_humps_score, 2, '.', '');


//can_lift
$can_lift;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='can_lift' and team='$team' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$can_lift = $row['value'] ;
	if (($row['value'] == "1"))
		{
			$can_lift = "1";
		}
	
	}	



//can_score_step
$can_score_step = 0;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='can_score_step' and team='$team' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$can_score_step = $row['value'] ;
	$can_score_step = $can_score_step + $row['value'];
	
	}

//can_score_ground
$can_score_ground = 0;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='can_score_ground' and team='$team' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$can_score_ground = $row['value'] ;
	$can_score_ground = $can_score_ground + $row['value'];
	
	}


if ($can_score_step > $can_score_ground)
{
	$can_score_text = "Step";
	$can_lift = 1;
}elseif ($can_score_step < $can_score_ground)
{
	$can_score_text = "Ground";
	$can_lift = 1;
}elseif (($can_score_step && $can_score_ground) == 0) 
{
	$can_score_text = "None";
}else
{
	$can_score_text = "Step and Ground";
	$can_lift = 1;
}

if ($can_lift == 1)
{
$can_lift_text = "<span class=\"label label-success\"><i class=\"fa fa-check\"></i></span>";
} else
{
$can_lift_text = "<span class=\"label label-danger\"><i class=\"fa fa-times\"></i></span>";
}


//lift_totes_max
$lift_totes_max = 0;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='lift_totes_max' and team='$team' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$can_score_ground = $row['value'] ;
	if ($row['value'] >= $lift_totes_max)
	{
		$lift_totes_max = $row['value'];
	}
	
	
	}


//feeder
$feeder = 0;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='tote_feeder' and team='$team' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$feeder = $row['value'] ;
	$feeder = $feeder + $row['value'];
	
	}
//landfill
$landfill = 0;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='tote_landfill' and team='$team' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$landfill = $row['value'] ;
	$landfill = $landfill + $row['value'];
	
	}
//knock_stacks
$knock_stacks = 0;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='knock_stacks' and team='$team' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$knock_stacks = $row['value'] ;
	$knock_stacks = $knock_stacks + $row['value'];
	
	}

//auto_can_grab
$auto_can_grab;
$result = mysqli_query($con, "SELECT DISTINCT value FROM `scout` WHERE id='auto_can_grab' and team='$team' ");
	while($row = mysqli_fetch_assoc($result)) {
		//echo $row['value'];
		//$auto_can_grab = $row['value'] ;
		if ($row['value'] == 1)
		{
			$auto_can_grab_text .= ",1" ;
			$auto_can_grab = 1;
		}elseif ($row['value'] == 2)
		{
			$auto_can_grab_text .= ",2" ;
			$auto_can_grab = 2;
		}elseif ($row['value'] == 3)
		{
			$auto_can_grab_text .= ",3" ;
			$auto_can_grab = 3;
		}
	
	
	}
	
if ($auto_can_grab == "")
{
	$auto_can_grab = 0;
}


//upstack
$upstack;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='upstack' and team='$team' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$upstack = $row['value'] ;
	$upstack = $upstack + $row['value'];
	
	}

//downstack
$upstack;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='downstack' and team='$team' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$downstack = $row['value'] ;
	
		$downstack = $downstack + $row['value'];
		
	
	}
if (($upstack == $downstack) && ($upstack != 0))
{
	$stack = "Upstack and Downstack";
}elseif ($upstack > $downstack)
{
	$stack = "Upstack";
}elseif ($downstack > $upstack)
{
	$stack = "Downstack";
} else
{
	$stack = "None";
}

//matches
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='autonomous' and team='$team' ");
while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$auto_tote_set = $row['value'] ;
	$matches = $matches + 1;

}



//this is where I will make the calculations to rank each team

/*
 * Weighting Algorithems
 *
 */

//Rank 1 // Cake Topper
$rank_1 = ((($autonomous * $rank_1_autonomous / 200)+($auto_can_grab * $rank_1_auto_can_grab)+($auto_container_set * $rank_1_auto_container_set)+($auto_stack_tote_set * $rank_1_auto_stack_tote_set)+($auto_tote_set * $rank_auto_tote_set)+($can_lift * $rank_1_can_lift)+($can_score_ground * $rank_1_can_score_ground)+($can_score_step * $rank_1_can_score_step)+($downstack * $rank_1_downstack)+($knock_stacks * $rank_1_knock_stacks)+($lift_totes_max * $rank_1_lift_totes_max)+($maneuverability * $rank_1_maneuver)+($feeder * $rank_1_tote_feeder / $matches)+($landfill * $rank_1_tote_landfill / $matches)+($traverse_humps_score * $rank_1_traverse_humps_score)+($upstack * $rank_1_upstack))/($rank_1_weight));
$rank_1 = number_format((float)$rank_1, 2, '.', '');

//Rank 2 // All Rounder
$rank_2 = ((($autonomous * $rank_2_autonomous / 200)+($auto_can_grab * $rank_2_auto_can_grab)+($auto_container_set * $rank_2_auto_container_set)+($auto_stack_tote_set * $rank_2_auto_stack_tote_set)+($auto_tote_set * $rank_auto_tote_set)+($can_lift * $rank_2_can_lift)+($can_score_ground * $rank_2_can_score_ground)+($can_score_step * $rank_2_can_score_step)+($downstack * $rank_2_downstack)+($knock_stacks * $rank_2_knock_stacks)+($lift_totes_max * $rank_2_lift_totes_max)+($maneuverability * $rank_2_maneuver)+($feeder * $rank_2_tote_feeder / $matches)+($landfill * $rank_2_tote_landfill / $matches)+($traverse_humps_score * $rank_2_traverse_humps_score)+($upstack * $rank_2_upstack))/($rank_2_weight));
$rank_2 = number_format((float)$rank_2, 2, '.', '');

//Rank 3 // Landfill
$rank_3 = ((($autonomous * $rank_3_autonomous / 200)+($auto_can_grab * $rank_3_auto_can_grab)+($auto_container_set * $rank_3_auto_container_set)+($auto_stack_tote_set * $rank_3_auto_stack_tote_set)+($auto_tote_set * $rank_auto_tote_set)+($can_lift * $rank_3_can_lift)+($can_score_ground * $rank_3_can_score_ground)+($can_score_step * $rank_3_can_score_step)+($downstack * $rank_3_downstack)+($knock_stacks * $rank_3_knock_stacks)+($lift_totes_max * $rank_3_lift_totes_max)+($maneuverability * $rank_3_maneuver)+($feeder * $rank_3_tote_feeder / $matches)+($landfill * $rank_3_tote_landfill / $matches)+($traverse_humps_score * $rank_3_traverse_humps_score)+($upstack * $rank_3_upstack))/($rank_3_weight));
$rank_3 = number_format((float)$rank_3, 2, '.', '');

//Rank 4 // Feeder
$rank_4 = ((($autonomous * $rank_4_autonomous / 200)+($auto_can_grab * $rank_4_auto_can_grab)+($auto_container_set * $rank_4_auto_container_set)+($auto_stack_tote_set * $rank_4_auto_stack_tote_set)+($auto_tote_set * $rank_auto_tote_set)	+($can_lift * $rank_4_can_lift)+($can_score_ground * $rank_4_can_score_ground)+($can_score_step * $rank_4_can_score_step)+($downstack * $rank_4_downstack)+($knock_stacks * $rank_4_knock_stacks)+($lift_totes_max * $rank_4_lift_totes_max)+($maneuverability * $rank_4_maneuver)+($feeder * $rank_4_tote_feeder / $matches)+($landfill * $rank_4_tote_landfill / $matches)+($traverse_humps_score * $rank_4_traverse_humps_score)+($upstack * $rank_4_upstack))/($rank_4_weight));
$rank_4 = number_format((float)$rank_4, 2, '.', '');



echo"
<center>
<h2> $team </h2>
</center>

<center>
<div class=\"jumbotron\" style=\"width:80%;\">

<center>
<table style=\"width:60%;\">
	<tr>
		<td style=\"width:25%;\">
			<center>
				<h3>
					Cake Topper
				</h3>
			</center
		</td>
		<td style=\"width:25%;\">
			<center>
				<h3>
					All Rounder
				</h3>
			</center
		</td>
		<td style=\"width:25%;\">
			<center>
				<h3>
					Landfill
				</h3>
			</center
		</td>
		<td style=\"width:25%;\">
			<center>
				<h3>
					Feeder
				</h3>
			</center
		</td>
	</tr>
	<tr>
		<td>
			<center>
				$rank_1
			</center
		</td>
		<td>
			<center>
				$rank_2
			</center
		</td>
		<td>
			<center>
				$rank_3
			</center
		</td>
		<td>
			<center>
				$rank_4
			</center
		</td>
	</tr>
</table>
</center>
</div>



<table style=\"width: 80%; border: 1px ;\">
	<tr>
		<td style=\"width: 38%;\">
			<center>
				<div class=\"panel panel-primary\" style=\"display: block;\" id=\"window_1\">
					<div class=\"panel-heading\">
						<table  style=\"width: 100%;\">
							<tr>
								<td style=\"width: 100%;\" >
									<font style=\"font-size:20px; color: white;\">Autonomous</font>
								</td>
								
							</tr>
						</table>
					</div>
					<div class=\"panel-body\" id=\"window_1_field\">
						<center>
							<table style=\"width: 100%;\">    					
								
								<tr>
									<td style=\"width: 100%;\">
										<div id=\"window_1_body\">
											<div id=\"window_1_body\">
												<center>
													<h4> They have an autonomous <strong> $autonomous % </strong> of the time.</h4>
													
													<h4>In autonomous they:</h4>
													<center>
														$auto_tote_set_text
														$auto_stack_tote_set_text
														$auto_container_set_text
													<hr>
													<h4>They can grab<strong> $auto_can_grab_text </strong> cans from the step</h4>
													</center>
												</center>
											</div>
										</div>
									</td>
								</tr>
							</table>
						</center>
					</div>
				</div>
			</center>
		</td>
		<td style=\"width: 4%\">
		</td>
		<td style=\"width: 38%;\">
			<center>
				<div class=\"panel panel-primary\" style=\"display: block;\" id=\"window_2\">
					<div class=\"panel-heading\">
						<table  style=\"width: 100%;\">
							<tr>
								<td style=\"width: 100%;\" >
									<font style=\"font-size:20px; color: white;\">Maneuverability</font>
								</td>
								
							</tr>
						</table>
					</div>
					<div class=\"panel-body\" id=\"window_2_field\">
						<center>
							<table style=\"width: 100%;\">    					
								
								<tr>
									<td style=\"width: 100%;\">
										<div id=\"window_2_body\">
											<div id=\"window_2_body\">
												<center>
													<h4>In maneuverability they score an average of:</h4> 
													<h4><strong>$maneuverability</strong> stars out of 5.</h4>
													<hr>
													<h4>For robot stability they score:</h4>
													<h4> <strong> $traverse_humps_score </strong> stars out of 5</h4>
													
													
												<center>
												
											</div>
										</div>
									</td>
								</tr>
							</table>
						</center>
					</div>
				</div>
			</center>
		</td>
	</tr>
	<tr>
		<td style=\"width: 38%;\">
			<center>
				<div class=\"panel panel-primary\" style=\"display: block;\" id=\"window_3\">
					<div class=\"panel-heading\">
						<table  style=\"width: 100%;\">
							<tr>
								<td style=\"width: 100%;\" >
									<font style=\"font-size:20px; color: white;\">Cans</font>
								</td>
								
							</tr>
						</table>
					</div>
					<div class=\"panel-body\" id=\"window_3_field\">
						<center>
							<table style=\"width: 100%;\">    					
								
								<tr>
									<td style=\"width: 100%;\">
										<div id=\"window_3_body\">
											<div id=\"window_3_body\">
												<center>
													<h4>Score cans:  $can_lift_text </h4>
													<hr>
													<h4> They get most of their cans from the:<strong> $can_score_text </strong> </h4>
												</center>
											</div>
										</div>
									</td>
								</tr>
							</table>
						</center>
					</div>
				</div>
			</center>
		</td>
		<td style=\"width: 4%\">
		</td>
		<td style=\"width: 38%;\">
			<center>
				<div class=\"panel panel-primary\" style=\"display: block;\" id=\"window_4\">
					<div class=\"panel-heading\">
						<table  style=\"width: 100%;\">
							<tr>
								<td style=\"width: 100%;\" >
									<font style=\"font-size:20px; color: white;\">Totes</font>
								</td>
								
							</tr>
						</table>
					</div>
					<div class=\"panel-body\" id=\"window_4_field\">
						<center>
							<table style=\"width: 100%;\">    					
								
								<tr>
									<td style=\"width: 100%;\">
										<div id=\"window_4_body\">
											<div id=\"window_2_body\">
												<center>
													<h4> They can carry<strong> $lift_totes_max totes</strong> at once</h4>
													<hr>
													<h4> They have knocked over<strong> $knock_stacks stacks</strong></h4>
													<hr>
													<h4>They get their totes from:</h4>
													
													<table style=\"width:100%\">
														<tr>
															<td style=\"width:50%\">
																<center>
																	<span style=\"font-size: 20px\">
																		Feeder
																	</span>
																</center>
															</td>
															<td>
																<center>
																	<span style=\"font-size: 20px\">
																		Landfill
																	</span>
																</center>
															</td>
														</tr>
														<tr>
															<td style=\"width:50%\">
																<center>
																	<span style=\"font-size: 20px\">
																		<strong> $feeder </strong>
																	</span>
																</center>
															</td>
															<td>
																<center>
																	<span style=\"font-size: 20px\">
																		<strong> $landfill </strong>
																	</span>
																</center>
															</td>
														</tr>
													</table>
													<hr>
													<h4>To pick up totes they primarily:</h4>
													<h4><strong> $stack </strong></h4>
													
												</center>
											</div>
										</div>
									</td>
								</tr>
							</table>
						</center>
					</div>
				</div>
			</center>
		</td>
	</tr>
	<tr>
		<td style=\"width: 100%;\" colspan=\"3\">
			<center>
				<div class=\"panel panel-primary\" style=\"display: block;\" id=\"window_5\">
					<div class=\"panel-heading\">
						<table  style=\"width: 100%;\">
							<tr>
								<td style=\"width: 100%;\" >
									<font style=\"font-size:20px; color: white;\">Comments</font>
								</td>
								
							</tr>
						</table>
					</div>
					<div class=\"panel-body\" id=\"window_5_field\">
						<center>
							<table style=\"width: 100%;\">    					
								
								<tr>
									<td style=\"width: 100%;\">
										<div id=\"window_5_body\">
											<div id=\"window_5_body\">
												$comments
												
											</div>
										</div>
									</td>
								</tr>
							</table>
						</center>
					</div>
				</div>
			</center>
		</td>
	</tr>
</table>

<hr>
<h2> Pit Scouting </h2>

<br>
<hr>
<h2> Picture </h2>
<img src=\"$picture\">
<hr>
<br>
<br>
</center>
";

//I should include the pictures here after johns stuff



}

function rank()
{
	// I will process the data every time this function is called
	//I will make this a sortable table so that teams can be ranked by each subcat
$matches;
	
	/* 
	 * These are the constants that will determine the weighting of each value in the equation
	 * These values are declared up above
	 */
	
	//rank 1 //cake topper
	global $rank_1_autonomous;
	global $rank_1_auto_tote_set;
	global $rank_1_auto_stack_tote_set;
	global $rank_1_auto_container_set;
	global $rank_1_maneuver;
	global $rank_1_traverse_humps_score;
	global $rank_1_can_lift;
	global $rank_1_can_score_step;
	global $rank_1_can_score_ground;
	global $rank_1_lift_totes_max;
	global $rank_1_tote_feeder;
	global $rank_1_tote_landfill;
	global $rank_1_knock_stacks;
	global $rank_1_auto_can_grab;
	global $rank_1_upstack;
	global $rank_1_downstack;
	global $rank_1_weight;
	
	//rank 2 // all rounder
	global $rank_2_autonomous;
	global $rank_2_auto_tote_set;
	global $rank_2_auto_stack_tote_set;
	global $rank_2_auto_container_set;
	global $rank_2_maneuver;
	global $rank_2_traverse_humps_score;
	global $rank_2_can_lift;
	global $rank_2_can_score_step;
	global $rank_2_can_score_ground;
	global $rank_2_lift_totes_max;
	global $rank_2_tote_feeder;
	global $rank_2_tote_landfill;
	global $rank_2_knock_stacks;
	global $rank_2_auto_can_grab;
	global $rank_2_upstack;
	global $rank_2_downstack;
	global $rank_2_weight;
	
	//rank 3 // landfill toter
	global $rank_3_autonomous;
	global $rank_3_auto_tote_set;
	global $rank_3_auto_stack_tote_set;
	global $rank_3_auto_container_set;
	global $rank_3_maneuver;
	global $rank_3_traverse_humps_score;
	global $rank_3_can_lift;
	global $rank_3_can_score_step;
	global $rank_3_can_score_ground;
	global $rank_3_lift_totes_max;
	global $rank_3_tote_feeder;
	global $rank_3_tote_landfill;
	global $rank_3_knock_stacks;
	global $rank_3_auto_can_grab;
	global $rank_3_upstack;
	global $rank_3_downstack;
	global $rank_3_weight;
	
	//rank 4 // all rounder
	global $rank_4_autonomous;
	global $rank_4_auto_tote_set;
	global $rank_4_auto_stack_tote_set;
	global $rank_4_auto_container_set;
	global $rank_4_maneuver;
	global $rank_4_traverse_humps_score;
	global $rank_4_can_lift;
	global $rank_4_can_score_step;
	global $rank_4_can_score_ground;
	global $rank_4_lift_totes_max;
	global $rank_4_tote_feeder;
	global $rank_4_tote_landfill;
	global $rank_4_knock_stacks;
	global $rank_4_auto_can_grab;
	global $rank_4_upstack;
	global $rank_4_downstack;
	global $rank_4_weight;
	
	//end of constants
	
	
	//grab the list of teams first
	
	//$con=mysqli_connect("mysql.hostinger.co.uk","u730988852_scout","scouting" , "u730988852_scout"); //website TODO
	$con=mysqli_connect("localhost","scout","scouting" , "scout"); //local //TODO
	$result = mysqli_query($con, "SELECT DISTINCT `team` FROM `scout` WHERE 1");
	while($row = mysqli_fetch_assoc($result)) 
	{
		$team1 = $row['team'] ;
		$teams[] = $team1;
		//echo $team1;
	}
	
	
	//print_r($teams);
	
	


echo "<script src=\"sorttable.js\"></script>
	<center>
		<table class=\"table table-hover sortable\" style=\"width: 50%;\">
			<tr>
				<th>
					Team
				</th>
				<th>
					Cake Topper
				</th>
				<th>
					All Rounder
				</th>
				<tH>
					Landfill
				</th>
				<th>
					Feeder
				</th>
				<th>
					Matches Played
				</th>
			</tr>
			
			
			";
//this will parse the data
foreach($teams as $value)
{
	
	//zero out incremental variables
	$matches = 0;
	$can_score_step = 0;
	$can_score_ground = 0;
	$lift_totes_max = 0;
	$feeder = 0;
	$landfill = 0;
	$knock_stacks = 0;
	$upstack = 0;
	$downstack = 0;
	$auto_stack_tote_set = 0;
	

	//matches 
	$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='autonomous' and team='$value' ");
	while($row = mysqli_fetch_assoc($result)) {
		//echo $row['value'];
		//$auto_tote_set = $row['value'] ;
		$matches = $matches + 1;
	
	}
		
	
	
//auton
$result = mysqli_query($con, "SELECT AVG(value) FROM `scout` WHERE id='autonomous' and team='$value' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	$autonomous = $row['AVG(value)'] ;
	number_format((float)$autonomous, 2, '.', '');
	}
$autonomous = (number_format((float)$autonomous, 2, '.', '') /2);
number_format((float)$autonomous, 2, '.', '');

//auton tote set //Will probably need to change this.
$auto_tote_set;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='auto_tote_set' and team='$value' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$auto_tote_set = $row['value'] ;
	if (($row['value'] == "on"))
		{
			$auto_tote_set = "1";
		}
	
	}
	
	
	
//auton stack tote set //Will probably need to change this.

$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='auto_stack_tote_set' and team='$value' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$auto_tote_set = $row['value'] ;
	if (($row['value'] == "on"))
		{
			$auto_stack_tote_set = "1";
		}
	
	}	
	//echo $auto_stack_tote_set;
	
//auton container set //Will probably need to change this.
$auto_container_set;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='auto_container_set' and team='$value' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$auto_tote_set = $row['value'] ;
	if (($row['value'] == "on"))
		{
			$auto_container_set = "1";
		}
	
	}



//maneuverability
$maneuverability;
$result = mysqli_query($con, "SELECT AVG(value) FROM `scout` WHERE id='maneuver' and team='$value' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	$maneuverability = $row['AVG(value)'] ;
	number_format((float)$maneuverability, 2, '.', '');
	}
$maneuverability = (number_format((float)$maneuverability, 2, '.', '') );
number_format((float)$maneuverability, 2, '.', '');

//traverse_humps_score
$traverse_humps_score;
$result = mysqli_query($con, "SELECT AVG(value) FROM `scout` WHERE id='traverse_humps_score' and team='$value' and value!='0' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	$traverse_humps_score = $row['AVG(value)'] ;
	number_format((float)$traverse_humps_score, 2, '.', '');
	}
$traverse_humps_score = (number_format((float)$traverse_humps_score, 2, '.', '') );
number_format((float)$traverse_humps_score, 2, '.', '');


//can_lift
$can_lift;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='can_lift' and team='$value' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$can_lift = $row['value'] ;
	if (($row['value'] == "1"))
		{
			$can_lift = "1";
		}
	
	}	



//can_score_step
$can_score_step = 0;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='can_score_step' and team='$value' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$can_score_step = $row['value'] ;
	$can_score_step = $can_score_step + $row['value'];
	
	}

//can_score_ground
$can_score_ground = 0;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='can_score_ground' and team='$value' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$can_score_ground = $row['value'] ;
	$can_score_ground = $can_score_ground + $row['value'];
	
	}


if (($can_score_ground > 0) || ($can_score_step > 0))
{
	$can_lift = 1;
}




//lift_totes_max
$lift_totes_max = 0;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='lift_totes_max' and team='$value' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$can_score_ground = $row['value'] ;
	if ($row['value'] >= $lift_totes_max)
	{
		$lift_totes_max = $row['value'];
	}
	
	
	}


//feeder
$feeder = 0;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='tote_feeder' and team='$value' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$feeder = $row['value'] ;
	$feeder = $feeder + $row['value'];
	
	}
	//echo $feeder; 
	
//landfill
$landfill = 0;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='tote_landfill' and team='$value' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$landfill = $row['value'] ;
	$landfill = $landfill + $row['value'];
	
	}
//knock_stacks
$knock_stacks = 0;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='knock_stacks' and team='$value' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$knock_stacks = $row['value'] ;
	$knock_stacks = $knock_stacks + $row['value'];
	
	}

//auto_can_grab
$auto_can_grab;
$result = mysqli_query($con, "SELECT DISTINCT value FROM `scout` WHERE id='auto_can_grab' and team='$value' ");
	while($row = mysqli_fetch_assoc($result)) {
		//echo $row['value'];
		//$auto_can_grab = $row['value'] ;
		if ($row['value'] == 1)
		{
			$auto_can_grab .= ",1" ;
		}elseif ($row['value'] == 2)
		{
			$auto_can_grab .= ",2" ;
		}elseif ($row['value'] == 3)
		{
			$auto_can_grab .= ",3" ;
		}
	
	
	}
	
if ($auto_can_grab == "")
{
	$auto_can_grab = 0;
}


//upstack
$upstack;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='upstack' and team='$value' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$upstack = $row['value'] ;
	$upstack = $upstack + $row['value'];
	
	}

//downstack
$upstack;
$result = mysqli_query($con, "SELECT value FROM `scout` WHERE id='downstack' and team='$value' ");
	while($row = mysqli_fetch_assoc($result)) {
	//echo $row['value'];
	//$downstack = $row['value'] ;
	
		$downstack = $downstack + $row['value'];
	} 


	/*
	 * Weighting Algorithems
	 *
	 */
	
	//Rank 1 // Cake Topper
	$rank_1 = ((($autonomous * $rank_1_autonomous)+($auto_can_grab * $rank_1_auto_can_grab)+($auto_container_set * $rank_1_auto_container_set)+($auto_stack_tote_set * $rank_1_auto_stack_tote_set)+($auto_tote_set * $rank_auto_tote_set)+($can_lift * $rank_1_can_lift)+($can_score_ground * $rank_1_can_score_ground)+($can_score_step * $rank_1_can_score_step)+($downstack * $rank_1_downstack)+($knock_stacks * $rank_1_knock_stacks)+($lift_totes_max * $rank_1_lift_totes_max)+($maneuverability * $rank_1_maneuver)+($feeder * $rank_1_tote_feeder / $matches)+($landfill * $rank_1_tote_landfill / $matches)+($traverse_humps_score * $rank_1_traverse_humps_score)+($upstack * $rank_1_upstack))/($rank_1_weight));
	$rank_1 = number_format((float)$rank_1, 2, '.', '');
	
	//Rank 2 // All Rounder
	$rank_2 = ((($autonomous * $rank_2_autonomous)+($auto_can_grab * $rank_2_auto_can_grab)+($auto_container_set * $rank_2_auto_container_set)+($auto_stack_tote_set * $rank_2_auto_stack_tote_set)+($auto_tote_set * $rank_auto_tote_set)+($can_lift * $rank_2_can_lift)+($can_score_ground * $rank_2_can_score_ground)+($can_score_step * $rank_2_can_score_step)+($downstack * $rank_2_downstack)+($knock_stacks * $rank_2_knock_stacks)+($lift_totes_max * $rank_2_lift_totes_max)+($maneuverability * $rank_2_maneuver)+($feeder * $rank_2_tote_feeder / $matches)+($landfill * $rank_2_tote_landfill / $matches)+($traverse_humps_score * $rank_2_traverse_humps_score)+($upstack * $rank_2_upstack))/($rank_2_weight));
	$rank_2 = number_format((float)$rank_2, 2, '.', '');
	
	//Rank 3 // Landfill
	$rank_3 = ((($autonomous * $rank_3_autonomous)+($auto_can_grab * $rank_3_auto_can_grab)+($auto_container_set * $rank_3_auto_container_set)+($auto_stack_tote_set * $rank_3_auto_stack_tote_set)+($auto_tote_set * $rank_auto_tote_set)+($can_lift * $rank_3_can_lift)+($can_score_ground * $rank_3_can_score_ground)+($can_score_step * $rank_3_can_score_step)+($downstack * $rank_3_downstack)+($knock_stacks * $rank_3_knock_stacks)+($lift_totes_max * $rank_3_lift_totes_max)+($maneuverability * $rank_3_maneuver)+($feeder * $rank_3_tote_feeder / $matches)+($landfill * $rank_3_tote_landfill / $matches)+($traverse_humps_score * $rank_3_traverse_humps_score)+($upstack * $rank_3_upstack))/($rank_3_weight));
	$rank_3 = number_format((float)$rank_3, 2, '.', '');
	
	//Rank 4 // Feeder
	$rank_4 = ((($autonomous * $rank_4_autonomous)+($auto_can_grab * $rank_4_auto_can_grab)+($auto_container_set * $rank_4_auto_container_set)+($auto_stack_tote_set * $rank_4_auto_stack_tote_set)+($auto_tote_set * $rank_auto_tote_set)+($can_lift * $rank_4_can_lift)+($can_score_ground * $rank_4_can_score_ground)+($can_score_step * $rank_4_can_score_step)+($downstack * $rank_4_downstack)+($knock_stacks * $rank_4_knock_stacks)+($lift_totes_max * $rank_4_lift_totes_max)+($maneuverability * $rank_4_maneuver)+($feeder * $rank_4_tote_feeder / $matches)+($landfill * $rank_4_tote_landfill / $matches)+($traverse_humps_score * $rank_4_traverse_humps_score)+($upstack * $rank_4_upstack))/($rank_4_weight));
	$rank_4 = number_format((float)$rank_4, 2, '.', '');
	
	
	
	
	
	//print the results
	echo "
	
	<tr>
		<td>
			$value
		</td>
		<td>
			$rank_1
		</td>
		<td>
			$rank_2
		</td>
		<td>
			$rank_3
		</td>
		<td>
			$rank_4
		</td>
		<td>
			$matches
		</td>
	</tr>
	";
	
	
	

	
//this is where I will do the calculations and the inserts/replacements

}// end of foreach

echo "
			
		</table>		
	</center>	
				";













	
}





function upload()
{
echo "
<center>
<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype=\"multipart/form-data\" action=\"upload.php\" method=\"POST\">

    <!-- Name of input element determines name in \$_FILES array -->
    Send this file: <input name=\"userfile\" type=\"file\" />
    <input type=\"submit\" class=\"btn btn-primary btn-sm\" value=\"Send File\" />
</form>
</center>

";
}


function searchf()
{
	echo"
	<form method=\"post\" action=\"view.php\" id=\"searchform\"> 
		<center>
		<input type=\"search\" class=\"form-control\" placeholder=\"Search\" name=\"search\" id=\"search2\" style=\"width: 40%;\">
		</center>
	</form>
	
	
	";
	
}







?>

		

<center>
	<a href="#" onclick="search2()" class="btn btn-primary btn-sm">Search</a>
	<a href="#" onclick="rank()" class="btn btn-primary btn-sm">Rank</a>
	<a href="index.html" class="btn btn-primary btn-sm">Match</a>
	<a href="#" onclick="upload2()" class="btn btn-primary btn-sm">Upload</a>
</center>

<br><br>

<script>
function search2()
{
	document.getElementById("search").value = 'search';
	document.forms["searchform"].submit();
}

function upload2()
{
	document.getElementById("search").value = 'upload';
	document.forms["searchform"].submit();
}

</script>

</body>
</html>
