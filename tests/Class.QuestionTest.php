<?php

require_once '../models/Class.Question.php';
require_once '../database/Class.SqlConnection.php';

use PHPUnit\Framework\TestCase;

/**
 * Class QuestionTest
 */
class QuestionTest extends TestCase {

    /**
      // @testmethod testGetQuestionsByNo()
      // @desc Test Method that check the get a question by the no from the DB
     */
    public function testGetQuestionsByNo() {
        $Questions = Question::getQuestionsByNo(1);
        $this->assertEquals(Question::getQuestionsByNo(1), $Questions);
    }

    /**
      // @testmethod testGetQuestionById()
      // @desc Test Method that check the get a question by the idQuestion from the DB
     */
    public function testGetQuestionById() {
        $question = new Question(27, "5.5", "Manque de marge d'optimisation", "", "de", "", null);
        $this->assertEquals(Question::getQuestionById(27), $question);
    }

    /**
      // @testmethod testGetQuestionByIdFalse()
      // @desc Test Method that check the get a question by the wrong idQuestion from the DB
     */
    public function testGetQuestionByIdFalse() {
        $this->assertFalse(Question::getQuestionById(-1));
    }

    /**
      // @testmethod testGetLastNoFalse()
      // @desc Test Method that get the last questionNo by the wrong idPhase
     */
    public function testGetLastNoFalse() {
        $this->assertFalse(Question::getLastNo(-1));
    }

}