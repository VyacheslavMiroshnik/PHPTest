<?php

namespace Vyacheslav\Classes;

class UserTableWrapper
{
    private array $rows;

    /**
     * @param array|[column => row_value] $values
     */
    public function insert(array $values): void
    {
        $this->rows[] = $values;
    }
    public function get(): array
    {
        return $this->rows;
    }
}
