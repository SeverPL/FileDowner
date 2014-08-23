<?php
/* FileDowner - Bookmarks
 * utworzono 23 sierpnia 2014 10:00
*
* wersja v. 0.1.0 - 23.08.2014 10:00
*
*/

class fd_bookmarks_ui extends fd_bookmarks{
	public function bookmarkAdder(){?>
		<h1>Wprowadź adres zakładki</h1>
		<form action="index.php?page=bookmarks&amp;action=post" method="post">
		<input type="text" name="url" /><br />
		<p>Wprowadź opis</p>
		<input type="text" name="desc"/><br />
		<input type="submit" value="Dodaj" />
		</form>
	<?php }
	public function showBookmarks(){
		?>
		<h1>Zakładki</h1>
		<?php 
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
}