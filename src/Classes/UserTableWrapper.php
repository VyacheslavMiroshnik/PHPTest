<?php

namespace Vyacheslav\Classes;

class UserTableWrapper
{
    private array $rows = [];

    /**
     * @param array|[column => row_value] $values
     */
    public function insert(array $values): void
    {
        $this->rows[] = $values;
    }

    public function update(int $id, array $values): array
    {
        if((count($this->rows)-1) >= $id)
        {
        $this->rows[$id]=$values;
        return $this->rows[$id];

        }
        return [];
    }
    public function get(): array
    {
        return $this->rows;
    }
}
