<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stops Model
 *
 * @method \App\Model\Entity\Stop get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stop newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Stop[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stop|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stop|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stop patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stop[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stop findOrCreate($search, callable $callback = null, $options = [])
 */
class StopsTable extends Table
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

        $this->setTable('stops');
        $this->setDisplayField('stop_id');
        $this->setPrimaryKey('stop_id');
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
//            ->integer('stop_id')
//            ->allowEmptyString('stop_id', 'create');
//
//        $validator
//            ->scalar('stop_name')
//            ->maxLength('stop_name', 100)
//            ->requirePresence('stop_name', 'create')
//            ->allowEmptyString('stop_name', false);
//
//        $validator
//            ->numeric('stop_lat')
//            ->requirePresence('stop_lat', 'create')
//            ->allowEmptyString('stop_lat', false);
//
//        $validator
//            ->numeric('stop_lon')
//            ->requirePresence('stop_lon', 'create')
//            ->allowEmptyString('stop_lon', false);
//
//        $validator
//            ->scalar('stop_code')
//            ->maxLength('stop_code', 50)
//            ->requirePresence('stop_code', 'create')
//            ->allowEmptyString('stop_code', false);
//
//        $validator
//            ->integer('location_type')
//            ->requirePresence('location_type', 'create')
//            ->allowEmptyString('location_type', false);
//
//        $validator
//            ->scalar('parent_station')
//            ->maxLength('parent_station', 50)
//            ->requirePresence('parent_station', 'create')
//            ->allowEmptyString('parent_station', false);
//
//        $validator
//            ->integer('wheelchair_boarding')
//            ->requirePresence('wheelchair_boarding', 'create')
//            ->allowEmptyString('wheelchair_boarding', false);
//
//        $validator
//            ->integer('stop_direction')
//            ->requirePresence('stop_direction', 'create')
//            ->allowEmptyString('stop_direction', false);

        return $validator;
    }
}
