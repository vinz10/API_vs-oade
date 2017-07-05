<?php

require_once '../models/Class.Axe.php';
require_once '../database/Class.SqlConnection.php';

use PHPUnit\Framework\TestCase;

/**
 * Class AxeTest
 */
class AxeTest extends TestCase {

    /**
      // @testmethod testGetAxes()
      // @desc Test Method that check the get axes from the DB
     */
    public function testGetAxes() {
        $Axes = Axe::getAxes();
        $this->assertEquals(Axe::getAxes(), $Axes);
    }

    /**
      // @testmethod testGetAxeById()
      // @desc Test Method that check the get an axe by the idAxe from the DB
     */
    public function testGetAxeById() {
        $axe = new Axe(1, "société", "Gesellschaft");
        $this->assertEquals(Axe::getAxeById(1), $axe);
    }

    /**
      // @testmethod testGetAxeByIdFalse()
      // @desc Test Method that check the get an axe by the wrong idAxe from the DB
     */
    public function testGetAxeByIdFalse() {
        $this->assertFalse(Axe::getAxeById(-1));
    }

    /**
      // @testmethod testExistAxeFalse()
      // @desc Test Method that check if an axe not already exists by the nameFR or nameDE
     */
    public function testExistAxeFalse() {
        $this->assertFalse(Axe::existAxe("WrongFrenchName", "WrongGermanName"));
    }

    /**
      // @testmethod testExistAxeTrue()
      // @desc Test Method that check if an axe already exists by the nameFR or nameDE
     */
    public function testExistAxeTrue() {
        $this->assertTrue(Axe::existAxe("société", "Gesellschaft"));
    }

    /**
      // @testmethod testCheckLinksFalse()
      // @desc Test Method that check if an axe is not related to a question by the idAxe
     */
    public function testCheckLinksFalse() {
        $this->assertFalse(Axe::checkLinks(-1));
    }

    /**
      // @testmethod testCheckLinksTrue()
      // @desc Test Method that check if an axe is related to a question by the idAxe
     */
    public function testCheckLinksTrue() {
        $this->assertTrue(Axe::checkLinks(1));
    }

}