<?
class Modul1 extends MX_Controller{
	
public function index(){
	
		//modul1'den modul2 icindeki modul2 controller'ina baglanti..
		$parametre = "modul1 den modul2'nin method1'ine gonderilen parametre okudugunuz bu metin.";
		echo modules::run('modul2/modul2/index')."<br>";
		echo modules::run('modul2/modul2/method2')."<br>";
		echo modules::run('modul2/modul2/method1',$parametre)."<br>";
		//modul1'den modul2 icindeki modul2iki controller'ina baglanti..
		$parametre2 = "modul1 den modul2'nin modul2iki controller'ininin method1'ine gonderilen parametre okudugunuz bu metin.";
		echo modules::run('modul2/modul2iki/index')."<br>";
		echo modules::run('modul2/modul2iki/method1',$parametre2)."<br>";
		
		// kontrol ..
		if ( modules::run('modul2/modul2/method3') === TRUE ) echo "modul2/modul2/method3 den TRUE geldi."."<br>";
		
		//modul1/models/modul1model den veri cekmek..
		 $this->load->model('modul1/modul1model_model'); // path de yolu verilen model dosyasi yukleniyor.
		 echo $this->modul1model_model->test()."<br>";   // veri çekiliyor .. 
		 echo "run metodu ile".modules::run('modul1/modul1model_model/test')."<br>";
		 
		 // modul2 deki model dosyasinden veri getirliyor . tabe once load edilecek...
		 // baska bir modul altindaki modelden veri çekmek.
		 $this->load->model('modul2/modul2model_model'); // path de yolu verilen model dosyasi yukleniyor.
		 echo $this->modul2model_model->test()."<br>";   // veri çekiliyor .. 
		 
		 // helper'den fonksiyon cagarmak..
		 $this->load->helper('test_helper');	// load et.
		 echo helpertest()."<br>";				// assil gelsin.
		 
		 // library'den fonksiyon cagarmak
		 $this->load->library('testlib'); 	// load et.
		 echo $this->testlib->librarytest()."<br>";
		 
		 //model'den fonksiyon cagarmak
		 $this->load->model('std_db_model');
		 echo $this->std_db_model->std_db_model_test()."<br>";
		 

	}
}
?>