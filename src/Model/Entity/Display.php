<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Display Entity
 *
 * @property int $id
 * @property int|null $device_id
 * @property int|null $line_no
 * @property string|null $stop_id
 * @property string|null $route_id
 * @property int|null $direction
 * @property string|null $headsign
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $active
 *
 * @property \App\Model\Entity\Device $device
 * @property \App\Model\Entity\Stop $stop
 * @property \App\Model\Entity\Route $route
 */
class Display extends Entity
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
        'device_id' => true,
        'line_no' => true,
        'stop_id' => true,
        'route_id' => true,
        'direction' => true,
        'headsign' => true,
        'created' => true,
        'modified' => true,
        'active' => true,
        'device' => true,
        'stop' => true,
        'route' => true
    ];
}
