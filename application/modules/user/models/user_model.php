<?
class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	function user_model_test(){
		return "user/user_model/user_model_test() worked";
	}
	/**********************************************************************************************************************/
	/*
	*	user_model tablosundan userID degeri verilen kullaniciyi bulur.
	*/
	function getUser($userID){
		$this->db->select('userID,ad,soyad,email,ceptel,uname,upass');
		$this->db->where('userID',$userID);
		$query = $this->db->get("user_modul");
		if($query->num_rows() == 1){
				$row = $query->row();
				$userObj['userID']	=	$row -> userID;
				$userObj['ad']		=	$row -> ad;
				$userObj['soyad']	=	$row ->	soyad;
				$userObj['email']	=	$row -> email;
				$userObj['ceptel']	=	$row -> ceptel;
				$userObj['uname']	=	$row -> uname;
		}else{
				$userObj = FALSE;
		}
		return $userObj;
	}//close:func:getUser
	/**********************************************************************************************************************/
}
?>