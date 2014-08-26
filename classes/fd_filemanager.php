<?php
/* FileDowner - FileManager
 * utworzono 23 sierpnia 2014 22:43
*
* wersja v. 0.2.0 - 26.08.2014 23:02
*
*/

class fd_filemanager{
	private $_nazwapliku = null;
	private $_rozmiar = null;
	private $_isdir = null;
	private $_exist = null;

	protected function getDir($directory){
		$this->_exist = file_exists($directory);
		if($this->_exist!=true){
			throw new Exception("Folder $directory nie istnieje!");
		}
		foreach(new DirectoryIterator($directory) as $file){
			if(!$file->isDot()){
				$this->_rozmiar = $file->getSize() / 1024;
				$this->_rozmiar = round($this->_rozmiar, 2);
				$this->_nazwapliku = $file->getFilename();
				$this->_isdir = $file->isDir();
				
				if($this->_isdir==false){
					echo '<tr><td><a href="'.$directory.'/'.$this->_nazwapliku.'" target="_blank">'.$this->_nazwapliku.'</a></td><td>'.$this->_rozmiar.' kB</td><td></td><tr>';
				}
				else {
					echo '<tr class="FileManagerFolder"><td><a href="?page=files&amp;dir='.$this->_nazwapliku.'">'.$this->_nazwapliku.'</a></td><td><img src="icons/folder.png" alt="Folder" title="Folder" /></tr>';
					#echo $directory.'/'.$file->getFilename();
					$this->getDir($directory.'/'.$this->_nazwapliku);
				}
			}
		}
	}
}
	