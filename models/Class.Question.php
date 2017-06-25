<?php

/**
 * Class Question
 */
class Question {
    private $idQuestion;
    private $questionNo;
    private $question;
    private $questionComment;
    
    /**
     * Constructor
     * @param int $idQuestion
     * @param string $questionNo
     * @param string $question
     * @param string $questionComment
     */
    public function __construct($idQuestion = null, $questionNo, $question, $questionComment){
        $this->setId($idQuestion);
        $this->setQuestionNo($questionNo);
        $this->setQuestion($question);
        $this->setQuestionComment($questionComment);
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
     * @return question
     */
    public function getQuestion(){
            return $this->question;
    }

    /**
     * @param string $question
     */
    public function setQuestion($question){
        $this->question = $question;
    }
    
    /**
     * @return questionComment
     */
    public function getQuestionComment(){
            return $this->questionComment;
    }

    /**
     * @param string $questionComment
     */
    public function setQuestionComment($questionComment){
        $this->questionComment = $questionComment;
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
            $question = new Question($row['idQuestion'], $row['questionNo'], $row['question'], $row['questionComment']);
                
            $Questions[] = $question;
        }

        return $Questions;
    }
}

