<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class testlib {
	private $myci;
	function __construct(){
		$this->myci =& get_instance();
	} // construct close
	/**********************************************************************************
	*	lys Print
	**********************************************************************************/
	public function librarytest(){
		return "testlib/librarytest function worked";
	}
	
} //close:testlib

/* End of file testlib.php */
/* Location: ./application/libraries/testlib.php */
?>