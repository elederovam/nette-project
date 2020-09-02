<?php declare(strict_types=1);

namespace App\Facade;

use Nette\Security\AuthenticationException;

interface IUserFacade
{
    /**
     * Log in.
     *
     * @param string $password
     * @throws AuthenticationException
     */
    public function login(string $password): void;

    /**
     * Log out.
     */
    public function logout(): void;
}
