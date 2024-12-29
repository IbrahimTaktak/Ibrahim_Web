<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjectsFixture
 */
class ProjectsFixture extends TestFixture
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
                'id' => 1,
                'ProjectName' => 'Lorem ipsum dolor sit amet',
                'ProjectDescription' => 'Lorem ipsum dolor sit amet',
                'ProjectStatus' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'ProjectCreatDate' => '2024-06-16 16:36:52',
                'ProjectStartDate' => '2024-06-16',
                'ProjectEndDate' => '2024-06-16',
            ],
        ];
        parent::init();
    }
}
