<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjectUsersFixture
 */
class ProjectUsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'project_id' => 1,
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
