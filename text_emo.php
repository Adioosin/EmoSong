
<link rel="stylesheet" href="css/styletable.css">
<div class="back-button">
<a href="index.html">
  <div class="arrow-wrap">
    <span class="arrow-part-1"></span>
    <span class="arrow-part-2"></span>
    <span class="arrow-part-3"></span>
  </div>
</a>
</div>
<?php

$conn = new mysqli("localhost","root","","music");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$text = $_GET['search'];
$text = strtolower($text);

if($text == 'happy' || $text == 'sad' || $text == 'surprise' || $text == 'angry' || $text == 'excited'){
echo"<br>";
if($text == 'excited'){
  $emotion = 'surprise';
}
else{
  $emotion = $text;
}
?>
<section>
  <!--for demo wrap-->
  <h1><?php echo "List of song according to your ".$emotion." mood";?></h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Title</th>
          <th>Album</th>
          <th>Artist</th>
          <th>Duration</th>
          <th>Play</th>
        </tr>
      </thead>
    </table>
  </div>
   <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>

<?php
$emotion = strtolower($emotion);
$result = $conn->query("Select * from $emotion");
        while($row = $result->fetch_assoc()){
echo"<tr><td>{$row['Title']}</td><td>{$row['Album']}</td><td>{$row['Artist']}</td><td>{$row['Duration']}</td><td><a href='{$row['link']}'  target='_blank' ><img src='playbtn.png'></a></td></tr>\n";
        }
         ?>
    </tbody>
    </table>
  </div>
</section>
<?php

}
else{
  echo "<h1>Please enter valid mood</h1>";
}

echo"<br>";
?>
<script>
	var backButton = document.querySelector('.back-button')

function backAnim(){  
  if (backButton.classList.contains('back')){
    backButton.classList.remove('back');
  }
  else{
    backButton.classList.add('back');
    setTimeout(backAnim, 1000);  
  }
}
backButton.addEventListener('click', backAnim);
</script>