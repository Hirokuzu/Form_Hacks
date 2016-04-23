<?php
  session_start();
  echo "<p>Thanks for responding!</p>";
  session_unset();
  session_destroy();
?>
