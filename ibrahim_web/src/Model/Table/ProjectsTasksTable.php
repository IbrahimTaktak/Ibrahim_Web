<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectsTasks Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\TasksTable&\Cake\ORM\Association\BelongsTo $Tasks
 *
 * @method \App\Model\Entity\ProjectsTask newEmptyEntity()
 * @method \App\Model\Entity\ProjectsTask newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ProjectsTask> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectsTask get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ProjectsTask findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ProjectsTask patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ProjectsTask> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectsTask|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ProjectsTask saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectsTask>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectsTask>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectsTask>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectsTask> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectsTask>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectsTask>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectsTask>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectsTask> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProjectsTasksTable extends Table
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

        $this->setTable('projects_tasks');
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
