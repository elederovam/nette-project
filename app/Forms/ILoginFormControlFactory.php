<?php declare(strict_types=1);

namespace App\Forms;

interface ILoginFormControlFactory
{
    public function create(): LoginFormControl;
}
