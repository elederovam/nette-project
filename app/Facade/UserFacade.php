<?php declare(strict_types=1);

namespace App\Facade;

use Nette\Security\AuthenticationException;
use Nette\Security\User;

class UserFacade implements IUserFacade
{
    /**
     * @var User
     */
    private $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Log in.
     *
     * @param string $password
     * @throws AuthenticationException
     */
    public function login(string $password): void
    {
        $this->user->login($password);
    }

    /**
     * Log out.
     */
    public function logout(): void
    {
        $this->user->logout();
    }
}
