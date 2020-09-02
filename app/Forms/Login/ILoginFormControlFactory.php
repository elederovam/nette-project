<?php declare(strict_types=1);

namespace App\Forms\Login;

interface ILoginFormControlFactory
{
    public function create(): LoginFormControl;
}
