<?php
/* FileDowner
 * utworzono 23 sierpnia 2014 09:37
 * 
 * wersja v. 0.2.1 - 26.08.2014 00:16
 * 
 */

class mf_downer_ui extends mf_downer {
	
	public function showDownloader(){?>
		<h1>Wprowadź adres pliku do pobrania</h1>
		<form action="index.php?page=getfile" method="post">
		<input type="text" name="url" /><br />
		<?php 
		$this->directoryBox();
		?>
		<input type="submit" value="Pobierz" />
		</form>
	<?php 
	}
	
	private function directoryBox(){
		echo '<select name="dir">';
		echo '<option value="none">Główny folder</option>';
		foreach(new DirectoryIterator('downloads') as $file){
			if(!$file->isDot()){
				if($file->isDir() == true){
					echo '<option value="'.$file->getFilename().'">'.$file->getFilename().'</option>';
				}	
			}
		}
		echo '</select><br />';
	}
	
	public function showPbDownloader(){?>
		<h1>Wprowadź adres PB do pobrania</h1>
		<form action="index.php?page=pbgetfile" method="post">
		<input type="text" name="url" /><br />
		<?php 
		$this->directoryBox();
		?>
		<input type="submit" value="Pobierz z PB" />
		</form>
		<?php 
	}
	
	public function page_getfile(){
		$url = $_POST['url'];
		$dir = $_POST['dir'];
		try{
			$this->getfile($url, $dir);
		}
		catch(Exception $exception){
			echo '<p><strong>Wystąpił błąd!</strong> '.$exception->getMessage().'</p>';
		}
		$this->showDownloader();
	}
	
	public function page_pbgetfile(){
		$url = $_POST['url'];
		$dir = $_POST['dir'];
		try{
			$this->getfile($this->pb_extract_url($url), $dir);
		}
		catch(Exception $exception){
			echo '<p><strong>Wystąpił błąd!</strong> '.$exception->getMessage().'</p>';
		}
		$this->showPbDownloader();	
	}
	
}