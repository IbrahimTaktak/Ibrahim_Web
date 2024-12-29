<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use App\Model\Entity\Task;
use Authorization\IdentityInterface;

class TaskPolicy
{
    // Define constants for roles
    const ROLE_ADMIN = 1;
    const ROLE_MANAGER = 2;
    const ROLE_EMPLOYEE = 3;

    public function canAdd(IdentityInterface $user)
    {
        return $user->UserRole === self::ROLE_ADMIN || $user->UserRole === self::ROLE_MANAGER;
    }

    public function canEdit(IdentityInterface $user, Task $task)
    {
        if ($user->UserRole === self::ROLE_MANAGER) {
            return $user->id === $task->user_id; // Manager can edit tasks assigned to them
        }

        return $user->UserRole === self::ROLE_ADMIN; // Admin can edit any task
    }

    public function canDelete(IdentityInterface $user, Task $task)
    {
        if ($user->UserRole === self::ROLE_MANAGER) {
            return $user->id === $task->user_id; // Manager can delete tasks assigned to them
        }

        return $user->UserRole === self::ROLE_ADMIN; // Admin can delete any task
    }

    public function canView(IdentityInterface $user, Task $task)
    {
        if ($user->UserRole === self::ROLE_EMPLOYEE) {
            return true; // Employee can view tasks assigned to them
        }

        if ($user->UserRole === self::ROLE_MANAGER) {
            return $user->UserRole === self::ROLE_MANAGER; // Manager can view tasks assigned to them
        }

        return $user->UserRole === self::ROLE_ADMIN; // Admin can view any task
    }
}
