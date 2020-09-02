<?php declare(strict_types=1);

namespace App\Components\Table;

interface ITableControlFactory
{
    /**
     * @param array[] $data
     * @return TableControl
     */
    public function create(array $data): TableControl;
}
