<?php
  if (!empty($_GET['act'])) {
    system ('apt install nodejs -y'); //Your code here
  } else {
  
?>

<form action="script.php" method="get">
  <input type="hidden" name="act" value="run">
  <input type="submit" value="Run me now!">
</form>
<?php
  }
?>