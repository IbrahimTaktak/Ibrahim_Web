<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Progres Entity
 *
 * @property int $id
 * @property int $task_id
 * @property int $user_id
 * @property string $Description
 * @property \Cake\I18n\Date $Date
 * @property \Cake\I18n\Time $StartTime
 * @property \Cake\I18n\Time $EndTime
 *
 * @property \App\Model\Entity\Task $task
 * @property \App\Model\Entity\User $user
 */
class Progres extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'task_id' => true,
        'user_id' => true,
        'Description' => true,
        'Date' => true,
        'StartTime' => true,
        'EndTime' => true,
        'task' => true,
        'user' => true,
    ];
}
