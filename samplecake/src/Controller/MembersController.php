<?php
namespace App\Controller;
 
use App\Controller\AppController;
 
class MembersController extends AppController{


	public function index()
	{
		$this->set('members', $this->paginate($this->Members));
		$this->set('_serialize', ['members']);
	}
 
}
