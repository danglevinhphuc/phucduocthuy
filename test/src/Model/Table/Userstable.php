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
class UsersTable extends Table
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

        $this->setTable('users');
        $this->displayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

    }
    public function validationDefault(Validator $validator){
            $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username','Username không tồn tại');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password','Password không tồn tại');

        return $validator;
    }
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }

    
}
