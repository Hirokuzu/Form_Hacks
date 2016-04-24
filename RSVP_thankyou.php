<?php
  session_start();

  // validate if POST
  if($_SERVER["REQUEST_METHOD"] == "POST") // should be from second page
  {
    // check for the second page variables
    // process if they exist, add to POST for Google sheets,
    // email as well
    if(array_key_exists("drinks", $_POST)) {
      if(count($_POST["drinks"]) > 2)
      {

      }
    } else {
      // set error, go back
    }
  }
  // if not post, then check for session variables to determine which page to go to



  session_unset();
  session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
  <?php include("styling.html"); ?>
  <title>Prudence and Mark's RSVP</title>
</head>

<body>
<?php
// conditional for whether or not we'll see you on the day
?>
</body>
</html>
