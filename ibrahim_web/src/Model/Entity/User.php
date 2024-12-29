<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;


/**
 * User Entity
 *
 * @property int $id
 * @property string $UserName
 * @property string $UserEmail
 * @property string $UserPassWord
 * @property int $UserRole
 *
 * @property \App\Model\Entity\Progres[] $progress
 * @property \App\Model\Entity\Project[] $projects
 * @property \App\Model\Entity\Task[] $tasks
 */
class User extends Entity
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
        'UserName' => true,
        'email' => true,
        'password' => true,
        'UserRole' => true,
        'progress' => true,
        'projects' => true,
        'tasks' => true,
    ];
    protected function _setPassword(string $password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }
    
}
