<?php declare(strict_types=1);

namespace App\Presenters;

use App\Forms\Logout\ILogoutFormControlFactory;
use App\Forms\Logout\LogoutFormControl;
use Nette;

final class TablePresenter extends Nette\Application\UI\Presenter
{
    /**
     * @var ILogoutFormControlFactory
     * @inject
     */
    public $logoutFormControlFactory;

    /**
     * @throws Nette\Application\AbortException
     */
    public function startup(): void
    {
        parent::startup();

        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Homepage:');
        }
    }

    public function createComponentLogoutFormControl(): LogoutFormControl
    {
        $logoutFormControl = $this->logoutFormControlFactory->create();
        $logoutFormControl->onLogout[] = function (): void {
            $this->redirect('Homepage:');
        };

        return $logoutFormControl;
    }
}
