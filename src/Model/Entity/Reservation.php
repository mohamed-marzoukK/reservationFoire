<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 *
 * @property int $id
 * @property string $institution_name
 * @property string $institution_nationality
 * @property string $agent_name
 * @property string $contact_person
 * @property string $position
 * @property string $address
 * @property string $country
 * @property string $city
 * @property string $phone
 * @property string $email
 * @property string|null $website
 * @property string $participation_type
 * @property string|null $logo_path
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 */
class Reservation extends Entity
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
        'institution_name' => true,
        'institution_nationality' => true,
        'agent_name' => true,
        'contact_person' => true,
        'position' => true,
        'address' => true,
        'country' => true,
        'city' => true,
        'phone' => true,
        'email' => true,
        'website' => true,
        'participation_type' => true,
        'logo_path' => true,
        'created' => true,
        'modified' => true,
    ];
}
