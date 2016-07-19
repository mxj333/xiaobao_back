<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Catalogs Controller
 *
 * @property \App\Model\Table\CatalogsTable $Catalogs
 */
class CatalogsController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }


    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentCatalogs']
        ];
        $this->set('catalogs', $this->paginate($this->Catalogs));
        $this->set('_serialize', ['catalogs']);
    }

    /**
     * View method
     *
     * @param string|null $id Catalog id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $catalog = $this->Catalogs->get($id, [
    //         'contain' => ['ParentCatalogs', 'ChildCatalogs', 'Subject']
    //     ]);
    //     $this->set('catalog', $catalog);
    //     $this->set('_serialize', ['catalog']);
    // }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $catalog = $this->Catalogs->newEntity();
        if ($this->request->is('post')) {
            // echo htmlentities( nl2br($this->request->data['name']) );

            $names = explode('<br />', nl2br($this->request->data['name']));
            foreach($names as $name) {
                $catalog = $this->Catalogs->newEntity();
                $this->request->data['name'] = trim($name);
                $catalog = $this->Catalogs->patchEntity($catalog, $this->request->data);
                $rtl = $this->Catalogs->save($catalog);
            }
            if ($rtl) {
                $this->Flash->success(__('The catalog has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The catalog could not be saved. Please, try again.'));
            }
        }
        // $parentCatalogs = $this->Catalogs->ParentCatalogs->find('list', ['limit' => 200]);
        $parentCatalogs =$this->Catalogs->ParentCatalogs->find('treeList', ['spacer' => '----']);
        foreach ($parentCatalogs as $key => $value) {
            pr($value);
        };
        // $this->set(compact('categories'));

        $this->set(compact('catalog', 'parentCatalogs'));
        $this->set('_serialize', ['catalog']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Catalog id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $catalog = $this->Catalogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $catalog = $this->Catalogs->patchEntity($catalog, $this->request->data);
            if ($this->Catalogs->save($catalog)) {
                $this->Flash->success(__('The catalog has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The catalog could not be saved. Please, try again.'));
            }
        }
        // $parentCatalogs = $this->Catalogs->ParentCatalogs->find('list', ['limit' => 200]);
        $parentCatalogs =$this->Catalogs->ParentCatalogs->find('treeList', ['spacer' => '----']);
        $this->set(compact('catalog', 'parentCatalogs'));
        $this->set('_serialize', ['catalog']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Catalog id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $catalog = $this->Catalogs->get($id);
        if ($this->Catalogs->delete($catalog)) {
            $this->Flash->success(__('The catalog has been deleted.'));
        } else {
            $this->Flash->error(__('The catalog could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
