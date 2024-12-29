<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use Authorization\IdentityInterface;
use Authorization\Policy\Result;

class UserPolicy
{
    // Define constants for roles
    const ROLE_ADMIN = 1;
    const ROLE_MANAGER = 2;
    const ROLE_EMPLOYEE = 3;

    
    public function canAdd(IdentityInterface $user, User $resource)
    {
        return $user->UserRole === self::ROLE_ADMIN;
    }

    public function canEdit(IdentityInterface $user, User $resource)
    {
        if ($user->UserRole === self::ROLE_EMPLOYEE) {
            return $user->id === $resource->id ; // Employee can edit themselves only
        }

        if ($user->UserRole === self::ROLE_MANAGER) {
            return $user->id === $resource->id ;
        }

        if ($user->UserRole === self::ROLE_ADMIN) {
            return $user->id === $resource->id || $resource->UserRole !== self::ROLE_ADMIN; // Admin can edit themselves or non-admin users
        }

        return false; // Default deny
    }

    public function canDelete(IdentityInterface $user, User $resource)
    {
        if ($user->UserRole === self::ROLE_ADMIN) {
            return $user->id === $resource->id || $resource->UserRole !== self::ROLE_ADMIN; // Admin can delete themselves but not other admins
        }

        return false; // Default deny
    }

    public function canView(IdentityInterface $user, User $resource)
    {
        if ($user->UserRole === self::ROLE_EMPLOYEE) {
            return $user->id === $resource->id ; // Employee can edit themselves only
        }

        if ($user->UserRole === self::ROLE_MANAGER) {
            return $user->id === $resource->id ;
        }

        if ($user->UserRole === self::ROLE_ADMIN) {
            return true; // Admin can view all users
        }

        return false; // Default deny
    }

    public function canManageProjects(IdentityInterface $user)
    {
        return in_array($user->UserRole, [self::ROLE_ADMIN, self::ROLE_MANAGER]);
    }

    public function canManageTasks(IdentityInterface $user)
    {
        return in_array($user->UserRole, [self::ROLE_ADMIN, self::ROLE_MANAGER]);
    }

    public function canManageProgress(IdentityInterface $user)
    {
        return in_array($user->UserRole, [self::ROLE_ADMIN, self::ROLE_MANAGER, self::ROLE_EMPLOYEE]);
    }
}
