<?php
require_once('vendor/autoload.php');
use Vyacheslav\Classes\User;
$user2 = new User();
$user2->db->insert(['name' => 'John', 'email' => 'tugrp@example.com']);
print_r($user2->db->get());
echo "fsdfsdfsd";


$res = $user2->db->update(0,['name' => 'Johnfdfdf', 'email' => 'tugfdfdfdrp@example.com']);
var_dump($res);
