<!DOCTYPE html>
<html>

<head>
  <title>Tester Form based on Mozilla tutorial</title>
</head>

<body>
  <form action="" method="post">
    <fieldset id="RSVP">
      <legend>RSVP</legend>
      <div>
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="full_name"/>
      </div>
      <div>
        <fieldset>
          <legend>How will you celebrate with us?</legend>
          <input type="radio" id="person" name="attendance" value="in person"/><label for="person">In person</label><br />
          <input type="radio" id="spirit" name="attendance" value="in spirit"/><label for="spirit">In spirit</label><br />
        </fieldset>
      </div>
      <div class="button">
        <button type="button">Next</button>
      </div>
    </fieldset>
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
  </form>
</body>

</html>
