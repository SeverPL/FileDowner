<?php
require 'include/launch.php';
require 'classes/fd_downer.php';
require 'classes/fd_downer_ui.php';
require 'classes/fd_bookmarks.php';
require 'classes/fd_bookmarks_ui.php';
require 'classes/fd_filemanager.php';
require 'classes/fd_filemanager_ui.php';
$engine = new mf_engine($mf_debug_show_gentime);
$head = new mf_head;
$db = new mf_db;
$file = new mf_downer_ui;
$bookmarks = new fd_bookmarks_ui($db);
$filemanager = new fd_filemanager_ui;
echo '<!DOCTYPE HTML>';
echo '<head>';
$head -> html5_meta_tags('none', 'Mateusz Wiśniewski', 'none', '', 'FileDowner', '');
$head -> html5_css('style.css');
?>
<link href='http://fonts.googleapis.com/css?family=Lato:300,100,400'
	rel='stylesheet' type='text/css'>
<?php
echo '</head>';

$page = $_GET['page'];
?>
<div class="MenuContainer">
	<div class="MenuBox">
		<a href="index.php">Pobieranie</a>
	</div>
	<div class="MenuBox">
		<a href="index.php?page=pbdownload">Pobieranie z Pb</a>
	</div>
	<div class="MenuBox">
		<a href="index.php?page=files">Pliki</a>
	</div>
	<div class="MenuBox">
		<a href="index.php?page=bookmarks">Zakładki</a>
	</div>
</div>
<?php
if(!isset($page)){
?>
<div class="Box">
	<?php $file->showDownloader();?>
</div>
<?php
} 
elseif($page=='getfile'){
?>
<div class="Box">
	<h1>Pobieranie pliku...</h1>
	<?php 
	$file->page_getfile();
	?>
</div>
<?php 
}
elseif($page=='pbdownload'){
	echo '<div class="Box">';
	$file->showPbDownloader();
	echo '</div>';
}
elseif($page=='pbgetfile'){
	?>
	<div class="Box">
	<?php 
	$file->page_pbgetfile();
	?>
	</div>
	<?php 
}
elseif($page=='bookmarks'){
	$action = $_GET['action'];
	if(!isset($action)){
		$bookmarks -> showMain();
	}
	elseif($action=='post'){
		$bookmarks -> postBookmark();
	}
}
elseif($page=='files'){
	?>
	<div class="Box">
	<h1>Pliki</h1>
	<?php 
	$filemanager -> listFiles();
	?>
	</div>
	<?php 
}

?>