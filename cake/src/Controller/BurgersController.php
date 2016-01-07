<?php
namespace App\Controller;

use App\Controller\AppController;

class BurgersController extends AppController {
	function index(){
		if($this->Burgers != null){
			$this->set('burgers', $this->Burgers->find('all'));
			//var_dump($burgers);
		}else{
			echo '$this->Burgers is null!!!';
		}	

		/*$this->autoRender = false;
		echo "<html><head></head><body>";
		echo "<h1>Hello!</h1>";
		echo "<p>これは、サンプルで作成したページです。</p>";
		echo "</body></html>";*/
	}
}
