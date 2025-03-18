<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stands Model
 *
 * @method \App\Model\Entity\Stand newEmptyEntity()
 * @method \App\Model\Entity\Stand newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Stand> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stand get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Stand findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Stand patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Stand> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stand|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Stand saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Stand>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Stand>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Stand>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Stand> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Stand>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Stand>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Stand>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Stand> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StandsTable extends Table
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

        $this->setTable('stands');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

 
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
            ->scalar('image')
            ->maxLength('image', 255)
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        $validator
            ->integer('number_of_stands')
            ->requirePresence('number_of_stands', 'create')
            ->notEmptyString('number_of_stands');

        return $validator;
    }
}
