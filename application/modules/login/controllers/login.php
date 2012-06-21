<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MX_Controller{
	
	function __construct(){
		parent::__construct();
		
		//$this->load->library('form_validation');
        //$this->form_validation->CI =& $this;
		
		$this->load->model('login_model');
	}//close:construct
	/**********************************************************************************************************************/
	private function render($view,$data){
	
		$this->layout->setLayout('/yonet/layout_view');		
		
		//$data['header_view'] = $this->load->view('header_view',$data,TRUE);
		$data['footer_view'] = $this->load->view('yonet/footer_view',$data,TRUE);		
		
		//$data['top_menu_view'] = $this->load->view('admin/menu_admin_view',$data,TRUE);
		
		$this->layout->view($view,$data);
	
	}
	/**********************************************************************************************************************/
	public function index(){
	
        if ( $this->session->userdata('is_logged_in') == true)	
			redirect((site_url('yonet')));
		else
			self::login(); // Login fonksiyonuna git
    }
	 public function login(){
		
		$loginRules = array(
            array(
                'field' => 'unameFromUser',
                'label' => 'Kullanici adi',
                'rules' => 'trim|required|min_length[3]|max_length[12]|alpha_numeric|xss_clean'
            ),
            array(
                'field' => 'passFromUser',
                'label' => 'Sifre',
                'rules' => 'trim|required|min_length[4]|max_length[12]|alpha_numeric|xss_clean'
            )
        );
		$this->form_validation->set_rules($loginRules);
		$this->form_validation->set_message('required', 'Kullanıcı Adı yada sifre girilmemis');
		
		
		if ($this->form_validation->run() == FALSE){
			
			$data['validation_errors'] = validation_errors();
			self::render('login_view',$data);
			
			
		}else{
				$unameFromUser = $this->input->post('unameFromUser'); 
				$passFromUser = $this->input->post('passFromUser');
				
				
				$ticket = $this->login_model->loginCheck($unameFromUser,$passFromUser);
				
				if ($ticket['is_logged_in'] == true)
				{
					$this->session->set_userdata('is_logged_in',$ticket['is_logged_in']);

					$this->session->set_userdata('userID',$ticket['userID']);
					$this->session->set_userdata('uname',$ticket['uname']);
					
				
					redirect((site_url('yonet')));	// everythigs are good !! -- > yonetim paneline alalim, buyrun.
				}else{
					// giris sayfasina yönlendir..
					
					redirect((site_url('login')));  // everythigs are bad !! -- > oğlum bak git.
					
				}			
		}
	}//close:func:index
	/**********************************************************************************************************************/
	function logout(){
		$userID	= $this->session->userdata('userID');
		$loginCloseResult	= 	$this->login_model->loginClose($userID);
		if ($loginCloseResult){
			$this->session->sess_destroy();
			redirect('/login');
		}else{
			echo "oturum kapatilamadi.";
			die();
		}
		
	}//close:func:logout
	/**********************************************************************************************************************/
	public function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');//Burada oturumdan is_logged_in değerini çekiyoruz. Eğer true dönerse bir kullanıcı giriş yapmış demektir.
 
		if(!isset($is_logged_in) || $is_logged_in != true)//is_logged_in set edilmiş mi ve set edildi ise değeri true mu? Cevabımız evet ise bu fonksiyon bir problem çıkarmıyor ve yolumuza devam edip sayfamıza erişiyoruz.
		{
			//echo 'Bu sayfaya erisim yetkiniz yok !! Olimcak isler bunlar buyrun burdan --> <a href="login">Giris</a>';//Aksi halde erişim yok uyarısı verip,
			redirect((site_url('login')));
			die();//işlemi durduruyoruz.
		}
	}//close:is_logged_in
	/**********************************************************************************************************************/
}//close:class:login

/* End of file login.php */
/* Location: ./application/controllers/login.php */
?>