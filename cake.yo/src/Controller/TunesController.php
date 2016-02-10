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

		function search() {
			$aopts = $this->Tunes->Artists->find('list');
			$aopts = $aopts->toArray();
			//debug($aopts);
			$aopts['0'] = '指定しない';
			ksort($aopts);
			$this->set('artists', $aopts);

			$fopts = $this->Tunes->Feelings->find('list');
			$fopts = $fopts->toArray();
			$fopts['0'] = '指定しない';
			ksort($fopts);
			$this->set('feelings', $fopts);

			$query = $this->Tunes->find()
				->contain(['Artists', 'Feelings']);

			$cond = array();	//	検索条件を作る
			//debug($this->request->data);
			if(!empty($this->request->data)){
				if($this->request->data['name'] != ''){
					$tn = preg_replace('/([_%#])/u', '#$1', $this->request->data['name']);
					debug($tn);
					$query = $query->where(["Tunes.name like " => '%' . $tn . '%']);
				}
				if(!empty($this->request->data['artist_id'])){
					debug($this->request->data['artist_id']);
					$query = $query->where(['Tunes.artist_id' => $this->request->data['artist_id']]);
				}
				if(!empty($this->request->data['feeling_id'])){
					debug($this->request->data['feeling_id']);
					$query 
						= $query->where(['Tunes.feeling_id' => $this->request->data['feeling_id']]);
				}
			}

			$tunes = $query->order(['Tunes.id' => 'ASC']);

			$this->set(compact('tunes'));
			$this->set('_serialize', ['tunes']);
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