<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reservations Model
 *
 * @method \App\Model\Entity\Reservation newEmptyEntity()
 * @method \App\Model\Entity\Reservation newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Reservation> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reservation get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Reservation findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Reservation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Reservation> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reservation|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Reservation saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Reservation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reservation>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Reservation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reservation> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Reservation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reservation>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Reservation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reservation> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReservationsTable extends Table
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

        $this->setTable('reservations');
        $this->setDisplayField('institution_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('institution_name')
            ->maxLength('institution_name', 255)
            ->requirePresence('institution_name', 'create')
            ->notEmptyString('institution_name');

        $validator
            ->scalar('institution_nationality')
            ->maxLength('institution_nationality', 100)
            ->requirePresence('institution_nationality', 'create')
            ->notEmptyString('institution_nationality');

        $validator
            ->scalar('agent_name')
            ->maxLength('agent_name', 255)
            ->requirePresence('agent_name', 'create')
            ->notEmptyString('agent_name');

        $validator
            ->scalar('contact_person')
            ->maxLength('contact_person', 255)
            ->requirePresence('contact_person', 'create')
            ->notEmptyString('contact_person');

        $validator
            ->scalar('position')
            ->maxLength('position', 100)
            ->requirePresence('position', 'create')
            ->notEmptyString('position');

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('country')
            ->maxLength('country', 100)
            ->requirePresence('country', 'create')
            ->notEmptyString('country');

        $validator
            ->scalar('city')
            ->maxLength('city', 100)
            ->requirePresence('city', 'create')
            ->notEmptyString('city');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 20)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('website')
            ->maxLength('website', 255)
            ->allowEmptyString('website');

        $validator
            ->scalar('participation_type')
            ->requirePresence('participation_type', 'create')
            ->notEmptyString('participation_type');

        $validator
            ->scalar('logo_path')
            ->maxLength('logo_path', 255)
            ->allowEmptyString('logo_path');

        return $validator;
    }
}
