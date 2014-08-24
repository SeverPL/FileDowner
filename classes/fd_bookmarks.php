<?php
/* FileDowner - Bookmarks
 * utworzono 23 sierpnia 2014 10:00
*
* wersja v. 0.2.0 - 23.08.2014 22:19
*
*/

class fd_bookmarks{
	protected $_db = null;
	protected $_bookmarks = null;
	public function __construct($db){
		$this->_db = $db;
	}
	protected function getBookmarks(){
		global $mf_prefix;
		$query = "SELECT * FROM ".$mf_prefix."bookmarks ORDER BY ID DESC";
		$ins = $this->_bookmarks = $this->_db->mf_mysql_query($query);
		if(!$ins){
			throw new Exception('Nie udało się pobrać zakładek !');
		}		
	}
	public function addBookmark($link, $desc){
		global $mf_prefix;
		$query = "INSERT INTO ".$mf_prefix."bookmarks SET `LINK`='$link', `DESC`='$desc'";
		$ins = $this->_db->mf_mysql_query($query);
		if(!$ins){
			throw new Exception('Nie udało dodać się zakładki do bazy danych!');
		}
	}
	protected function deleteBookmark($id){
		global $mf_prefix;
		$query = "DELETE FROM ".$mf_prefix."bookmarks WHERE ID='$id'";
		$ins = $this->_db->mf_mysql_query($query);
		if(!$ins){
			throw new Exception('Nie udało się usunąć zakładki z bazy danych!');
		}
	}
}