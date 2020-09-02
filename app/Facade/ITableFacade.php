<?php declare(strict_types=1);

namespace App\Facade;

interface ITableFacade
{
    /**
     * Get JSON string with data.
     *
     * @return array[]
     */
    public function getTableData(): array;

    /**
     * Delete row with given ID from table.
     *
     * @param int $id
     */
    public function deleteRow(int $id): void;
}
