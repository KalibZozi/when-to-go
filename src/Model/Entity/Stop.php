<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stop Entity
 *
 * @property string $stop_id
 * @property string $stop_name
 * @property float $stop_lat
 * @property float $stop_lon
 * @property string $stop_code
 * @property int $location_type
 * @property string $parent_station
 * @property int $wheelchair_boarding
 * @property int $stop_direction
 */
class Stop extends Entity
{
    const NAME = 'Stop';

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
