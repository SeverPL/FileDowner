<?php
require 'class_downer.php';


echo '<!DOCTYPE HTML>';
echo '<head>';
echo "<meta name=\"author\" content=\"$autor\" />" . "\n";
echo '<meta charset="utf-8" />' . "\n";
echo "<title>Pobieranie Plikow</title>" . "\n";
echo "<link rel=\"stylesheet\" href=\"style.css\" />";
?>
<link href='http://fonts.googleapis.com/css?family=Lato:300,100,400' rel='stylesheet' type='text/css'>
<?php
echo '</head>';

$page = $_GET['page'];
if(!isset($page)){
?>
	<div class="Box">
	<h1>Wprowadź adres pliku do pobrania</h1>
	<form action="index.php?page=getfile" method="post">
	<input type="text" name="url" /><br />
	<input type="submit" value="Pobierz" />
	</form>
	</div>
<?php
} 
elseif($page=='getfile'){
	$url = $_POST['url'];
?>
	<div class="Box">
	<h1>Pobieranie pliku...</h1>
	<?php 
	$file = new mf_downer();
	$file->getfile($url);
	?>
	</div>
<?php 
}

?>