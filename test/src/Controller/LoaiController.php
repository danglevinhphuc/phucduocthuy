<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sanpham Controller
 *
 * @property \App\Model\Table\SanphamTable $Sanpham
 */
class LoaiController extends AppController
{

    public function getDataloai(){

        $loai = $this->paginate($this->Loai);
        return $loai;
    }
}
