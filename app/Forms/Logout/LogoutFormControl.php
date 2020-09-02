<?php declare(strict_types=1);

namespace App\Forms\Logout;

use App\Facade\IUserFacade;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;

/**
 * @method void onLogout()
 */
class LogoutFormControl extends Control
{
    /**
     * @var callable[]
     */
    public $onLogout = [];

    /**
     * @var IUserFacade
     */
    private $userFacade;

    /**
     * @param IUserFacade $userFacade
     */
    public function __construct(IUserFacade $userFacade)
    {
        $this->userFacade = $userFacade;
    }

    public function createComponentForm(): Form
    {
        $form = new Form();

        $form->addSubmit('submit', 'Odhlásit se');

        $form->onSuccess[] = [$this, 'formSucceeded'];

        return $form;
    }

    public function formSucceeded(Form $form, ArrayHash $values): void
    {
        $this->userFacade->logout();
        $this->onLogout();
    }

    public function render(): void
    {
        $this->getTemplate()->setFile(__DIR__ . DIRECTORY_SEPARATOR . 'logoutFormControl.latte');
        $this->getTemplate()->render();
    }
}
