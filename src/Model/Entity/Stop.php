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
 * @property string|null $stop_code
 * @property int|null $location_type
 * @property string|null $parent_station
 * @property int|null $wheelchair_boarding
 * @property int|null $stop_direction
 * @property int $data_version
 */
class Stop extends Entity
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
