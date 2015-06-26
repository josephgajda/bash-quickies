<?php
//CRON - This script is scheduled to run through CRON

/**********************************************************
File: date.php
Modified:  JG
Last Modified: 12.19.2005
***********************************************************
Comments:
Modified to allow register_globals to be turned off.
**********************************************************/


include("instructions.php");

$today = date("Ymd"); 


//set up the times

$date1 = "$_GET[monthone]/$_GET[dayone]/$_GET[yearone]";
$date2 = "$_GET[monthtwo]/$_GET[daytwo]/$_GET[yeartwo]";

$time1 = strtotime($date1) + 43200;
$time2 = strtotime($date2);


$days = days_between($time1, $time2);

$dates = out_of_time($time1, $time2, $instructions, $bedTime, $ampm);
pres_date(one,date("j"),date("n"),date("Y"));


pres_date(two,"","",date("Y"));
		

	for($i=0;$i<sizeof($instructions);$i++)  {
		$j=$i+1; 
		$datum = date("Ymd", strtotime($dates[$i]));
	}

 
for($i=0;$i<sizeof($instructions);$i++) {

	$j=$i+1; //hacked in because someone forgot the zero item in the array...

	//description
	$datum = date("Ymd", strtotime($dates[$i]));
	
	//what should be done
		for($j=0; $j<sizeof($instructions[$i][2]); $j++){
		}

}



set_time_limit(0);
ignore_user_abort(1);
mailme($today, $instructions);

?>











