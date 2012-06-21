<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Stdlib {
	private $CI;
	function __construct(){
		$this->CI =& get_instance();
	} // construct close
	/**********************************************************************************
	*	stdlib - Standart Library
	**********************************************************************************/
	public function stdlibTest(){
		return "Stdlib/stdlibTest function worked";
	}
	/*********************************************************************************/
	public function secure_password($pass){
		return md5("kullanic_oturum_" . md5($pass) . "_ds785667f5e67w423yjgty");
	}
	/*********************************************************************************/
	//public function renderFront(){
//	}//close:func:renderPublic
//	/*********************************************************************************/
//	public function renderYonet($view,$data){
//		$CI->layout->setLayout('modules/yonet/layout_view');		
//		
//		//$data['header_view'] = $this->load->view('header_view',$data,TRUE);
//		$data['footer_view'] = $CI->load->view('modules/yonet/footer_view',$data,TRUE);		
//		
//		//$data['top_menu_view'] = $this->load->view('admin/menu_admin_view',$data,TRUE);
//		
//		$CI->layout->view($view,$data);
//	}//close:func:renderPrivate
	/*********************************************************************************/

} //close:testlib

/* End of file stdlib.php */
/* Location: ./application/libraries/stdlib.php */
?>