<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MX_Controller 
{
    function __construct()
    {
        parent::__construct();
		modules::run('login/login/is_logged_in'); // login check !!
		
		//if(! $this->hmvc_auth->is_admin()) exit('Admin degilsiniz!');
		//
		
       
        //$this->load->library('form_validation');
        //$this->form_validation->CI =& $this;
		$this->load->model('user_model');
    }
	
	private function render($view,$data){
		
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

	public function index()
	{
		$data = array();
		self::render('user_add_form_view',$data);
	}
	
	/**********************************************************************************************************************/	
	function userAdd(){
		$loginRules = array(
            array(
                'field' => 'ad',
                'label' => 'Ad',
                'rules' => 'trim|required|min_length[3]|max_length[30]|alpha_numeric|xss_clean'
            ),
            array(
                'field' => 'soyad',
                'label' => 'Soyad',
                'rules' => 'trim|required|min_length[4]|max_length[30]|alpha_numeric|xss_clean'
            ),
			array(
                'field' => 'email',
                'label' => 'Kullanici adi',
                'rules' => 'trim|required|min_length[3]|max_length[50]|valid_email|xss_clean'
            ),
			array(
                'field' => 'uname',
                'label' => 'Kullanici adi',
                'rules' => 'trim|required|min_length[3]|max_length[20]|xss_clean'
            ),
			array(
                'field' => 'upass',
                'label' => 'Kullanici adi',
                'rules' => 'trim|required|min_length[3]|max_length[20]|xss_clean|matches[upassCheck]'
            ),
			array(
                'field' => 'upassCheck',
                'label' => 'Kullanici adi',
                'rules' => 'trim|required|min_length[3]|max_length[12]|xss_clean'
            )
        );
		$this->form_validation->set_rules($loginRules);
		$this->form_validation->set_message('required', 'zorunlu alanlar girilmemiş.');
		$this->form_validation->set_message('matches', 'Parolalar eşleşmiyor.');
        $this->form_validation->set_message('valid_email', 'Geçerli email adresi giriniz.');
			
		if ($this->form_validation->run() == FALSE)
		{
			//$this->smarty->assign("validation_errors",validation_errors());
			$data['validation_errors'] = validation_errors();
			self::render('user_add_form_view',$data);
			
		}
		else{
		  $userAddFormData['ad']			= $this->input->post('ad');
		  $userAddFormData['soyad']		= $this->input->post('soyad');
		  $userAddFormData['email']		= $this->input->post('email');
		  $userAddFormData['ceptel']		= $this->input->post('ceptel');
		  $userAddFormData['uname']		= $this->input->post('uname');
		  $upass		= $this->input->post('upass');
		  $upassCheck	= $this->input->post('upassCheck');
		  $userAddFormData['tarih'] = mdate("%Y-%m-%d",time());
		  $userAddFormData['saat']  = mdate("%H:%i:%s",time());
  //		$userAddFormData['registerIp'] = $_SERVER['REMOTE_ADDR']; 
  //		$userAddFormData['registerHost'] = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		  $userAddFormData['registerIp'] = 00; 
		  $userAddFormData['registerHost'] = 00;
  
		  if ($upass === $upassCheck){
				  $userAddFormData['upass'] = $this->stdlib->secure_password($upass);
			  }else{
				  die(); // password doesn't match 
			  }
		  
		  $data['userAddFormData'] = $userAddFormData;
		  // 1-sifreyi md5 le yada sha1 ile üzenle,
		  // 2-veri tabanina kayit yap,
		  $insertTableName	= "user_modul";
		  $insertArr			= $userAddFormData;
		  if( $this->std_db_model->insertTable($insertTableName,$insertArr) ){
			  $data['result'] = "kullancı eklendi.";
		  }else{
			  $data['result'] = "kullancı eklenemedi !!";
		  }
		  // 3-Mesajı yazdır.
		  self::render('user_add_form_result_view',$data);   
		}

	}//close:func
	/**********************************************************************************************************************/
	/*
	*	User Edit
	*/
	function userEdit($userID){
		//$userID = 1;
		
		$data['userObj'] = $this->user_model->getUser($userID);
		// butona basilmis ise, update islemini yap, tekrar formu doldur.
		$editButton = $this->input->post('userEditButton');
		if ( !empty($editButton)){

			$updateArr['ad'] 		= $this->input->post('ad');
			$updateArr['soyad'] 	= $this->input->post('soyad');
			$updateArr['email'] 	= $this->input->post('email');
			$updateArr['ceptel'] 	= $this->input->post('ceptel');
			$updateArr['upass']		= $this->stdlib->secure_password($this->input->post('upass'));
			
			$updateTableName = "user_modul";
			$primaryKey 	 = "userID";
			$primarykeyValue = $userID;
			
			if( $this->std_db_model->updateTable($updateTableName,$updateArr,$primaryKey,$primarykeyValue) ){
			$data['result'] = "kullancı bilgileri güncellendi.";
		}else{
			$data['result'] = "kullancı bilgileri güncellenemedi !!";
		}
			$data['userObj'] = $this->user_model->getUser($userID); // formu tazele..
		}
		
		self::render('user_edit_form_view',$data);
		
	}
	/**********************************************************************************************************************/
	
}//close:class:user
