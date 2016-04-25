<?php
session_start();
include 'helpers.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

  if(!array_key_exists("full_name", $_POST))
  {
    $_SESSION["name_error"] = "No name entered.";
  }
  else
  {
    $_SESSION["full_name"] = clean_input($_POST["full_name"]);
    if(empty($_SESSION["full_name"]))
    {
      $_SESSION["name_error"] = "No name entered.";
      $_SESSION["full_name"] = NULL;
    }
    else
    {
      unset($_SESSION["name_error"]);
    }
  }

  if(!array_key_exists("attendance", $_POST))
  {
    $_SESSION["attendance_error"] = "Please respond with your attendance!";
  }
  else
  {
    $_SESSION["attendance"] = $_POST["attendance"];
    unset($_SESSION["attendance_error"]);
  }

  if(!empty($_SESSION["attendance_error"]) || !empty($_SESSION["name_error"]))
  {
    to_top();
  }
  else // no problems
  {
    if($_SESSION["attendance"] !== "in person") // either in spirit or it's BS value. Just say thank you.
    {
      to_end();
    }
  }
}
else // did we get rejected?
{
  if(!isset($_SESSION["drinks_error"])) {
  }
}

?>

<!DOCTYPE html>
<html>

<head>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
  <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,400' rel='stylesheet' type='text/css'>
  <title>Prudence and Mark's RSVP</title>
</head>

<body>
  <?php print_state() ?>
  <div id="flexwrap">
  <?php
    readfile("invitation.html");
  ?>
  <div id="form">
<form action="RSVP_thankyou.php" method="post">
  <fieldset id="preferences">
    <legend>Food, beverage preferences</legend>
    <div>
      <label for="diet_r">Do you have any dietary restrictions?</label>
      <input type="text" id="diet_r" name="diet_restriction" value="<?php if(array_key_exists("diet_restriction", $_SESSION)) echo $_SESSION["diet_restriction"]?>"/>
    </div>
    <div>
      <fieldset>
        <legend>Your favourite kind of beverage (pick up to two):</legend>
        <?php
          if(array_key_exists("drinks_error", $_SESSION) && isset($_SESSION["drinks_error"]))
          {
            echo "<span class=\"error\">".$_SESSION["drinks_error"]."</span><br>";
          }
        ?>
        <input type="checkbox" id="cbox_ww" name="drinks[]" value="white_wine"/><label for="cbox_ww">White Wine</label><br />
        <input type="checkbox" id="cbox_rw" name="drinks[]" value="red_wine"/><label for="cbox_rw">Red Wine</label><br />
        <input type="checkbox" id="cbox_b"  name="drinks[]" value="beer"/><label for="cbox_b">Beer</label><br />
        <input type="checkbox" id="cbox_na" name="drinks[]" value="non-alcoholic"/><label for="cbox_na">Non-alcoholic</label><br />
      </fieldset>
    </div>
    <div>
      <label for="songs">I'll rock the dance floor if you play:</label>
      <input type="text" id="songs" name="songs" value="<?php if(array_key_exists("songs", $_SESSION)) echo $_SESSION["songs"]?>"/>
    <div class="button">
      <button type="submit">Complete your RSVP!</button>
    </div>
  </fieldset>
</form>
</div>
</div>
</body>
</html>
