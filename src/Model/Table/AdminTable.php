<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Admin Model
 *
 * @method \App\Model\Entity\Admin newEmptyEntity()
 * @method \App\Model\Entity\Admin newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Admin> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Admin get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Admin findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Admin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Admin> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Admin|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Admin saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Admin>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Admin>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Admin>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Admin> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Admin>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Admin>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Admin>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Admin> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AdminTable extends Table
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

        $this->setTable('admin');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->hasMany('Halls', [
            'foreignKey' => 'admin_id',
            'dependent' => true
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
            ->scalar('image')
            ->maxLength('image', 255)
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        $validator
            ->integer('nb_hall')
            ->requirePresence('nb_hall', 'create')
            ->notEmptyString('nb_hall');

        return $validator;
    }
}
