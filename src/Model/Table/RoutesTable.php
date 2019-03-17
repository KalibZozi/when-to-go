<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Routes Model
 *
 * @property \App\Model\Table\AgenciesTable|\Cake\ORM\Association\BelongsTo $Agencies
 *
 * @method \App\Model\Entity\Route get($primaryKey, $options = [])
 * @method \App\Model\Entity\Route newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Route[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Route|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Route|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Route patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Route[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Route findOrCreate($search, callable $callback = null, $options = [])
 */
class RoutesTable extends Table
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

        $this->setTable('routes');
        $this->setDisplayField('route_id');
        $this->setPrimaryKey('route_id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
//        $validator
//            ->scalar('route_id')
//            ->maxLength('route_id', 50)
//            ->allowEmptyString('route_id', 'create');
//
//        $validator
//            ->scalar('route_short_name')
//            ->maxLength('route_short_name', 10)
//            ->requirePresence('route_short_name', 'create')
//            ->allowEmptyString('route_short_name', false);
//
//        $validator
//            ->scalar('route_long_name')
//            ->maxLength('route_long_name', 100)
//            ->allowEmptyString('route_long_name');
//
//        $validator
//            ->integer('route_type')
//            ->allowEmptyString('route_type');
//
//        $validator
//            ->scalar('route_desc')
//            ->maxLength('route_desc', 100)
//            ->requirePresence('route_desc', 'create')
//            ->allowEmptyString('route_desc', false);
//
//        $validator
//            ->scalar('route_color')
//            ->maxLength('route_color', 6)
//            ->allowEmptyString('route_color');
//
//        $validator
//            ->scalar('route_text_color')
//            ->maxLength('route_text_color', 6)
//            ->allowEmptyString('route_text_color');

        return $validator;
    }
}
