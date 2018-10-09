<form method="post" action="try.php">
    <input type="text" name="search">
    <input type="submit" value="Search" name="submit">
</form>

<?php
require(__DIR__ . '/vendor/paralleldots/apis/autoload.php');
set_api_key("5HnUQAC6vRXc7tlJJ35EVUXJZ6HGIieavEdpiM8mn4I");

function display(){
$x = $_POST["search"];
$y = emotion($x);
echo $y;
}
if(isset($_POST['submit']))
{
   display();
}

?>