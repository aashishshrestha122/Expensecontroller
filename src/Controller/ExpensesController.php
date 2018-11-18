<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Expenses Controller
 *
 * @property \App\Model\Table\ExpensesTable $Expenses
 *
 * @method \App\Model\Entity\Expense[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExpensesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Balances']
        ];
        $expenses = $this->paginate($this->Expenses);

        $this->set(compact('expenses'));
    }

    /**
     * View method
     *
     * @param string|null $id Expense id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $expense = $this->Expenses->get($id, [
            'contain' => ['Balances']
        ]);

        $this->set('expense', $expense);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
        if ($this->request->is('post')) {
            // debug($this->request->data['data']);die(); 
            foreach ($this->request->data['data'] as $key => $value) {
                $expense = $this->Expenses->newEntity();
                $this->request->data['data'][$key]['balance_id'] = $this->request->data['balance_id'];
                $expense = $this->Expenses->patchEntity($expense, $this->request->data['data'][$key]);
                // debug($this->request->data);
                // debug($this->request->data['data'][$key]);die(); 
                  if ($this->Expenses->save($expense)) {
                  }else{
                    $this->Flash->error(__('The expense could not be saved. Please, try again.'));
                    return false;
                  }
             } 
                $this->Flash->success(__('The expense has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            
        
        $balances = $this->Expenses->Balances->find('list', ['keyField' => 'id', 'valueField' =>'date']);
        $this->set(compact('expense', 'balances'));
        // debug($balances->hydrate(false)->toList());die();
    }

    /**
     * Edit method
     *
     * @param string|null $id Expense id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $expense = $this->Expenses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $expense = $this->Expenses->patchEntity($expense, $this->request->getData());
            if ($this->Expenses->save($expense)) {
                $this->Flash->success(__('The expense has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expense could not be saved. Please, try again.'));
        }
        $balances = $this->Expenses->Balances->find('list', ['limit' => 200]);
        $this->set(compact('expense', 'balances'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Expense id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $expense = $this->Expenses->get($id);
        if ($this->Expenses->delete($expense)) {
            $this->Flash->success(__('The expense has been deleted.'));
        } else {
            $this->Flash->error(__('The expense could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function abc($id = null)
    {
       $query = $this->Expenses->Balances->find()->where(['Balances.id' => $id])->hydrate(false)->first();
       $amount = $query['amount'];

       $this->set('output', $amount);
       $this->set('_serialize', 'output');
       // debug($amount);die();
    }
}
