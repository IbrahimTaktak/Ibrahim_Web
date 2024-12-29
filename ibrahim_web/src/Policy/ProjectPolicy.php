<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use App\Model\Entity\Project;
use Authorization\IdentityInterface;

class ProjectPolicy
{
    // Define constants for roles
    const ROLE_ADMIN = 1;
    const ROLE_MANAGER = 2;
    const ROLE_EMPLOYEE = 3;

    public function canAdd(IdentityInterface $user)
    {
        return $user->UserRole === self::ROLE_MANAGER||$user->UserRole === self::ROLE_ADMIN;
    }

    public function canEdit(IdentityInterface $user, Project $project)
    {
        if ($user->UserRole === self::ROLE_MANAGER) {
            return $user->id === $project->	user_id; // Manager can edit their own projects
        }

        return $user->UserRole === self::ROLE_ADMIN; // Admin can edit any project
    }

    public function canDelete(IdentityInterface $user, Project $project)
    {
        if ($user->UserRole === self::ROLE_MANAGER) {
            return $user->id === $project->	user_id; // Manager can delete their own projects
        }

        return $user->UserRole === self::ROLE_ADMIN; // Admin can delete any project
    }

    public function canView(IdentityInterface $user, Project $project)
    {
        if ($user->UserRole === self::ROLE_EMPLOYEE) {
            return in_array($user->id, array_column($project->users, 'id')); // Employee can view projects they belong to
        }

        if ($user->UserRole === self::ROLE_MANAGER) {
            return $user->id === $project->	user_id; // Manager can view their own projects
        }

        return $user->UserRole === self::ROLE_ADMIN; // Admin can view any project
    }

    public function canManageTasks(IdentityInterface $user)
    {
        return $user->UserRole === self::ROLE_ADMIN || $user->UserRole === self::ROLE_MANAGER;
    }
}
