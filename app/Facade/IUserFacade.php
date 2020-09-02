<?php declare(strict_types=1);

namespace App\Facade;

interface IUserFacade
{
    public function login(string $password): void;
}
