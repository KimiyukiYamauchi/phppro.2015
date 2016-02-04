<?php
namespace App\Controller;

use App\Controller\AppController;

class MembersController extends AppController {

	public function index() {
		$this->set('members', $this->paginate($this->Members));
		$this->set('_serialize', ['members']);
	}

	public function view($id = null)
	{
		$member = $this->Members->get($id, [
								'contain' => ['Messages']
							]);
		$this->set('member', $member);
		$this->set('_serialize', ['member']);
	}

	public function add()
	{
		$member = $this->Members->newEntity();
		if ($this->request->is('post')) {
			$member = $this->Members->patchEntity($member, $this->request->data);
			if ($this->Members->save($member)) {
				$this->Flash->success(__('The member has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The member could not be saved. Please, try again.'));
			}
		}
		$this->set(compact('member'));
		$this->set('_serialize', ['member']);
	}

	public function edit($id = null)
	{
		$member = $this->Members->get($id, [
								'contain' => []
							]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$member = $this->Members->patchEntity($member, 
			$this->request->data);
			if ($this->Members->save($member)) {
				$this->Flash->success(__('The member has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(
				__('The member could not be saved. Please, try again.'));
			}
		}
		$this->set(compact('member'));
		$this->set('_serialize', ['member']);
	}
	public function delete($id = null)
	{
		$person = $this->Members->get($id);
		if ($this->Members->delete($person)) {
			return $this->redirect(['action' => 'index']);
		}
	}
}