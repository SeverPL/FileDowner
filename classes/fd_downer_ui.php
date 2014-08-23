<?php
/* FileDowner
 * utworzono 23 sierpnia 2014 09:37
 * 
 * wersja v. 0.1.0 - 23.08.2014 09:37
 * 
 */

class mf_downer_ui extends mf_downer {
	public function showDownloader(){?>
		<h1>Wprowadź adres pliku do pobrania</h1>
		<form action="index.php?page=getfile" method="post">
		<input type="text" name="url" /><br />
		<input type="submit" value="Pobierz" />
		</form>
	<?php 
	}
}