<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectTasksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectTasksTable Test Case
 */
class ProjectTasksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectTasksTable
     */
    protected $ProjectTasks;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ProjectTasks',
        'app.Projects',
        'app.Tasks',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ProjectTasks') ? [] : ['className' => ProjectTasksTable::class];
        $this->ProjectTasks = $this->getTableLocator()->get('ProjectTasks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ProjectTasks);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProjectTasksTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}