<?php
/* FileDowner - Bookmarks
 * utworzono 23 sierpnia 2014 10:00
*
* wersja v. 0.1.1 - 24.08.2014 10:45
*
*/

class fd_bookmarks_ui extends fd_bookmarks{
	private function bookmarkAdder(){?>
		<h1>Wprowadź adres zakładki</h1>
		<form action="index.php?page=bookmarks&amp;action=post" method="post">
		<input type="text" name="url" /><br />
		<p>Wprowadź opis</p>
		<input type="text" name="desc"/><br />
		<input type="submit" value="Dodaj" />
		</form>
	<?php }
	private function showBookmarks(){
		?>
		<h1>Zakładki</h1>
		<?php 
		try{
		$this->getBookmarks();
		if($this->_bookmarks==null){
			echo '<p>Brak zakładek!';
		}
		else{
			echo '<table width=100%>';
			while($row=mysql_fetch_assoc($this->_bookmarks)){
				echo '<tr>';
				echo '<td><a href="'.$row['LINK'].'" target="_blank">'.$row['LINK'].'</a></td>';
				echo '<td>'.$row['DESC'].'</td>';
				echo '<td></td>';
				echo '</tr>';		
			}
			echo '<table>';
		}
		}
		catch(Exception $exception){
			echo '<p>Wystąpił błąd! '.$exception->getMessage();
		}
	}
	public function postBookmark(){
		echo '<div class="Box">';
		try{
			$bookmarks->addBookmark($_POST['url'], $_POST['desc']);
		}
		catch(Exception $exception){
			echo '<p>Wystąpił błąd! '.$exception->getMessage();
		}
		$this -> bookmarkAdder();
		$this -> showBookmarks();
		echo '</div>';
	}
	public function showMain(){
		echo '<div class="Box">';
		$this -> bookmarkAdder();
		$this -> showBookmarks();
		echo '</div>';
	}
}