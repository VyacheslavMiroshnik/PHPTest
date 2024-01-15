<?php

namespace Vyacheslav\Classes;

use Vyacheslav\Interfaces\TableWrapperInterface;

class UserTableWrapper implements TableWrapperInterface
{
    private array $rows = [];


    public function insert(array $values): void
    {
        $this->rows[] = $values;
    }

    public function update(int $id, array $values): array
    {
        if(array_key_exists($id,$this->rows))
        {
        $this->rows[$id]=$values;
        return $this->rows[$id];
        }
        return [];
    }
    public function delete(int $id): void
    {
        if(array_key_exists($id,$this->rows))
        {
            unset($this->rows[$id]);
        }
    }



    public function get():array
    {
        return $this->rows;
    }
}
