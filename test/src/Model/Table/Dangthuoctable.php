<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;


class DangthuocTable extends Table
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

        $this->setTable('dangthuoc');
        $this->displayField('ma_dang_thuoc');
        $this->primaryKey('ma_dang_thuoc');
        
    }


}
