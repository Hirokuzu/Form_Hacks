<?php
session_start();

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

  if(isset($_SESSION["attendance_error"]) || isset($_SESSION["name_error"]))
  {
    header("location: index.php");
  }
  else // no problems
  {
    if($_SESSION["attendance"] !== "in person") // either in spirit or it's BS value. Just say thank you.
    {
      header("location: RSVP_thankyou.php");
    }
  }
}
else // no data submitted from previous form. what?
{
  header("location: index.php");
}

function clean_input($data)
{
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
}

// some other stuff here
?>

<!DOCTYPE html>
<html>

<head>
	<?php include("styling.html"); ?>
  <title>Prudence and Mark's RSVP</title>
</head>

<body>
  <div id="flexwrap">
  <?php
    readfile("invitation.html");
  ?>
<form action="RSVP_thankyou.php" method="post">
  <fieldset id="preferences">
    <legend>Food, beverage preferences</legend>
    <div>
      <label for="diet_r">Do you have any dietary restrictions?</label>
      <input type="text" id="diet_r" name="diet_restriction"></input>
    </div>
    <div>
      <fieldset>
        <legend>Your favourite kind of beverage (pick up to two):</legend>
        <?php
          if(array_key_exists("drink_error", $_SESSION) && isset($_SESSION["drink_error"]))
          {
            echo "<span class=\"error\">".$_SESSION["drink_error"]."</span>";
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
      <input type="text" id="songs" name="songs"></input>
    <div class="button">
      <button type="submit">Complete your RSVP!</button>
    </div>
  </fieldset>
</form>
</div>
</body>
</html>
