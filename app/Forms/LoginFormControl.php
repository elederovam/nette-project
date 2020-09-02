<?php declare(strict_types=1);

namespace App\Forms;

use App\Facade\IUserFacade;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Security\AuthenticationException;
use Nette\Utils\ArrayHash;

/**
 * @method void onLogin()
 */
class LoginFormControl extends Control
{
    private const PASSWORD_NAME = 'password';

    /**
     * @var callable[]
     */
    public $onLogin = [];

    /**
     * @var IUserFacade
     */
    private $userFacade;

    /**
     * @param IUserFacade $userFacade
     */
    public function __construct(IUserFacade $userFacade)
    {
//        parent::__construct();
        $this->userFacade = $userFacade;
    }

    public function createComponentForm(): Form
    {
        $form = new Form();

        $form->addText(self::PASSWORD_NAME, 'Heslo')
            ->setRequired();

        $form->addSubmit('submit', 'Přihlásit se');

        $form->onSuccess[] = [$this, 'formSucceeded'];

        return $form;
    }

    public function formSucceeded(Form $form, ArrayHash $values): void
    {
        try {
            $password = $values[self::PASSWORD_NAME];
            $this->userFacade->login($password);
        } catch (AuthenticationException $exception) {
            $form->addError('Špatné heslo');
            return;
        }

        $this->onLogin();
    }

    public function render(): void
    {
        $this->getTemplate()->setFile(__DIR__ . DIRECTORY_SEPARATOR . 'loginFormControl.latte');
        $this->getTemplate()->render();
    }
}
