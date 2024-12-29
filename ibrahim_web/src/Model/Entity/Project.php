<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $ProjectName
 * @property string $ProjectDescription
 * @property string $ProjectStatus
 * @property int $user_id
 * @property \Cake\I18n\DateTime $ProjectCreatDate
 * @property \Cake\I18n\Date $ProjectStartDate
 * @property \Cake\I18n\Date $ProjectEndDate
 *
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Task[] $tasks
 */
class Project extends Entity
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
        'ProjectName' => true,
        'ProjectDescription' => true,
        'ProjectStatus' => true,
        'user_id' => true,
        'ProjectCreatDate' => true,
        'ProjectStartDate' => true,
        'ProjectEndDate' => true,
        'users' => true,
        'tasks' => true,
    ];
}
