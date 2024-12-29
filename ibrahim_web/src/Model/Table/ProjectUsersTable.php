<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectUsers Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ProjectUser newEmptyEntity()
 * @method \App\Model\Entity\ProjectUser newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ProjectUser> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectUser get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ProjectUser findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ProjectUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ProjectUser> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectUser|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ProjectUser saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectUser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectUser>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectUser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectUser> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectUser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectUser>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectUser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectUser> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProjectUsersTable extends Table
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

        $this->setTable('project_users');
        $this->setDisplayField(['project_id', 'user_id']);
        $this->setPrimaryKey(['project_id', 'user_id']);

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
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
        $rules->add($rules->existsIn(['project_id'], 'Projects'), ['errorField' => 'project_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
