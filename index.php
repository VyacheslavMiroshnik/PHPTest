<?php
require_once('vendor/autoload.php');
use Vyacheslav\Classes\User;
$user2 = new User();
$user2->db->insert(['name' => 'John', 'email' => 'tugrp@example.com']);
print_r($user2->db->get());
echo "fsdfsdfsd";
