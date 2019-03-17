<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trips Model
 *
 * @property \App\Model\Table\RoutesTable|\Cake\ORM\Association\BelongsTo $Routes
 * @property \App\Model\Table\ServicesTable|\Cake\ORM\Association\BelongsTo $Services
 * @property \App\Model\Table\DirectionsTable|\Cake\ORM\Association\BelongsTo $Directions
 * @property \App\Model\Table\BlocksTable|\Cake\ORM\Association\BelongsTo $Blocks
 * @property \App\Model\Table\ShapesTable|\Cake\ORM\Association\BelongsTo $Shapes
 *
 * @method \App\Model\Entity\Trip get($primaryKey, $options = [])
 * @method \App\Model\Entity\Trip newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Trip[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Trip|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trip|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trip patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Trip[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Trip findOrCreate($search, callable $callback = null, $options = [])
 */
class TripsTable extends Table
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

        $this->setTable('trips');
        $this->setDisplayField('trip_id');
        $this->setPrimaryKey('trip_id');

        $this->belongsTo('Routes', [
            'foreignKey' => 'route_id',
            'joinType' => 'INNER'
        ]);
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
//            ->scalar('trip_id')
//            ->maxLength('trip_id', 50)
//            ->allowEmptyString('trip_id', 'create');
//
//        $validator
//            ->scalar('trip_headsign')
//            ->maxLength('trip_headsign', 50)
//            ->allowEmptyString('trip_headsign');
//
//        $validator
//            ->integer('wheelchair_accessible')
//            ->allowEmptyString('wheelchair_accessible');
//
//        $validator
//            ->integer('bikes_allowed')
//            ->allowEmptyString('bikes_allowed');
//
//        $validator
//            ->integer('boarding_door')
//            ->allowEmptyString('boarding_door');

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
        $rules->add($rules->existsIn(['route_id'], 'Routes'));

        return $rules;
    }
}
