<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Std_db_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}//close:construct
	/**********************************************************************************************************************/
	/*
	*	Parametre olarak gelen tablodaki kayit sayini bulur
	*/
	function findTableCount ($tableName) {
		return $this->db->count_all_results($tableName);	
	}//close: findTableCount()
	/*
	*	dizi --> tablo insert
	*/
	/**********************************************************************************************************************/
	function insertTable($insertTableName,$insertArr){
		$insertResult = $this->db->insert($insertTableName, $insertArr);
		if ($insertResult == true){
			$insertResult = TRUE;
			//$insertTableResult['mesaj']		= "Veri ekleme işlemi başarılı.(TableInfo : $insertTableName)";
			//$insertTableResult['result']	= TRUE;
		}else{
			$insertResult = FALSE;
			//$insertTableResult['mesaj']		= "Veri ekleme işlemi başarısız!(TableInfo : $insertTableName";
			//$insertTableResult['result']	= FALSE;
		}
		return $insertResult;
	}//close insertTable
	/**********************************************************************************************************************/
	function updateTable($updateTableName,$updateArr,$primaryKey,$primarykeyValue){
		
		$updateResult = $this->db->update($updateTableName,$updateArr, array($primaryKey => $primarykeyValue));
		
		if ($updateResult == true){
			$updateResult = TRUE;
			//$updateTableResult['result']	= TRUE;
//			$updateTableResult['mesaj']		= "Veri güncelleme işlemi başarılı.(TableInfo : $updateTableName)";
		}else{
			$updateResult = FALSE;
			//$updateTableResult['result']	= FALSE;
//			$updateTableResult['mesaj']		= "Veri güncelleme işlemi başarısız!(TableInfo : $updateTableName";
		}
		return 	$updateResult;
		//return $updateTableResultMesaj;
	}//close:func:updateTable
	/**********************************************************************************************************************/
	function deleteRow($tableName,$primaryKey,$primarykeyValue){
		$deleteRowResult = $this->db->delete($tableName, array($primaryKey => $primarykeyValue)); 
		if ($deleteRowResult == true){
			$deleteRowResultMesaj = "Satır silme işlemi başarılı.(TableInfo : $tableName)";
		}else{
			$deleteRowResultMesaj = "Satır silme işlemi başarısız.(TableInfo : $tableName)";
		}
		return $deleteRowResultMesaj;
	}//close:func:updateTable
	/**********************************************************************************************************************/
	function selectTekAlan($tableName,$alanAdi,$primaryKeyName,$primaryKeyValue){
		$this->db->select($alanAdi);
		$this->db->where($primaryKeyName,$primaryKeyValue);
		$query = $this->db->get($tableName);
		
		if($query->num_rows() == 1){
				$row = $query->row();
				$alanAdiValue	=	$row -> $alanAdi;						
		}else{
				$alanAdiValue = FALSE;
		}
		return $alanAdiValue;
				
	}
	/**********************************************************************************************************************/
	function findLastInsertID($tableName){
		$query = $this->db->query("select userID,uname,upass,logincount from lys_user where uname = '".$unameFromUser."'");
	}
	/**********************************************************************************************************************/	
	function std_db_model_test(){
		return "model/std_db_model worked ";
	}
} //close:class:standartdb_model

/* End of file standartdb_model.php	*/
/* Location: ./application/models/standartdb_model.php */
?>