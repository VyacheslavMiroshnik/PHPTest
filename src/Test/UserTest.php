<?php

namespace Vyacheslav\Test;

use Vyacheslav\Classes\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testNewUser()
    {
        $user = new User();
        $this->assertEmpty($user->db->get());
        return $user;
    }
    /**
     * @dataProvider providerInsert
     * @depends testNewUser
     */
    public function testInsert($expect,$result,$user)
    {
        $user->db->insert($expect);
        $resultInsert = $user->db->get();
        $this->assertEquals($resultInsert,$result);
    }
    public static function providerInsert():array
    {
        $expect =
            [
                ['name' => 'John', 'email' => 'tugrp@example.com'],
                ['name' => 'John2', 'email' => '2@example.com']
            ];
        $result =
            [
                [['name' => 'John', 'email' => 'tugrp@example.com']],
                [['name' => 'John', 'email' => 'tugrp@example.com'],['name' => 'John2', 'email' => '2@example.com']]
            ];
        return
            [
              'first'=>[$expect[0],$result[0]],
              'second'=>[$expect[1],$result[1]]
            ];
    }

    /**
     * @depends testNewUser
     * @depends  testInsert
     * @dataProvider providerUpdate
     * */
    public function testUpdate(int $id, $expect, $result,$user)
    {
        $res = $user->db->update($id,$expect);
        $this->assertEquals($res,$result);
    }

    public static function providerUpdate():array
    {
        $expect =
            [
                ['name' => 'Update John', 'email' => 'tugrp@example.com'],
                ['name' => 'Update John2', 'email' => '2@example.com'],
                ['name' => 'Update John2', 'email' => '2@example.com']

            ];
        $result =
            [
                ['name' => 'Update John', 'email' => 'tugrp@example.com'],
                ['name' => 'Update John2', 'email' => '2@example.com'],
                []
            ];
        return
            [
                'first'=>[0,$expect[0],$result[0]],
                'second'=>[1,$expect[1],$result[1]],
                'wrong id'=>[4,$expect[2],$result[2]]
            ];

    }
}
