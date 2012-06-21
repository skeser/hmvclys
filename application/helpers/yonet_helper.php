<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function yonetMenu($userID,$uname){
			$yonetMenu['yonet']			 	= anchor('yonet', 'Yonetim Paneli', 'title="Yönetim Ana Sayfa"');
            $yonetMenu['adduser'] 			= anchor('user/userAdd', 'Kullanıcı Ekle', 'title="Kullanıcı Ekle"');
            $yonetMenu['myaccount']			= anchor('user/userEdit/'.$userID.'', 'Hesabım', 'title="Hesabımı Düzenle"');
            $yonetMenu['userLink']			= anchor('user/userEdit/'.$userID.'', ''.$uname.'', 'title="Hesabım"');
			$yonetMenu['test']	 			= anchor('test', 'Test', 'title="Test / Sistem Bilgisi"');
			
			$atts = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
			
			$yonetMenu['modulesConn']	 	= anchor_popup('modul1', 'HMVC Modules Conn', 'title="Modules Connection"', $atts);
			
			$yonetMenu['front']		 		= anchor('#', 'Front', 'title="Site Ana Sayfa"');
			return $yonetMenu;
		}

	/**********************************************************************************************************************************************/
?>