<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sanpham Controller
 *
 * @property \App\Model\Table\SanphamTable $Sanpham
 */
class LoaibenhController extends AppController
{
	// lay tat ca noi dung cua loai beh trong csdl
    public function getDataloaibenh(){

        $loaibenh = $this->paginate($this->Loaibenh);
        return $loaibenh;
    }
}
