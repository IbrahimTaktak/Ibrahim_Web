<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectUsersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectUsersTable Test Case
 */
class ProjectUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectUsersTable
     */
    protected $ProjectUsers;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ProjectUsers',
        'app.Projects',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ProjectUsers') ? [] : ['className' => ProjectUsersTable::class];
        $this->ProjectUsers = $this->getTableLocator()->get('ProjectUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ProjectUsers);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProjectUsersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
