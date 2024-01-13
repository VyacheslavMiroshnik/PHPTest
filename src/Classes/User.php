<?php

namespace Vyacheslav\Classes;

class User extends UserTableWrapper
{
    public UserTableWrapper $db;

    public function __construct()
    {
        $this->db = new UserTableWrapper();
    }
}
