<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sanpham Controller
 *
 * @property \App\Model\Table\SanphamTable $Sanpham
 */
class NhomloaisanphamController extends AppController
{

    public function getDatanhomloaisanpham(){

        $Nhomloaisanpham = $this->paginate($this->Nhomloaisanpham);
        return $Nhomloaisanpham;
    }
}
