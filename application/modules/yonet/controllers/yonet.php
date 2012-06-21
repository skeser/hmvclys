<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Yonet extends MX_Controller 
{
    function __construct()
    {
        parent::__construct();
		modules::run('login/login/is_logged_in'); // login check !!
		
		//$this->load->model('user_model');
    }
	
	public function render($view,$data){
		
		$data['sessionData'] = $this->session->all_userdata();
		$userID = $this->session->userdata('userID');
		$uname  = $this->session->userdata('uname');
		$data['yonetMenu'] = yonetMenu($userID,$uname);
		$this->layout->setLayout('/yonet/layout_view');		
		
		$data['header_view'] = $this->load->view('/yonet/header_view',$data,TRUE);
		$data['topmenu_view'] = $this->load->view('/yonet/topmenu_view',$data,TRUE);
		// govde basiliyor. govdenin view'i her modulun'un icinde.
		$data['footer_view'] = $this->load->view('/yonet/footer_view',$data,TRUE);		
		//$data['top_menu_view'] = $this->load->view('admin/menu_admin_view',$data,TRUE);
		
		$this->layout->view($view,$data);
	
	}
	public function yonetTest(){
		echo "yonetTest working";
	}

	public function index()
	{
		$data = array();
		self::render('yonet_view',$data);
	}
	
	/**********************************************************************************************************************/	
	
	
}//close:class:user
