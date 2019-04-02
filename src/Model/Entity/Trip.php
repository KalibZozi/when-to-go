<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Trip Entity
 *
 * @property string $route_id
 * @property string $trip_id
 * @property string|null $service_id
 * @property string|null $trip_headsign
 * @property int|null $direction_id
 * @property string|null $block_id
 * @property string|null $shape_id
 * @property int|null $wheelchair_accessible
 * @property int|null $bikes_allowed
 * @property int|null $boarding_door
 * @property int $data_version
 *
 * @property \App\Model\Entity\Route $route
 */
class Trip extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true
    ];
}
