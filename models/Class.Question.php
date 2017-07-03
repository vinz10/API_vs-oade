<?php

/**
 * Class Question
 */
class Question {
    private $idQuestion;
    private $questionNo;
    private $questionFR;
    private $questionCommentFR;
    private $questionDE;
    private $questionCommentDE;
    private $axes_idAxe;
    
    /**
     * Constructor
     * @param int $idQuestion
     * @param string $questionNo
     * @param string $questionFR
     * @param string $questionCommentFR
     * @param string $questionDE
     * @param string $questionCommentDE
     * @param int $axes_idAxe;
     */
    public function __construct($idQuestion = null, $questionNo, $questionFR, $questionCommentFR, $questionDE, $questionCommentDE, $axes_idAxe){
        $this->setId($idQuestion);
        $this->setQuestionNo($questionNo);
        $this->setQuestionFR($questionFR);
        $this->setQuestionCommentFR($questionCommentFR);
        $this->setQuestionDE($questionDE);
        $this->setQuestionCommentDE($questionCommentDE);
        $this->setAxeId($axes_idAxe);
    }	
	
    /**
     * @return idQuestion
     */
    public function getId(){
        return $this->idQuestion;
    }

    /**
     * @param int $idQuestion
     */
    public function setId($idQuestion){
        $this->idQuestion = $idQuestion;
    }
	
    /**
     * @return questionNo
     */
    public function getQuestionNo(){
        return $this->questionNo;
    }

    /**
     * @param string $questionNo
     */
    public function setQuestionNo($questionNo){
        $this->questionNo = $questionNo;
    }
	
    /**
     * @return questionFR
     */
    public function getQuestionFR(){
            return $this->questionFR;
    }

    /**
     * @param string $questionFR
     */
    public function setQuestionFR($questionFR){
        $this->questionFR = $questionFR;
    }
    
    /**
     * @return questionCommentFR
     */
    public function getQuestionCommentFR(){
            return $this->questionCommentFR;
    }

    /**
     * @param string $questionCommentFR
     */
    public function setQuestionCommentFR($questionCommentFR){
        $this->questionCommentFR = $questionCommentFR;
    }
    
    /**
     * @return questionDE
     */
    public function getQuestionDE(){
            return $this->questionDE;
    }

    /**
     * @param string $questionDE
     */
    public function setQuestionDE($questionDE){
        $this->questionDE = $questionDE;
    }
    
    /**
     * @return questionCommentDE
     */
    public function getQuestionCommentDE(){
            return $this->questionCommentDE;
    }

    /**
     * @param string $questionCommentDE
     */
    public function setQuestionCommentDE($questionCommentDE){
        $this->questionCommentDE = $questionCommentDE;
    }
    
    /**
     * @return axes_idAxe
     */
    public function getAxeId(){
            return $this->axes_idAxe;
    }

    /**
     * @param string $axes_idAxe
     */
    public function setAxeId($axes_idAxe){
        $this->axes_idAxe = $axes_idAxe;
    }
    
    /**
     // @method getQuestionsByNo()
     // @desc Method that get a question by the no of question from the DB
     // @param int $no
     // @return Questions
     */
    public static function getQuestionsByNo($no) {
        
        $query = "SELECT * FROM questions WHERE questionNo LIKE '$no.%' ORDER BY 1*SUBSTRING_INDEX(questionNo, '.', 1) ASC, 1*SUBSTRING_INDEX(questionNo, '.', -1) ASC;";
        $result = SqlConnection::getInstance()->selectDB($query);
        $Questions = array();
        $rows = $result->fetchAll();

        foreach($rows as $row) {
            $question = new Question($row['idQuestion'], $row['questionNo'], $row['questionFR'], $row['questionCommentFR'], $row['questionDE'], $row['questionCommentDE'], $row['axes_idAxe']);
                
            $Questions[] = $question;
        }

        return $Questions;
    }
    
    /**
     // @method getQuestionById()
     // @desc Method that get a question by the id of the question from the DB
     // @param int $idQuestion
     // @return Question
     */
    public static function getQuestionById($idQuestion){
        $query = "SELECT * FROM questions WHERE idQuestion='$idQuestion';";
        $result = SqlConnection::getInstance()->selectDB($query);
        $row = $result->fetch();
        
        if(!$row) {
            return false;
        }

        return new Question($row['idQuestion'], $row['questionNo'], $row['questionFR'], $row['questionCommentFR'], $row['questionDE'], $row['questionCommentDE'], $row['axes_idAxe']);
    }
    
    /**
     // @method getLastNo()
     // @desc Method that get the last questionNo
     // @param int $idPhase
     // @return int lastNo
     */
    public static function getLastNo($idPhase){
        switch ($idPhase) {
            case 4:
                $id1 = $idPhase+1;
                $query = "SELECT 1*SUBSTRING_INDEX(questionNo, '.', -1) AS no FROM questions WHERE questionNo LIKE '$id1.%'
                    ORDER BY 1*SUBSTRING_INDEX(questionNo, '.', 1) DESC, 1*SUBSTRING_INDEX(questionNo, '.', -1) DESC LIMIT 1;";
                break;
            default:
                $query = "SELECT 1*SUBSTRING_INDEX(questionNo, '.', -1) AS no FROM questions WHERE questionNo LIKE '$idPhase.%'
                ORDER BY 1*SUBSTRING_INDEX(questionNo, '.', 1) DESC, 1*SUBSTRING_INDEX(questionNo, '.', -1) DESC LIMIT 1;";
                break;
        }
        
        $result = SqlConnection::getInstance()->selectDB($query);
        $row = $result->fetch();
        
        if(!$row) {
            return false;
        }

        return $row;
    }
    
    /**
     // @method insertQuestion()
     // @desc Method that insert a new Question into the DB
     // @return PDOStatement
     */
    public function insertQuestion(){
        
        $sql = SqlConnection::getInstance();

        $query = "INSERT into questions(questionNo, questionFR, questionCommentFR, questionDE, questionCommentDE, axes_idAxe) VALUES(";
        $query .= $sql->getConn()->quote($this->questionNo) . ', ';
        $query .= $sql->getConn()->quote($this->questionFR) . ', ';
        $query .= $sql->getConn()->quote($this->questionCommentFR) . ', ';
        $query .= $sql->getConn()->quote($this->questionDE) . ', ';
        $query .= $sql->getConn()->quote($this->questionCommentDE) . ', ';
        $query .= $sql->getConn()->quote($this->axes_idAxe) . ');';

        return  $sql->executeQuery($query);
    }
    
    /**
     // @method updateQuestion()
     // @desc Method that update a question into the DB
     // @param int $idQuestion
     // @return PDOStatement
     */
    public function updateQuestion($idQuestion){
        
        $sql = SqlConnection::getInstance();

        $query = 'UPDATE questions SET questionNo = ' . $sql->getConn()->quote($this->questionNo);
        $query .= ', questionFR = ' . $sql->getConn()->quote($this->questionFR);
        $query .= ', questionCommentFR = ' . $sql->getConn()->quote($this->questionCommentFR);
        $query .= ', questionDE = ' . $sql->getConn()->quote($this->questionDE);
        $query .= ', questionCommentDE = ' . $sql->getConn()->quote($this->questionCommentDE);
        $query .= ', axes_idAxe = ' . $sql->getConn()->quote($this->axes_idAxe) . ' WHERE idQuestion = ' . $idQuestion . ';';
        
        return  $sql->executeQuery($query);
    }
    
    /**
     // @method deleteQuestion()
     // @desc Method that delete a question by its id
     // @param int $idQuestion
     */
    public static function deleteQuestion($idQuestion) {
        
        $query = "DELETE FROM questions WHERE idQuestion='$idQuestion'";

        return SqlConnection::getInstance()->deleteDB($query);
    }
}