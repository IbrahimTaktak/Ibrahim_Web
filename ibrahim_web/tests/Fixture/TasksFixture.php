<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TasksFixture
 */
class TasksFixture extends TestFixture
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
                'TaskName' => 'Lorem ipsum dolor sit amet',
                'TaskDescription' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'TaskStatus' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'TaskCreatDate' => '2024-06-16 16:36:42',
                'TaskStartDate' => '2024-06-16',
                'TaskEndDate' => '2024-06-16',
            ],
        ];
        parent::init();
    }
}
