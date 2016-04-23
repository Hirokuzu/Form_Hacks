<?php
session_start();

// some other stuff here
?>

<!DOCTYPE html>
<html>

<body>
<?php /*<!-- some file here -->*/ ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <fieldset id="preferences">
    <legend>Food, beverage preferences</legend>
    <div>
      <label for="diet_r">Do you have any dietary restrictions?</label>
      <input type="text" id="diet_r" name="diet_restriction"></input>
    </div>
    <div>
      <fieldset>
        <legend>Your favourite kind of beverage (pick up to two):</legend>
        <input type="checkbox" id="cbox_ww" value="white_wine"/><label for="cbox_ww">White Wine</label><br />
        <input type="checkbox" id="cbox_rw" value="red_wine"/><label for="cbox_rw">Red Wine</label><br />
        <input type="checkbox" id="cbox_b" value="beer"/><label for="cbox_b">Beer</label><br />
        <input type="checkbox" id="cbox_na" value="non-alcoholic"/><label for="cbox_na">Non-alcoholic</label><br />
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
</body>
</html>
