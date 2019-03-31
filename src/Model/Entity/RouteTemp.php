<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RouteTemp Entity
 *
 * @property string|null $agency_id
 * @property string $route_id
 * @property string $route_short_name
 * @property string|null $route_long_name
 * @property int|null $route_type
 * @property string $route_desc
 * @property string|null $route_color
 * @property string|null $route_text_color
 * @property int $processed
 */
class RouteTemp extends Entity
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
