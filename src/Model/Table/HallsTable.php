<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class HallsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('halls');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Admin', [
            'foreignKey' => 'admin_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
        ->numeric('x_percent')
        ->range('x_percent', [0, 100])
        
        ->numeric('y_percent')
        ->range('y_percent', [0, 100])
        
        ->numeric('width_percent')
        ->range('width_percent', [1, 100])
        
        ->numeric('height_percent')
        ->range('height_percent', [1, 100]);

    return $validator;
    }
}