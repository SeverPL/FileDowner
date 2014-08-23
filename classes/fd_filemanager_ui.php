<?php
/* FileDowner - FileManager
 * utworzono 23 sierpnia 2014 22:43
*
* wersja v. 0.1.0 - 23.08.2014 22:43
*
*/

class fd_filemanager_ui extends fd_filemanager{
	public function listFiles(){
		echo '<table width=100%>';
		$this->getDir('downloads');
		echo '</table>';
	}
};