<?
class Modul2iki extends MX_Controller{

public function index(){
		echo "Modul 2'nin ikinci controller'inin index'i";
	}

public function method1($var){
		return "Welcome, $var";
	}

public function method2(){
		echo "2. modul 2. method";
	}

public function method3(){
		return TRUE;
	}
}//close:class:Modul2
?>