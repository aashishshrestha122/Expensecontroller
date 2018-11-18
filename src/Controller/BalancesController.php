<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Balances Controller
 *
 * @property \App\Model\Table\BalancesTable $Balances
 *
 * @method \App\Model\Entity\Balance[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BalancesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $balances = $this->paginate($this->Balances);

        $this->set(compact('balances'));
    }

    /**
     * View method
     *
     * @param string|null $id Balance id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $balance = $this->Balances->get($id, [
            'contain' => ['Expenses']
        ]);

        $this->set('balance', $balance);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $balance = $this->Balances->newEntity();
        if ($this->request->is('post')) {
            $balance = $this->Balances->patchEntity($balance, $this->request->getData());
            if ($this->Balances->save($balance)) {
                $this->Flash->success(__('The balance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The balance could not be saved. Please, try again.'));
        }
        $this->set(compact('balance'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Balance id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $balance = $this->Balances->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $balance = $this->Balances->patchEntity($balance, $this->request->getData());
            if ($this->Balances->save($balance)) {
                $this->Flash->success(__('The balance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The balance could not be saved. Please, try again.'));
        }
        $this->set(compact('balance'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Balance id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $balance = $this->Balances->get($id);
        if ($this->Balances->delete($balance)) {
            $this->Flash->success(__('The balance has been deleted.'));
        } else {
            $this->Flash->error(__('The balance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
