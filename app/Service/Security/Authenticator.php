<?php declare(strict_types=1);

namespace App\Service\Security;

use Nette\Security\AuthenticationException;
use Nette\Security\IAuthenticator;
use Nette\Security\Identity;
use Nette\Security\IIdentity;

class Authenticator implements IAuthenticator
{
    function authenticate(array $credentials): IIdentity
    {
        $password = $credentials[0];
        if ($password === 'liquiddesign') {
            $id = rand();
            return new Identity($id);
        }

        throw new AuthenticationException('invalid password');
    }
}
