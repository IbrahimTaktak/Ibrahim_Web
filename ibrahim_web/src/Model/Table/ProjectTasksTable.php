<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectTasks Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\TasksTable&\Cake\ORM\Association\BelongsTo $Tasks
 *
 * @method \App\Model\Entity\ProjectTask newEmptyEntity()
 * @method \App\Model\Entity\ProjectTask newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ProjectTask> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectTask get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ProjectTask findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ProjectTask patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ProjectTask> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectTask|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ProjectTask saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectTask>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectTask>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectTask>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectTask> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectTask>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectTask>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectTask>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectTask> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProjectTasksTable extends Table
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

        $this->setTable('project_tasks');
        $this->setDisplayField(['project_id', 'task_id']);
        $this->setPrimaryKey(['project_id', 'task_id']);

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Tasks', [
            'foreignKey' => 'task_id',
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
        $rules->add($rules->existsIn(['task_id'], 'Tasks'), ['errorField' => 'task_id']);

        return $rules;
    }
}
