<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StandPositions Model
 *
 * @property \App\Model\Table\StandsTable&\Cake\ORM\Association\BelongsTo $Stands
 *
 * @method \App\Model\Entity\StandPosition newEmptyEntity()
 * @method \App\Model\Entity\StandPosition newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\StandPosition> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StandPosition get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\StandPosition findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\StandPosition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\StandPosition> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\StandPosition|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\StandPosition saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\StandPosition>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\StandPosition>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\StandPosition>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\StandPosition> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\StandPosition>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\StandPosition>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\StandPosition>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\StandPosition> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StandPositionsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('stand_positions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Stands', [
            'foreignKey' => 'stand_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('stand_id')
            ->notEmptyString('stand_id');

        $validator
            ->integer('stand_number')
            ->requirePresence('stand_number', 'create')
            ->notEmptyString('stand_number');

        $validator
            ->numeric('x')
            ->notEmptyString('x');

        $validator
            ->numeric('y')
            ->notEmptyString('y');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->scalar('size')
            ->maxLength('size', 50)
            ->allowEmptyString('size');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['stand_id', 'stand_number']), ['errorField' => 'stand_id']);
        $rules->add($rules->existsIn(['stand_id'], 'Stands'), ['errorField' => 'stand_id']);

        return $rules;
    }
}
