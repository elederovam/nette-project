<?php declare(strict_types=1);

namespace App\Presenters;

use App\Components\Table\ITableControlFactory;
use App\Components\Table\TableControl;
use App\Facade\ITableFacade;
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
     * @var ITableControlFactory
     * @inject
     */
    public $tableControlFactory;

    /**
     * @var ITableFacade
     * @inject
     */
    public $tableFacade;

    /**
     * @var array[]
     */
    private $data;

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

    public function actionDefault()
    {
        $this->data = $this->tableFacade->getTableData();
    }

    public function createComponentLogoutFormControl(): LogoutFormControl
    {
        $logoutFormControl = $this->logoutFormControlFactory->create();
        $logoutFormControl->onLogout[] = function (): void {
            $this->redirect('Homepage:');
        };

        return $logoutFormControl;
    }

    public function createComponentTableControl(): TableControl
    {
        return $this->tableControlFactory->create($this->data);
    }
}
