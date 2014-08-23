<?php
/* FileDowner - Bookmarks
 * utworzono 23 sierpnia 2014 10:00
*
* wersja v. 0.1.0 - 23.08.2014 10:00
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
		$this->_bookmarks = $this->_db->mf_mysql_query($query);		
	}
	protected function addBookmark($link, $desc){
		global $mf_prefix;
		$query = "INSERT INTO ".$mf_prefix."bookmarks SET `LINK`='$link', `DESC`='$desc'";
		$this->_db->mf_mysql_query($query);
	}
	protected function deleteBookmark(){
		
	}
}