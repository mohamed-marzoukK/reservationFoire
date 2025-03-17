<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stand Entity
 *
 * @property int $id
 * @property string $name
 * @property int $x1
 * @property int $y1
 * @property int $x2
 * @property int $y2
 * @property int $width
 * @property int $height
 * @property int $angle
 * @property \Cake\I18n\DateTime $created_at
 * @property \Cake\I18n\DateTime $updated_at
 */
class Stand extends Entity
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
        'name' => true,
        'x1' => true,
        'y1' => true,
        'x2' => true,
        'y2' => true,
        'width' => true,
        'height' => true,
        'angle' => true,
        'created_at' => true,
        'updated_at' => true,
    ];
}
