<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sanpham Model
 *
 * @method \App\Model\Entity\Sanpham get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sanpham newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sanpham[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sanpham|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sanpham patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sanpham[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sanpham findOrCreate($search, callable $callback = null, $options = [])
 */
class SanphamTable extends Table
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

        $this->setTable('sanpham');
        $this->displayField('id_sp');
        $this->setPrimaryKey('id_sp');

        $this->addBehavior('Timestamp');

        $this->belongsTo('dangthuoc', [
            'foreignKey' => 'ma_dang_thuoc',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('loai', [
            'foreignKey' => 'ma_loai',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('loaibenh', [
            'foreignKey' => 'ma_loai_benh',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('nhomloaisanpham', [
            'foreignKey' => 'ma_nhom_loai_san_pham',
            'joinType' => 'INNER'
        ]);
    }
    public function validationDefault(Validator $validator){
        $validator
            ->requirePresence('ten_thuoc', 'create')
            ->allowEmpty('ten_thuoc');
        $validator
            ->allowEmpty('hinh_sp');

        $validator
            ->allowEmpty('gia_sp');

        $validator
            ->date('han_sd')
            ->allowEmpty('han_sd');

        $validator
            ->allowEmpty('cong_dung');

        $validator
            ->allowEmpty('thanh_phan');

        $validator
            ->allowEmpty('cach_dung');

        $validator
            ->allowEmpty('lieu_luong');

        $validator
            ->allowEmpty('bao_quan');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['ten_thuoc']));
        
        return $rules;
    }
}
