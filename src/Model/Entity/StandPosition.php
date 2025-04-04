<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StandPosition Entity
 *
 * @property int $id
 * @property int $stand_id
 * @property int $stand_number
 * @property float $x
 * @property float $y
 * @property string|null $name
 * @property string|null $size
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Stand $stand
 */
class StandPosition extends Entity
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
        'stand_id' => true,
        'stand_number' => true,
        'x' => true,
        'y' => true,
        'name' => true,
        'size' => true,
        'created' => true,
        'modified' => true,
        'stand' => true,
    ];
}
