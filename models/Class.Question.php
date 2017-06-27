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
    
    /**
     * Constructor
     * @param int $idQuestion
     * @param string $questionNo
     * @param string $questionFR
     * @param string $questionCommentFR
     * @param string $questionDE
     * @param string $questionCommentDE
     */
    public function __construct($idQuestion = null, $questionNo, $questionFR, $questionCommentFR, $questionDE, $questionCommentDE){
        $this->setId($idQuestion);
        $this->setQuestionNo($questionNo);
        $this->setQuestionFR($questionFR);
        $this->setQuestionCommentFR($questionCommentFR);
        $this->setQuestionDE($questionDE);
        $this->setQuestionCommentDE($questionCommentDE);
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
        $this->questionCommentFR = $questionCommentDE;
    }
    
    /**
     // @method getQuestionsByPhaseId()
     // @desc Method that get a question by the id of the phase from the DB
     // @param int $idPhase
     // @return Questions
     */
    public static function getQuestionsByPhaseId($idPhase) {
        switch ($idPhase) {
            case 4:
                $id2 = $idPhase+1;
                $query = "SELECT * FROM questions WHERE questionNo LIKE '$idPhase.%' OR questionNo LIKE '$id2.%';";    
                break;
            case 5:
                $id1 = $idPhase+1;
                $id2 = $idPhase+2;
                $query = "SELECT * FROM questions WHERE questionNo LIKE '$id1.%' OR questionNo LIKE '$id2.%';";    
                break;
            case 6:
                $id1 = $idPhase+2;
                $id2 = $idPhase+3;
                $query = "SELECT * FROM questions WHERE questionNo LIKE '$id1.%' OR questionNo LIKE '$id2.%';";    
                break;
            default:
                $query = "SELECT * FROM questions WHERE questionNo LIKE '$idPhase.%';";
                break;
        }
        
        $result = SqlConnection::getInstance()->selectDB($query);
        $Questions = array();
        $rows = $result->fetchAll();

        foreach($rows as $row) {
            $question = new Question($row['idQuestion'], $row['questionNo'], $row['questionFR'], $row['questionCommentFR'], $row['questionDE'], $row['questionCommentDE']);
                
            $Questions[] = $question;
        }

        return $Questions;
    }
}

