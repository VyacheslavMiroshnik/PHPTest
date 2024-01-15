<?php

namespace Vyacheslav\Classes;

class User
{
    public UserTableWrapper $db;

    public function __construct()
    {
        $this->db = new UserTableWrapper();
    }
}
