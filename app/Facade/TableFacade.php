<?php declare(strict_types=1);

namespace App\Facade;

class TableFacade implements ITableFacade
{
    /**
     * Get JSON string with data.
     *
     * @return array[]
     */
    public function getTableData(): array
    {
        // todo get form session (if it is there) or load from API
        return [
            [
                'id' => 1,
                'email' => "george.bluth@reqres.in",
                'first_name' => "George",
                'last_name' => "Bluth",
                'avatar' => "https://s3.amazonaws.com/uifaces/faces/twitter/calebogden/128.jpg",
            ],
            [
                'id' => 2,
                'email' => "janet.weaver@reqres.in",
                'first_name' => "Janet",
                'last_name' => "Weaver",
                'avatar' => "https://s3.amazonaws.com/uifaces/faces/twitter/josephstein/128.jpg",
            ]];
    }

    /**
     * Delete row with given ID from table.
     *
     * @param int $id
     */
    public function deleteRow(int $id): void
    {
        // todo
    }
}
