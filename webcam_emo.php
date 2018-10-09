
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




require(__DIR__ . '/vendor/paralleldots/apis/autoload.php');
set_api_key(--Put API Key here from ParallelDots--);
echo"<br>";

$path_pic = "C:\\xampp\htdocs\sentiment\saved_images\pic.jpg";
//echo $path_pic;
$result = facial_emotion($path_pic);
$result1 = json_decode($result,true);
//print_r($result1);
if(!array_key_exists('output', $result1)){
echo"<br>";
if($result1['facial_emotion'][0]['tag']=='Neutral'){
	
    $emotion = $result1['facial_emotion'][1]['tag'];
}
else{
	$emotion = $result1['facial_emotion'][0]['tag'];

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
    echo $result1['output'];
}
echo"<br>";
?>
<center>
	<h1>Image used for Emotion Recognition</h1>
<img src="saved_images/pic.jpg" style="width:320px;height:230px;">
</center>
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