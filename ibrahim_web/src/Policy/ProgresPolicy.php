<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use App\Model\Entity\Progres;
use Authorization\IdentityInterface;

class ProgresPolicy
{
    const ROLE_ADMIN = 1;
    const ROLE_MANAGER = 2;
    const ROLE_EMPLOYEE = 3;

    public function canView(IdentityInterface $user, Progres $Progres)
    {
        if ($user->UserRole === self::ROLE_EMPLOYEE) {
            return $user->id === $Progres->user_id;
        }

        if ($user->UserRole === self::ROLE_MANAGER) {
            return $user->id === $Progres->task->user_id || $user->id === $Progres->user_id;
        }

        return $user->UserRole === self::ROLE_ADMIN;
    }

    public function canAdd(IdentityInterface $user)
    {
        return in_array($user->UserRole, [self::ROLE_ADMIN, self::ROLE_MANAGER, self::ROLE_EMPLOYEE]);
    }

    public function canEdit(IdentityInterface $user, Progres $Progres)
    {
        if ($user->UserRole === self::ROLE_EMPLOYEE) {
            return $user->id === $Progres->user_id;
        }

        if ($user->UserRole === self::ROLE_MANAGER) {
            return $user->id === $Progres->user_id;
        }

        return $user->UserRole === self::ROLE_ADMIN;
    }

    public function canDelete(IdentityInterface $user, Progres $Progres)
    {
        if ($user->UserRole === self::ROLE_EMPLOYEE) {
            return $user->id === $Progres->user_id;
        }

        if ($user->UserRole === self::ROLE_MANAGER) {
            return $user->id === $Progres->user_id;
        }

        return $user->UserRole === self::ROLE_ADMIN;
    }
}
