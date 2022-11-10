<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="style.css">
  <title>Lab 4 - Processing Form</title>

</head>

<body>
  <div id="container">
    <div class="left" id h>

    </div>
    <div class="right" id="register">
      <h1>Kaitlyn's Political Roast Generator</h1>
      <h2>Complain about a politican</h2>

      <form action="roast.php" method="post" id="lab4">
        <fieldset>
          <legend>What's the full name of the politican you want to complain about?</legend>
          <input type="text" name="_FNAME_" placeholder="first name" id="f_name" required>
          <input type="text" name="_LNAME_" placeholder="last name" id="l_name" required>
        </fieldset>

        <fieldset>
          <legend>Please pick the appropriate pronouns for this person?</legend>
          <input type="text" name="pnouns" id="pnouns" list="pronouns" required>
          <datalist id="pronouns">
            <option value="he, him, his">
            <!-- <option value="he, they, firstname('s)"> -->
            <option value="she, her, hers">
            <!-- <option value="she, they, firstname('s)"> -->
            <option value="they, them, theirs">
            <option value="ze, hir, hirs">
            <option value="ze, zir, zirs">            
          </datalist>
        </fieldset>

        <fieldset>
          <legend>How many sentences do you want to generate?</legend>
          <input type="text" name="num_lines" id="num_lines" list="lines" required>
          <datalist id="lines">
            <option value="3">
            <option value="5">
            <option value="10">
          </datalist>

        </fieldset>

        <input type="submit" name="btn" placeholder="Reset" id="btn">
      </form>
    </div>
  </div>
</body>
</html>