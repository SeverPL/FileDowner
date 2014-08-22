<?php
class mf_downer {
	private $_pliksrc = null; //zrodlo pliku
	private $_plik = null;
	private $_pliknazwa = null; //nazwa pliku
	private $_plikext = null; //rozszerzenie pliku
	
	private $_docelowy_nazwa = null; //nazwa pliku docelowego
	private $_docelowy_path = null; //folder docelowy do zapisania pliku
	private $_docelowy_full_path = null; //zmontowana sciezka do zapisu pliku
	
	private $_direxist = null;
	private $_dirwriteable = null;
	
	private function checkdirectory(){
		$folder = is_dir($this->_docelowy_path);
		$istnieje = file_exists($this->_docelowy_path);
		if($folder==true AND $istnieje==true){
			$this->_direxist =  true;
		}
	}
	
	
	public function getfile($url){
		$this->_docelowy_path = 'downloads/'; //przypisanie docelowego folderu
		$this->_pliksrc = $url; //przypisanie adresu pliku do zmiennej
		$this->_docelowy_nazwa = explode('/', $this->_pliksrc); //rozbicie adresu w celu wydobycia nazwy pliku
		$count = count($this->_docelowy_nazwa); //policzenie dlugosci rozbitego adresu
		$this->_docelowy_nazwa = $this->_docelowy_nazwa[$count-1]; //przypisanie nazwy do zmiennej
		
		$this->_docelowy_full_path = "$this->_docelowy_path".$this->_docelowy_nazwa.""; //zmontowanie docelwoej sciezki
		$this->checkdirectory(); //sprawdzenie czy sciezka docelowa jest katalogiem i czy istnieje
		if($this->_direxist==true){ //jesli istnieje
			$istnieje = file_exists($this->_docelowy_full_path); //sprawdzenie czy plik o takiej nazwie ju¿ istnieje
			if($istnieje==true){ //jestli taki plik juz istnieje
				echo $this->_docelowy_full_path.' - Plik istnieje! <a href="'.$this->_docelowy_full_path.'" target="_blank">zobacz</a><br />';
				for($i=0;$i<=10;$i++){ //wykonanie dziesiêciu prób jeœli plik o tej nazwie istnieje
					$this->_docelowy_nazwa = $i.'_'.$this->_docelowy_nazwa; //dopisanie cyferki przed nazwa pliku
					$this->_docelowy_full_path = "$this->_docelowy_path".$this->_docelowy_nazwa.""; //zmontowanie docelwoej sciezki
					$istnieje = file_exists($this->_docelowy_full_path); //sprawdzenie czy plik o takiej nazwie ju¿ istnieje
					if($istnieje!=true){
						$this->_pliksrc = copy($this->_pliksrc, $this->_docelowy_full_path); //kopiowanie pliku
						if($this->_pliksrc){
							echo 'Kopiowanie zakoñczone! - '.$this->_docelowy_full_path.' <a href="'.$this->_docelowy_full_path.'" target="_blank">zobacz</a><br />';
							break;
						}
					}
					else {
						echo $this->_docelowy_full_path.' - Plik istnieje! <a href="'.$this->_docelowy_full_path.'" target="_blank">zobacz</a><br />';
					}
				}
			}
			else{
				$this->_pliksrc = copy($this->_pliksrc, $this->_docelowy_full_path); //kopiowanie pliku
				if($this->_pliksrc){
					echo 'Kopiowanie zakoñczone! - '.$this->_docelowy_full_path.' <a href="'.$this->_docelowy_full_path.'" target="_blank">zobacz</a> <br />';
				}
			}
		}
	}
}