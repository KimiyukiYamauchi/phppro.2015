<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tunes Controller
 *
 * @property \App\Model\Table\TunesTable $Tunes
 */
class TunesController extends AppController
{

		public function initialize()
		{
			parent::initialize();
			$this->viewBuilder()->layout('toneme');
		}

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Artists', 'Feelings']
        ];
        $tunes = $this->paginate($this->Tunes);

        $this->set(compact('tunes'));
        $this->set('_serialize', ['tunes']);
    }

    /**
     * View method
     *
     * @param string|null $id Tune id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tune = $this->Tunes->get($id, [
            'contain' => ['Artists', 'Feelings']
        ]);

        $this->set('tune', $tune);
        $this->set('_serialize', ['tune']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tune = $this->Tunes->newEntity();
        if ($this->request->is('post')) {
            $tune = $this->Tunes->patchEntity($tune, $this->request->data);
            if ($this->Tunes->save($tune)) {
                $this->Flash->success(__('The tune has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tune could not be saved. Please, try again.'));
            }
        }
        $artists = $this->Tunes->Artists->find('list', ['limit' => 200]);
        $feelings = $this->Tunes->Feelings->find('list', ['limit' => 200]);
        $this->set(compact('tune', 'artists', 'feelings'));
        $this->set('_serialize', ['tune']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tune id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tune = $this->Tunes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tune = $this->Tunes->patchEntity($tune, $this->request->data);
            if ($this->Tunes->save($tune)) {
                $this->Flash->success(__('The tune has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tune could not be saved. Please, try again.'));
            }
        }
        $artists = $this->Tunes->Artists->find('list', ['limit' => 200]);
        $feelings = $this->Tunes->Feelings->find('list', ['limit' => 200]);
        $this->set(compact('tune', 'artists', 'feelings'));
        $this->set('_serialize', ['tune']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tune id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tune = $this->Tunes->get($id);
        if ($this->Tunes->delete($tune)) {
            $this->Flash->success(__('The tune has been deleted.'));
        } else {
            $this->Flash->error(__('The tune could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
