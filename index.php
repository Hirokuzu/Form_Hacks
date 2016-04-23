<?php
session_start();

$name_error = "";
$attendance_error = "";
$error = False;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$full_name = trim($_POST['full_name']);
	if(empty($full_name))
	{
		$name_error = "Please enter your name.";
		$error = True;
	}
	else
	{
	  $_SESSION["full_name"] = clean_input($_POST["full_name"]);
	}

	if(empty($_POST["attendance"]))
	{
		$attendance_error = "Please respond with your attendance!";
		$error = True;
	}
	else {
		$_SESSION["attendance"] = clean_input($_POST["attendance"]);
	}

  if(!$error)
	{
    if($_SESSION["attendance"] == "in person")
    {
      header("location: RSVP2.php");
    }
		else
    {
      header("location: RSVP_thankyou.php");
    }
	}
  else
  {
    echo '<pre>'.print_r($_POST,true).'</pre>';
  }
}

function clean_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

<!DOCTYPE html>
<html>

<head>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
    <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,400' rel='stylesheet' type='text/css'>
  <title>Tester Form based on Mozilla tutorial</title>
</head>

<body>
<div id="flexwrap">
<div id="invite">
<p class="nospace">Together with our families,</p>
<h1>Prudence Ip and Mark&nbsp;Fussell</h1>
<p class="nospace">request the honour of your presence at their wedding at <a href="https://goo.gl/maps/skYWyHdZjEM2" target="_blank">Hycroft&nbsp;Manor</a> on July 24, 2016 at 4:00 PM. Reception to follow.</p>
<p class="details">The party will have a Speakeasy / 1920s theme. For a bit of extra fun, we encourage you to dress for the theme. Here are <a href="https://www.pinterest.com/laswimmingyuu/1920s-style/" target="_blank">some ideas</a> of what that can look like.</p>
<p class="details">In order to confirm numbers with our vendors, we would appreciate if you RSVP before June 24, 2016. Due to the venue's capacity limitation, we are regretfully unable to extend our invitations to your partners.</p>
</div>
<div id="form">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <fieldset id="RSVP">
      <legend>RSVP</legend>
      <div>
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="full_name"/>
        <?php if(!empty($name_error)){ ?><span class='error'><?php echo $name_error ?></span><?php } ?>
      </div>
      <div>
        <fieldset>
          <legend>How will you celebrate with us?</legend>
          <?php if(!empty($attendance_error)){ ?><span class='error'><?php echo $attendance_error ?></span><br /><?php } ?>
          <input type="radio" id="person" name="attendance" value="in person"/><label for="person">In person</label><br />
          <input type="radio" id="spirit" name="attendance" value="in spirit"/><label for="spirit">In spirit</label><br />
        </fieldset>
      </div>
      <div class="button">
        <button type="submit">Next</button>
      </div>
    </fieldset>
  </form>
</div>
</div>
</body>

</html>
