<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property int $id
 * @property string $TaskName
 * @property string $TaskDescription
 * @property string $TaskStatus
 * @property int $user_id
 * @property \Cake\I18n\DateTime $TaskCreatDate
 * @property \Cake\I18n\Date $TaskStartDate
 * @property \Cake\I18n\Date $TaskEndDate
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Progres[] $progress
 * @property \App\Model\Entity\Project[] $projects
 */
class Task extends Entity
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
        'TaskName' => true,
        'TaskDescription' => true,
        'TaskStatus' => true,
        'user_id' => true,
        'TaskCreatDate' => true,
        'TaskStartDate' => true,
        'TaskEndDate' => true,
        'user' => true,
        'progress' => true,
        'projects' => true,
    ];
}
