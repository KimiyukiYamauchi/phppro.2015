<?php
namespace App\Controller;
 
use App\Controller\AppController;
 
class MessagesController extends AppController{


	public function index()
	{
		$this->paginate = [
						'contain' => ['Members']
					];
		$this->set('messages', $this->paginate($this->Messages));
		$this->set('_serialize', ['messages']);
	}

	public function view($id = null)
	{
	}

	public function add()
	{
	}

	public function edit($id = null)
	{
	}

	public function delete($id = null)
	{
	}
 
}
