<?php
namespace App\Model\Table;

use Cake\ORM\Table;

/**
 * Stops Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Stops
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
        $this->setPrimaryKey(['stop_id', 'data_version']);

    }
}
