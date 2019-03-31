<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StopTemps Model
 *
 * @method \App\Model\Entity\StopTemp get($primaryKey, $options = [])
 * @method \App\Model\Entity\StopTemp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StopTemp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StopTemp|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StopTemp|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StopTemp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StopTemp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StopTemp findOrCreate($search, callable $callback = null, $options = [])
 */
class StopTempsTable extends Table
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

        $this->setTable('stop_temps');
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
/*        $validator
            ->scalar('stop_id')
            ->maxLength('stop_id', 50)
            ->allowEmptyString('stop_id', 'create');

        $validator
            ->scalar('stop_name')
            ->maxLength('stop_name', 100)
            ->requirePresence('stop_name', 'create')
            ->allowEmptyString('stop_name', false);

        $validator
            ->numeric('stop_lat')
            ->requirePresence('stop_lat', 'create')
            ->allowEmptyString('stop_lat', false);

        $validator
            ->numeric('stop_lon')
            ->requirePresence('stop_lon', 'create')
            ->allowEmptyString('stop_lon', false);

        $validator
            ->scalar('stop_code')
            ->maxLength('stop_code', 50)
            ->allowEmptyString('stop_code');

        $validator
            ->integer('location_type')
            ->allowEmptyString('location_type');

        $validator
            ->scalar('parent_station')
            ->maxLength('parent_station', 50)
            ->allowEmptyString('parent_station');

        $validator
            ->integer('wheelchair_boarding')
            ->allowEmptyString('wheelchair_boarding');

        $validator
            ->integer('stop_direction')
            ->allowEmptyString('stop_direction');
*/
        return $validator;
    }
}
