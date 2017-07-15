<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;


class NhomloaisanphamTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('nhomloaisanpham');
        $this->displayField('ma_nhom_loai_san_pham');
        $this->primaryKey('ma_nhom_loai_san_pham');

    }


}
