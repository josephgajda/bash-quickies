<?php
/**********************************************************
 Copyright (C) The Regents of the University of Minnesota

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License
 version 2 as published by the Free Software Foundation.
   
 This program is distributed in the hope that it will be useful,  
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License in COPYRIGHT for more details.



File: instructions.php
Original Author: John Hickey (a former student worker)
Modified:  Shane Nackerud snackeru@tc.umn.edu
Last Modified: 09.04.2003
***********************************************************
Comments:
This is the main file of steps for the Assignment Calculator.
The steps are located in a big array called $instructions[].
The decimal point in the array describes the amount of time 
each step should take.  Make sure that your numbers equal 1
(one), or in other words make sure it equals 100% of the time.

The file also contains various functions necessary for the AC.
**********************************************************/


//main array.  Each element has three parts.  A decimal that 
//represents fraction of total time, a description, and an 
//array of tips

$instructions = Array(

//Step 1
Array(.03, 
  "Understand your assignment",
   Array("<a href='http://www.unc.edu/depts/wcweb/handouts/readassign.html'>Suggestions for understanding assignment sheets</a>")
),

//Step 2 
Array(.04,
  "Select and focus topic",
  Array("<a href='http://www.owc.umn.edu/Starting_a_Writing_Project.html?Type=B_BASIC&SEC={D1A26BA2-4E5B-459A-84AE-858147E65062}'>How to begin</a>",
  "<a href='http://www.lib.wayne.edu/services/instruction_tutorials/searchpath/mod2/01-curious.html'>Searchpath: Choosing and Narrowing a Topic</a>",)
),

//Step 3
Array(.01,
  "Write working thesis",
  Array("<a href='http://owl.english.purdue.edu/workshops/hypertext/ResearchW/thesis.html'>Definition: Thesis Statements and Research Questions</a>",
  "<a href='http://www.gmu.edu/departments/writingcenter/handouts/g_b_thes.html'>Sample thesis statements</a>")
),

//Step 4
Array(.03,
  "Design research strategy",
    Array("<a href='http://tutorial.lib.umn.edu/infomachine.asp?moduleID=13'>QuickStudy: Designing a research strategy</a>",
	"<a href='http://www.lib.wayne.edu/help/index.php'>Ask a Librarian for help developing a strategy</a>")
),

//Step 5
Array(.10,
  "Find, review, and evaluate books",
  Array("Keep careful notes, with source clearly indicated",
  "<a href='http://elibrary.wayne.edu/'>Search the library's catalog</a>",
  "<a href='http://www.lib.wayne.edu/services/instruction_tutorials/searchpath/mod3/01-whereWestCat.html'>Searchpath: Using the Catalog</a>")
),

//Step 6
Array(.25,
  "Find, review, and evaluate journal/magazine/newspaper articles",
  Array("Keep careful notes, with source clearly indicated",
  "<a href='http://www.lib.wayne.edu/services/instruction_tutorials/searchpath/mod4/index.html'>Searchpath: Finding Articles</a>",
  "<a href='http://www.lib.wayne.edu/resources/articles_databases/index.php'>Look up articles in an appropriate index</a>",
  "<a href='http://www.lib.wayne.edu/resources/subject_guides/index.php'>Recommended Subject Resources</a>")
),

//Step 7
Array(.06,
  "Find, review, and evaluate web sites",
  Array("Do some general web searching - not Library-related",
  "Keep careful notes, with source clearly indicated",
  "<a href='http://www.lib.wayne.edu/services/instruction_tutorials/searchpath/mod5/01-about-web.html'>Searchpath: Using the Web</a>",
  "<a href='http://www.lib.wayne.edu/resources/subject_guides/index.php'>Recommended Subject Resources</a>")
),

//Step 8
Array(.02,
  "Outline or describe overall structure",
  Array("<a href='http://www.owc.umn.edu/index.asp?Type=B_BASIC&SEC={D1A26BA2-4E5B-459A-84AE-858147E65062} '>Starting a Writing Project</a>",
  "<a href='http://owl.english.purdue.edu/owl/resource/544/01'>Help with planning your structure</a>"
  )
),

//Step 9
Array(.10,
  "Write 1st draft",
  Array("<a href='http://www.owc.umn.edu/index.asp?Type=B_BASIC&SEC={2042BDE7-4B50-4224-AC93-DF7BAD5D6C21}'>Writing Your First Draft</a>",
  "<a href='http://www.english.wayne.edu/writing'>Writing Center at WSU</a>",
  "<a href='http://www.lib.wayne.edu/services/labs/index.php'>Need a computer?</a>")
),

//Step 10
Array(.10,
  "Conduct additional research as necessary",
  Array("<a href='http://www.lib.wayne.edu/services/instruction_tutorials/searchpath/mod1/02_sources.html'>Searchpath: Types of Sources</a>",
  "<a href='http://www.lib.wayne.edu/help/index.php'>Stuck? Ask a Librarian for an appointment</a>")
),

//Step 11
Array(.20,
  "Revise & rewrite",
  Array("<a href='http://www.owc.umn.edu/index.asp?Type=B_BASIC&SEC={82C9A26A-05F5-49C5-BFF4-EBE77E1D6D2E} '>Revising Your Work</a>",
  "<a href='http://www.english.wayne.edu/writing/services.htm'>Get Help at the Writing Center at WSU</a>"),
),

//Step 12
Array(.06,
  "Put paper in final form",
  Array("<a href='http://www.lib.wayne.edu/services/instruction_tutorials/searchpath/mod6/index.html'>Searchpath: Citing Sources</a>",
  "<a href='http://www.bartleby.com/141/'>The Elements of Style – William Strunk, Jr.</a>",
  "<a href='http://www.lib.wayne.edu/shiffman/tutorials/endnote/index.html'>Getting Started with EndNote - a Tutorial</a>",
  "Download MLA and APA Quick Guides (PDF)",
  "<a href='http://www.noodletools.com/login.php'>Noodlebib Express:</a> A Web-based citation helper ")
)
);


/**********************************************************
Function: days_between
Author: John Hickey
Last Modified: 2001
***********************************************************
Purpose:
Generates the number of days between two dates
**********************************************************/ 
function days_between($time1, $time2) {

	$time =  $time2 - $time1;
	return ($time/86400);

}


/**********************************************************
Function: out_of_time
Author: John Hickey
Last Modified: 2001
***********************************************************
Purpose:
Breaks up the steps into the times designated by the decimals
in the $instructions array
**********************************************************/ 
function out_of_time($time1, $time2, $instructions_array, $bedTime, $ampm) {

	$time= abs($time1-$time2);
	//depending on the number of day and the number of divisons, we choose different date formats.

		if(days_between($time1, $time2)>sizeof($div_array)) {
		
			$format="D M d, Y";
			$stages = $time1; //keep the running total.


			for($i=0;$i<sizeof($instructions_array);$i++) {

				$stages += ($time * $instructions_array[$i][0]);	
				$dates[$i] = date($format, $stages);
			}
		} else {	
	
		$format="g a D M d";

		$stages = $time1; //keep the running total.

			for($i=0;$i<sizeof($instructions_array);$i++) {
				$stages += ($time * $instructions_array[$i][0]);
				$hour24 = date("G", $stages);
				if ($hour24 > 12) $hour24 = $hour24-24; //this keeps the time centered around midnight. 2 is 2 am and -2 is 10pm
					if( ($ampm==am && $hour24 > $bedTime && $hour24 < $bedTime + 10) or ($ampm==pm && $hour24 > $bedTime-12 && $hour24 < $bedTime-2)){//if the time is later than a person wants to get to sleap
					$dates[$i] = "$bedTime $ampm " . date("D M d", $stages);
					} else {
					$dates[$i] = date($format, $stages);
					}
		        }

		}

return $dates;

}

/**********************************************************
Function: pres_date
Author: John Hickey
Last Modified: 2001
***********************************************************
Purpose:
Generates the form for Start Date and Due Date information
**********************************************************/ 
function pres_date($number = "", $myDay = "", $myMon = "", $myYear = "") {
	
	print "<input type= \"text\" name=\"month$number\" size=\"2\" maxlength=\"2\" value=$myMon> - \n";
	print "<input type= \"text\" name=\"day$number\" size=\"2\" maxlength=\"2\" value=$myDay> - \n";
	print "<input type= \"text\" name=year$number size=\"4\" maxlength=\"4\" value=$myYear>\n";

}

/*********************************************************
Function: missconn_db
Author: wsuls
Last Modified: 05/30/06
**********************************************************
Purpose:
After check for connect and failure occurs mail error
 to DBA for action.
*********************************************************/
function missconn_db() {

mail('aa0344@wayne.edu','error database connect assignCalc','mail from lib1',"From lib1");
die ("ERROR: Could not connect to the database server.");
}

/*********************************************************
Function:  connect_db
Author: Shane Nackerud
Last Modified: 2004
**********************************************************
Purpose:
Connect to the database for the email reminder functionality
You must alter this function to include the parameters for
your database!
*********************************************************/
function connect_db() {

	// Database connection parameters
$db_server 	= "cgi.lib.wayne.edu";
$db_user 	= "asscalc";
$db_password 	= 'AssClowN';
$db_name 	= "general";

// Establish a connection to the database server or bail out.
$db_link = @mysql_connect ($db_server, $db_user, $db_password)
or missconn_db();

// Switch to the selected database name or bail out.
$db_switch = @mysql_select_db ($db_name, $db_link )
or missconn_db();

}

/*********************************************************
Function:  mailme
Author:  Shane Nackerud
Last Modified: 2004
**********************************************************
Purpose:
Sends out the emails that need to be sent out.  I know for 
a fact that this could be written better and more efficiently.  
But this will have to do for now!
**********************************************************/

function mailme ($date, $instructions) {

	connect_db();

	$sql = "select * from calc_mail where datum <= $date order by step asc";

	$result = mysql_query($sql);

	$rows = mysql_num_rows($result);

	if ($rows > 0) {

		while ($row=mysql_fetch_array($result)) {

			$step = $row[step] - 1;
			$stepp = $row[step];
			$mailTo =  "$row[email]";
			$mailSub = "Assignment Calculator reminder:  Step $row[step] should be done!";

			$date = date("F j, Y", strtotime($row[datum]));

			$mailBody = "This is the Assignment Calculator with a friendly reminder that step $stepp of the research and writing process for the assignment you titled \"$row[name]\" should be done on or before $date.  \n\n";

			//$mailBody .= "By the way, step $step entails the following:\n\n";

			$mailBody .= "Step $stepp:  " . $instructions[$step][1] . "\n";
				
				for($j=0; $j<sizeof($instructions[$step][2]); $j++){
					
					if ((ereg("http:[^\']*", $instructions[$step][2][$j], $match))) {
						$url = $match[0];
					}
					$instruction = ereg_replace("<a href='http:[^\']*'>", "", $instructions[$step][2][$j]);
					$instruction = ereg_replace("</a>", "", $instruction);
					$mailBody .= "  $instruction";
					if ($url) {
						$mailBody .= " -- $url\n";
					} else {
						$mailBody .= "\n";
					}
					//$mailBody .= "\n";
					unset($url);
					unset($instruction);
				}
			$mailBody .= "\n";

			

			$stepplus = $row[step] + 1;
			$sql = "select * from calc_mail where email = '$row[email]' and name = '$row[name]' and step = '$stepplus'";
			$results = mysql_query($sql);
			$rowss = mysql_num_rows($results);

				if ($rowss > 0) {

					while ($row1=mysql_fetch_array($results)) {

						$step1 = $row1[step] - 1;
						
						$date1 = date("F j, Y", strtotime($row1[datum]));
						$mailBody .= "Step $stepplus of your assignment should be done by $date1.\n\n";
						$mailBody .= "Step $stepplus:  " . $instructions[$step1][1] . "\n";

							for($j=0; $j<sizeof($instructions[$step1][2]); $j++){
					
								if ((ereg("http:[^\']*", $instructions[$step1][2][$j], $match))) {
								$url = $match[0];
								}
								$instruction = ereg_replace("<a href='http:[^\']*'>", "", $instructions[$step1][2][$j]);
								$instruction = ereg_replace("</a>", "", $instruction);
								$mailBody .= "  $instruction";
									if ($url) {
										$mailBody .= " -- $url\n";
									} else {
										$mailBody .= "\n";
									}
									//$mailBody .= "\n";
								unset($url);
								unset($instruction);
							}
					}
					
				}
		
		$name = ereg_replace(" ", "+", $row[name]);
		$mailBody .= "\nDo you want to recalculate this assignment or try another?  Go to the Assignment Calculator at: http://www.lib.wayne.edu/services/instruction_tutorials/calculator/\n";

		if ($stepp != "12") {
			$mailBody .= "\n\n\n\nWould you like to stop getting these email reminders for this assignment?\n";
			$mailBody .= "http://www.lib.wayne.edu/services/instruction_tutorials/calculator/delmail?email=$row[email]&name=$name\n";
		} else {
			$mailBody .= "\n\nThis is the last reminder you will receive for this assignment.\n";
		}

		$mailBody .= "This email was generated by $row[email]\n\n";
		$mailFrom = "From: donotreply@cgi.lib.wayne.edu\r\n";
                mail("$mailTo", "$mailSub", "$mailBody", "$mailFrom");
		$sql = "delete from calc_mail where (email = '$row[email]' and name = \"$row[name]\" and step = '$row[step]')";
		$res44 = mysql_query($sql);
		}
		
	

	}

mysql_close();
}
?>
