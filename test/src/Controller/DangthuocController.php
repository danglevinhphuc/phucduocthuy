<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sanpham Controller
 *
 * @property \App\Model\Table\SanphamTable $Sanpham
 */
class DangthuocController extends AppController
{

    public function getDatadangthuoc(){

        $dangthuoc = $this->paginate($this->Dangthuoc);
        return $dangthuoc;
    }
}
