<?php

  function to_top() {
    header("location: index.php");
  }

  function to_two() {
    header("location: RSVP2.php");
  }

  function to_end() {
    header("location: RSVP_thankyou.php");
  }

  function clean_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function print_state(){
    echo "<pre>".print_r($_POST,true)."</pre>";
    echo "<pre>".print_r($_SESSION,true)."</pre>";
  }
?>
