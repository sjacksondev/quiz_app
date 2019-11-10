<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>NEW ENGLAND QUIZ</title>
</head>
<style>

	/* Body and Header Styles */

	body {
		background-image: url('images/600px-MA_counties_map.png');
		background-size: cover;
		text-align: center;
		font-size: 20px;
		font-family: 'Handlee', cursive;
		color: white;
		text-shadow: -1px 1px 0 #000,
					  1px 1px 0 #000,
				 	  1px -1px 0 #000;
					 -1px -1px 0 #000;
	}

	h1 {
		background-color: red;
		padding-bottom: 25px;
		color: #92a5de;
		font-size: 50px;
		color: #e0dfdc;
		letter-spacing: .1em;
		text-shadow: 0 -1px 0 #fff, 0 1px 0 #2e2e2e, 0 2px 0 green, 0 3px 0 #2a2a2a, 0 4px 0 #282828, 0 5px 0 red, 0 6px 0 #242424, 0 7px 0 #222, 0 8px 0 white, 0 9px 0 #1e1e1e, 0 10px 0 #1c1c1c, 0 11px 0 #1a1a1a, 0 12px 0 blue, 0 13px 0 #161616, 0 14px 0 #141414, 0 15px 0 #121212, 0 22px 30px rgba(0,0,0,0.9);
	}

	a {
		color: white;
	}

	a:hover {
		color: yellow;
	}


</style>
<body>

	<h1>NEW ENGLAND QUIZ</h1>


	<?php
		/* Answers to Quiz.*/
		$StateCapitals = array(
			"Connecticut" => "Hartford",
			"Maine" => "Augusta",
			"Massachusetts" => "Boston",
			"New Hampshire" => "Concord",
			"Rhode Island" => "Providence",
			"Vermont" => "Montpelier");

		/* If/else statement based off correct or incorrect answer. */

		if (isset($_POST['submit'])) {
			$Answers = $_POST['answers'];
			if (is_array($Answers)) {
				foreach ($Answers as $State => $Response) {
					$Response = stripslashes($Response);
					if (strlen($Response)>0) { /* If answer is correct output. */
						if (strcasecmp($StateCapitals[$State], $Response)==0) {
							echo "<p>Correct! The capital of $State is $StateCapitals[$State].</p>\n";
						}
						else { /* If answer is incorrect output. */
							echo "<p>Sorry, the capital of $State is not $Response.</p>\n";
						}
					}
						else { /* If answer is left blank output. */
							echo "<p>You did not enter a value for the capital of $State.</p>\n";
						}
				}
				
			} /* If user would like to retry the quiz again. */
			echo "<p><a href='Quiz.php'>Try Again?</a></p?\n";
		} 
		else { 
			echo "<form style=\"padding: 10px; font-weight: bold\" action='Quiz.php' method='POST'>\n";
			foreach ($StateCapitals as $State => $Response) { /* Output for esch answer.. */
				echo "The capital of $State is: <input style=\"line-spacing: 10px;\" type='text' name='answers[" . $State . "]' /><br />\r\n";}
				echo "\n";
				echo "\n";
				/* Check Answers Button */
				echo "<input style=\"border-radius: 30px; font-family: 'Yeon Sung', cursive; font-size: 16px; background-color: red; color: white;\" type='submit' name='submit' value='Check Answers' />";
				/* Reset Form Button */
				echo "<input style=\"border-radius: 30px;font-family: 'Yeon Sung', cursive; font-size: 16px; background-color: red; color: white;\" type='reset' name='reset' value='Reset Form' />\n";
				echo "</form>\n";
		}
	?>

</body>
</html>