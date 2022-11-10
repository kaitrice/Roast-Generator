<?php 
include ('openers.php'); 
include ('sentences.php');
include ('closers.php'); 

$opener = $openers;
$roast = $sentences;
$closer = $closers;

$_FNAME_ = $_POST["_FNAME_"] ?? "";
$_LNAME_ = $_POST["_LNAME_"] ?? "";

$pnouns = $_POST["pnouns"] ?? "";
$pnouns = explode(", ", $pnouns);

$_NPRONOUN_ = $pnouns[0];
$_PRONOUN_ = $pnouns[1];
$_OPRONOUN_ = $pnouns[2];

$num_lines = $_POST["num_lines"] ?? "";
$num_lines -= 2;

function convertString($tempSentence1, $fname, $lname, $npro, $ppro, $opro) {
  $tempSentence2 = str_replace("_FNAME_", $fname, $tempSentence1);
  $tempSentence1 = str_replace("_LNAME_", $lname, $tempSentence2);
  $tempSentence2 = str_replace("_NPRONOUN_", $npro,  $tempSentence1);
  $tempSentence1 = str_replace("_PPRONOUN_", $ppro, $tempSentence2);
  $tempSentence2 = str_replace("_OPRONOUN_", $opro,  $tempSentence1);
  if (strpos($tempSentence2, "<b>") == 0) {
    $tempSentence1 = substr_replace($tempSentence2, "", 0, 3);
    $tempSentence2 = ucfirst($tempSentence1); 
    $tempSentence1 = "<b>".$tempSentence2; 
  } else {
    $tempSentence1 = ucfirst($tempSentence2); 
 }

  $tempSentence2 = $tempSentence1 . "."; //put a period at the end of the sentence

  return $tempSentence2;
}

function getRoast($roast, $num_lines, $_FNAME_, $_LNAME_, $_NPRONOUN_, $_PRONOUN_, $_OPRONOUN_){
  $numOfSentences = 0;
  //create a separate array to hold used roasts
  $usedArray = array(); 
  
  //Loop until we have two sentences
  while ($numOfSentences < $num_lines) {
    $possIndex = rand(0, count($roast) - 1);
    if (in_array($possIndex, $usedArray) != true)
      $usedArray[count($usedArray)] = $possIndex;
        
      //increment the numOfSentences
      $numOfSentences = $numOfSentences + 1;
      $tempSentence1 = $roast[$possIndex]["text"];
  
      $tempSentence2 = convertString($tempSentence1, $_FNAME_, $_LNAME_, $_NPRONOUN_, $_PRONOUN_, $_OPRONOUN_);
  
      echo $tempSentence2;
      echo "<br><br>";
  }
}

?>

<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="style.css">
  <title>Lab 4 - Roast Generator</title>

</head>

<body>
  <div id="container">
    <div class="left" id h>

    </div>
    <div class="right" id="register">
      <h1>Kaitlyn's Political Roast Generator</h1>
      <h2>Roast <?php echo $_FNAME_ . " " . $_LNAME_ ?></h2>

      <div id="roast-box">
        <?php getRoast($opener, 1, $_FNAME_, $_LNAME_, $_NPRONOUN_, $_PRONOUN_, $_OPRONOUN_);
        getRoast($roast, $num_lines, $_FNAME_, $_LNAME_, $_NPRONOUN_, $_PRONOUN_, $_OPRONOUN_);
        getRoast($closer, 1, $_FNAME_, $_LNAME_, $_NPRONOUN_, $_PRONOUN_, $_OPRONOUN_);
        ?>
      </div>

      <form action="lab4.php" method="post" id="lab4"> 
        <input type="submit" name="btn" placeholder="Reset" id="btn">
      </form>
    </div>
  </div>
</body>
</html>