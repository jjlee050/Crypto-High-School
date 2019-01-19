<?php
/**
 * main page model example
 *
 * */
class Main_Model extends Model {
	public function __construct() {
		parent::__construct();
	}
	public function getData() {
		$sth = $this -> db -> fetchAllAssoc('SELECT test FROM test');
		return $sth;
	}
}
?>