// src/Authentication/AppIdentity.php

namespace App\Authentication;

use Authentication\Identity\IdentityInterface;

class AppIdentity implements IdentityInterface
{
    protected string $id;
    protected string $username;
    protected string $role;

    public function __construct(string $id, string $username, string $role)
    {
        $this->id = $id;
        $this->username = $username;
        $this->role = $role;
    }

    public function getIdentifier()
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getRole(): string
    {
        return $this->role;
    }
}
