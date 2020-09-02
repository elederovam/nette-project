<?php declare(strict_types=1);

namespace App\Forms\Logout;

interface ILogoutFormControlFactory
{
    public function create(): LogoutFormControl;
}
