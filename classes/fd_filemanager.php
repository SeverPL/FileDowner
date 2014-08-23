<?php
/* FileDowner - FileManager
 * utworzono 23 sierpnia 2014 22:43
*
* wersja v. 0.1.0 - 23.08.2014 22:43
*
*/

class fd_filemanager{

	protected function getDir($directory){
		foreach(new DirectoryIterator($directory) as $file){
			if(!$file->isDot()){
				$rozmiar = $file->getSize() / 1024;
				$rozmiar = round($rozmiar, 2);
				$dir = $file->isDir();
				if($dir==false){
					echo '<tr><td>'.$file->getFilename().'</td><td>'.$rozmiar.' kB</td><td></td><tr>';
				}
				else {
					echo '<tr><td colspan=2>'.$file->getFilename().'</td></tr>';
					#echo $directory.'/'.$file->getFilename();
					$this->getDir($directory.'/'.$file->getFilename());
				}
			}
		}
	}
	
}