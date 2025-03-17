<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Zone Entity
 *
 * @property int $id
 * @property int|null $admin_id
 * @property string|null $x_percent
 * @property string|null $y_percent
 * @property string|null $width_percent
 * @property string|null $height_percent
 * @property string|null $rotation_degrees
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Admin $admin
 */
class Zone extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'admin_id' => true,
        'x_percent' => true,
        'y_percent' => true,
        'width_percent' => true,
        'height_percent' => true,
        'rotation_degrees' => true,
        'created' => true,
        'modified' => true,
        'admin' => true,
    ];
}
