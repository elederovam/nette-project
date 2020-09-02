<?php declare(strict_types=1);

namespace App\Components\Table;

use App\Facade\ITableFacade;
use Nette\Application\UI\Control;

class TableControl extends Control
{
    /**
     * @var ITableFacade
     */
    private $tableFacade;

    /**
     * @var array[]
     */
    private $data;

    /**
     * @param array $data
     * @param ITableFacade $tableFacade
     */
    public function __construct(array $data, ITableFacade $tableFacade)
    {
        $this->tableFacade = $tableFacade;
        $this->data = $data;
    }

    public function render(): void
    {
        $this->getTemplate()->setFile(__DIR__ . DIRECTORY_SEPARATOR . 'tableControl.latte');
        $this->getTemplate()->setParameters(['data' => $this->data]);
        $this->getTemplate()->render();
    }
}
