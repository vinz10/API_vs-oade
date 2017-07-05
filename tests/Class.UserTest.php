<?php

require_once '../models/Class.User.php';
require_once '../database/Class.SqlConnection.php';

use PHPUnit\Framework\TestCase;

/**
 * Class UserTest
 */
class UserTest extends TestCase {

    /**
      // @testmethod testGetUsers()
      // @desc Test Method that check the get users from the DB
     */
    public function testGetUsers() {
        $Users = User::getUsers();
        $this->assertEquals(User::getUsers(), $Users);
    }

    /**
      // @testmethod testGetUserById()
      // @desc Test Method that check the get a user by the idUser from the DB
     */
    public function testGetUserById() {
        $user = new User(1, "admin", "pass");
        $this->assertEquals(User::getUserById(1), $user);
    }

    /**
      // @testmethod testGetUserByIdFalse()
      // @desc Test Method that check the get a user by the wrong idUser from the DB
     */
    public function testGetUserByIdFalse() {
        $this->assertFalse(User::getUserById(-1));
    }

    /**
      // @testmethod testExistUserFalse()
      // @desc Test Method that check if a user already exists by the wrong username
     */
    public function testExistUserFalse() {
        $this->assertFalse(User::existUser("WrongUsername"));
    }

    /**
      // @testmethod testExistUserTrue()
      // @desc Test Method that check if a user already exists by the username
     */
    public function testExistUserTrue() {
        $this->assertTrue(User::existUser("admin"));
    }

    /**
      // @testmethod testCheckNbrFalse()
      // @desc Test Method that check the amount of users in the DB
     */
    public function testCheckNbrFalse() {
        $this->assertFalse(User::checkNbr());
    }

}