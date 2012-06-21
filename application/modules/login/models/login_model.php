<?
class Login_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	function login_model_test(){
		return "login/login_model/login_model_test() worked";
	}
	/**********************************************************************************************************************/
	/*
	*	user_modul tablosundan userID degeri verilen kullaniciyi bulur.
	*/
	function loginCheck($unameFromUser,$passFromUser){
		$passFromUser =  $this->stdlib->secure_password($passFromUser);	
				
		$this->db->select('userID,uname,upass,logincount');
		$this->db->where('uname',$unameFromUser);
		$query = $this->db->get("user_modul");
				
		if ($query->num_rows() > 0){
			$row = $query->row();
	
			$userIDResultDB		=	$row ->	userID;
			$userResultDB	 	=  	$row -> uname;
			$passResultDB	 	= 	$row -> upass;
			$logincountResultDB =	$row ->	logincount;
		}else{	$userResultDB =  "null";
				$passResultDB =  "null";
		}
		
		if ($userResultDB==$unameFromUser and $passResultDB==$passFromUser ){
			//bilgiler dogru ise..
			$ticket['is_logged_in']	=	true;
			$ticket['userID'] 		= 	$userIDResultDB;
			$ticket['uname'] 		= 	$userResultDB;
			
			$updateArr['logincount']= $logincountResultDB + 1;
			$updateArr['logged_in'] = 1;
					
			$updateTableName	= 'user_modul';
			$primaryKey			= 'userID';
			$primarykeyValue	= $userIDResultDB;	
			
			$ticket['logged_inUpdate']	=	$this->std_db_model->updateTable($updateTableName,$updateArr,$primaryKey,$primarykeyValue);
			
		}else{
				$ticket['is_logged_in']	=	false;
		}
		$ticket['userID']	=	$userIDResultDB; 
		return $ticket;
	}//close:func:loginCheck
	/**********************************************************************************************************************/
	function loginClose($userID){
		$updateTableName	= 'user_modul';
		$updateArr['logged_in']	= 0;
		$primaryKey			= 'userID';
		$primarykeyValue = $userID;
		$loginCloseResult	=	$this->std_db_model->updateTable($updateTableName,$updateArr,$primaryKey,$primarykeyValue);
		return $loginCloseResult;
	}//close:func:loginClose
	/**********************************************************************************************************************/
}
?>