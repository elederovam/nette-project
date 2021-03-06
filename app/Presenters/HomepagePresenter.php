<?php declare(strict_types=1);

namespace App\Presenters;

use App\Forms\Login\ILoginFormControlFactory;
use App\Forms\Login\LoginFormControl;
use Nette;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /**
     * @var ILoginFormControlFactory
     * @inject
     */
    public $loginFormControlFactory;

    public function createComponentLoginFormControl(): LoginFormControl
    {
        $loginFormControl = $this->loginFormControlFactory->create();
        $loginFormControl->onLogin[] = function (): void {
            $this->redirect('Table:');
        };

        return $loginFormControl;
    }
}
