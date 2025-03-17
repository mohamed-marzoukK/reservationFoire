<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ZonesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('zones');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Admin', [
            'foreignKey' => 'admin_id',
            'className' => 'Admin',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('admin_id')
            ->requirePresence('admin_id', 'create')
            ->notEmptyString('admin_id');

        $validator
            ->decimal('x_percent', null, ['precision' => 2])
            ->requirePresence('x_percent', 'create')
            ->notEmptyString('x_percent')
            ->greaterThanOrEqual(0)
            ->lessThanOrEqual(100);

        $validator
            ->decimal('y_percent', null, ['precision' => 2])
            ->requirePresence('y_percent', 'create')
            ->notEmptyString('y_percent')
            ->greaterThanOrEqual(0)
            ->lessThanOrEqual(100);

        $validator
            ->decimal('width_percent', null, ['precision' => 2])
            ->requirePresence('width_percent', 'create')
            ->notEmptyString('width_percent')
            ->greaterThan(0)
            ->lessThanOrEqual(100);

        $validator
            ->decimal('height_percent', null, ['precision' => 2])
            ->requirePresence('height_percent', 'create')
            ->notEmptyString('height_percent')
            ->greaterThan(0)
            ->lessThanOrEqual(100);

        $validator
            ->decimal('rotation_degrees', null, ['precision' => 2])
            ->requirePresence('rotation_degrees', 'create')
            ->notEmptyString('rotation_degrees')
            ->greaterThanOrEqual(-360)
            ->lessThanOrEqual(360);

        return $validator;
    }
}