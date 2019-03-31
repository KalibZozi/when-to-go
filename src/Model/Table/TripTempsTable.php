<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TripTemps Model
 *
 * @property \App\Model\Table\RoutesTable|\Cake\ORM\Association\BelongsTo $Routes
 * @property \App\Model\Table\ServicesTable|\Cake\ORM\Association\BelongsTo $Services
 * @property \App\Model\Table\DirectionsTable|\Cake\ORM\Association\BelongsTo $Directions
 * @property \App\Model\Table\BlocksTable|\Cake\ORM\Association\BelongsTo $Blocks
 * @property \App\Model\Table\ShapesTable|\Cake\ORM\Association\BelongsTo $Shapes
 *
 * @method \App\Model\Entity\TripTemp get($primaryKey, $options = [])
 * @method \App\Model\Entity\TripTemp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TripTemp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TripTemp|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TripTemp|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TripTemp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TripTemp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TripTemp findOrCreate($search, callable $callback = null, $options = [])
 */
class TripTempsTable extends Table
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

        $this->setTable('trip_temps');
        $this->setDisplayField('trip_id');
        $this->setPrimaryKey('trip_id');

//        $this->belongsTo('Routes', [
//            'foreignKey' => 'route_id',
//            'joinType' => 'INNER'
//        ]);
//        $this->belongsTo('Services', [
//            'foreignKey' => 'service_id'
//        ]);
//        $this->belongsTo('Directions', [
//            'foreignKey' => 'direction_id'
//        ]);
//        $this->belongsTo('Blocks', [
//            'foreignKey' => 'block_id'
//        ]);
//        $this->belongsTo('Shapes', [
//            'foreignKey' => 'shape_id'
//        ]);
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
            ->scalar('trip_id')
            ->maxLength('trip_id', 50)
            ->allowEmptyString('trip_id', 'create');

        $validator
            ->scalar('trip_headsign')
            ->maxLength('trip_headsign', 50)
            ->allowEmptyString('trip_headsign');

        $validator
            ->integer('wheelchair_accessible')
            ->allowEmptyString('wheelchair_accessible');

        $validator
            ->integer('bikes_allowed')
            ->allowEmptyString('bikes_allowed');

        $validator
            ->integer('boarding_door')
            ->allowEmptyString('boarding_door');
*/
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
//        $rules->add($rules->existsIn(['route_id'], 'Routes'));
//        $rules->add($rules->existsIn(['service_id'], 'Services'));
//        $rules->add($rules->existsIn(['direction_id'], 'Directions'));
//        $rules->add($rules->existsIn(['block_id'], 'Blocks'));
//        $rules->add($rules->existsIn(['shape_id'], 'Shapes'));

        return $rules;
    }
}
