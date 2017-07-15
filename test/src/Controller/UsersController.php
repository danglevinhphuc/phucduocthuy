<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sanpham Controller
 *
 * @property \App\Model\Table\SanphamTable $Sanpham
 */
class UsersController extends AppController
{
	public function isAuthorized(){
        return true;
    }
    public function initialize()
	{
    	parent::initialize();
    	
    	$this->Auth->allow(['logout']);
	}
	public function login(){
		
		if ($this->request->is('post')) {

			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				$this->Flash->success('Đăng nhập thành công !!!');
                return $this->redirect($this->redirect(['controller'=>'sanpham','action' => 'home']));
			}
			$this->Flash->error('Đăng nhập thất bại'); 
		}
	}
	public function logout()
    {
        $this->Flash->success('Đăng xuất thành công !!!');
        return $this->redirect($this->Auth->logout());
    }
}
