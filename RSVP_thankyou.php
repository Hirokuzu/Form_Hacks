<?php
  session_start();
  include 'helpers.php';
  $email_success = false;

  // validate if first page data
  if(!array_key_exists("full_name",$_SESSION))
  {
    $_SESSION["name_error"] = "No name entered.";
  }
  if(!array_key_exists("attendance", $_SESSION))
  {
    $_SESSION["attendance_error"] = "Please respond with your attendance!";
  }

  if(!empty($_SESSION["attendance_error"]) || !empty($_SESSION["name_error"]))
  {
    to_top();
  }
  unset($_SESSION["attendance_error"]);
  unset($_SESSION["name_error"]);

  // validate if second page data exists
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    // check for the second page variables
    // process if they exist, add to POST for Google sheets,
    // email as well
	$_SESSION["drinks_error"] = NULL;
    if(array_key_exists("drinks", $_POST))
    {
		$num_drinks = count($_POST["drinks"]);
      if($num_drinks > 2)
      {
        $_SESSION["drinks_error"] = "Please select at most two drinks.";
      }

    } else { // we want drinks so pick some
      $_SESSION["drinks_error"] = "Please select at at least one drink.";
    }
	
    if(array_key_exists("diet_restriction", $_POST))
    {
      $_SESSION["diet_restriction"] = clean_input($_POST["diet_restriction"]);
    }
    if(array_key_exists("songs", $_POST))
    {
      $_SESSION["songs"] = clean_input($_POST["songs"]);
    }
	
	if(isset($_SESSION["drinks_error"])) {
		to_two();
	}
  }

  $form_response = "Name:".$_SESSION["full_name"].";\r\n";
  $form_response .= "Attendance:".$_SESSION["attendance"].";\r\n";
  if(array_key_exists("diet_restriction", $_POST)) {
    $diet_r = clean_input($_POST["diet_restriction"]);
    if(!empty($diet_r)) {
      $form_response .= "Diet_restriction:".$diet_r.";\r\n";
    }
  }
  if(array_key_exists("drinks",$_POST)) {
    $form_response .= "Drinks:".implode(",",$_POST["drinks"]).";\r\n";
  }
  if(array_key_exists("songs",$_POST)) {
    $songs = clean_input($_POST["songs"]);
    if(!empty($songs)) {
      $form_response .= "songs:".$songs.";\r\n";
    }
  }
  wordwrap($form_response);
  $email_success = mail("prudenceandmark@gmail.com","RSVP for ".$_SESSION["full_name"],$form_response);
?>

<!DOCTYPE html>
<html>
<head>
  <link type="text/css" rel="stylesheet" href="stylesheet.css" />
  <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,400' rel='stylesheet' type='text/css'>
  <title>Prudence and Mark's RSVP</title>
</head>

<body>
<div id="flexwrap">
  <p>Thank you for your response!</p>
<?php
if($_SESSION["attendance"] == "in person")
{
	echo "<p>We look forward to celebrating with you!</p>";
}
  if($email_success) {
    session_unset();
    session_destroy();
  }
?>
  <p><a href="marriesMarkFussell" class="button">Submit another response</a></p>
</div>
</body>
</html>
