<?php

/**
 * Class phasesController
 */
class phasesController extends Controller {

    /**
      // @method phase1()
      // @desc Method to load the page 'phase1.php'
     */
    function phase1() {

        // Init
        $this->init();
    }

    /**
      // @method phase2()
      // @desc Method to load the page 'phase2.php'
     */
    function phase2() {

        // Init
        $this->init();
    }

    /**
      // @method phase3()
      // @desc Method to load the page 'phase3.php'
     */
    function phase3() {

        // Init
        $this->init();
    }

    /**
      // @method phase4()
      // @desc Method to load the page 'phase4.php'
     */
    function phase4() {

        // Init
        $this->init();
    }

    /**
      // @method phase5()
      // @desc Method to load the page 'phase5.php'
     */
    function phase5() {

        // Init
        $this->init();
    }

    /**
      // @method phase6()
      // @desc Method to load the page 'phase6.php'
     */
    function phase6() {

        // Init
        $this->init();
    }

    /**
      // @method edit()
      // @desc Method to load the page 'edit.php'
     */
    function edit() {

        // Init
        $this->init();

        // Get the question
        $this->getQuestion();

        // Get the phase
        $this->vars['phase'] = intval($_GET['phase']);
    }

    /**
      // @method add()
      // @desc Method to load the page 'add.php'
     */
    function add() {

        // Init
        $this->init();

        // Get the phase and the noQuestion
        $this->vars['phase'] = intval($_GET['phase']);
        $this->vars['noQuestion'] = intval($_GET['noQuestion']);
    }

    /**
      // @method init()
      // @desc Method that initializes variables and check login
     */
    private function init() {

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['msgSuccess'] = isset($_SESSION['msgSuccess']) ? $_SESSION['msgSuccess'] : '';

        // If no login
        if (!$this->getLogin()) {
            $this->redirect('', '');
            exit;
        }
    }

    /**
      // @method getQuestion()
      // @desc Method that get the question if exist
     */
    private function getQuestion() {

        // Get the id of the question
        if (isset($_GET['id'])) {
            $idQuestion = intval($_GET['id']);
            if ($idQuestion != 0) {
                try {
                    $question = Question::getQuestionById($idQuestion);
                } catch (Exception $exc) {
                    echo $exc->getTraceAsString();
                }
                if ($question) {
                    $this->data['idQuestion'] = $question->getId();
                    $this->data['questionNo'] = $question->getQuestionNo();
                    $this->data['questionFR'] = $question->getQuestionFR();
                    $this->data['questionCommentFR'] = $question->getQuestionCommentFR();
                    $this->data['questionDE'] = $question->getQuestionDE();
                    $this->data['questionCommentDE'] = $question->getQuestionCommentDE();
                    $this->data['axes_idAxe'] = $question->getAxeId();
                } else {
                    $this->redirect('error', 'http404');
                }
            }
        } else {
            $this->data['idQuestion'] = null;
            $this->data['questionNo'] = null;
            $this->data['questionFR'] = null;
            $this->data['questionCommentFR'] = null;
            $this->data['questionDE'] = null;
            $this->data['questionCommentDE'] = null;
            $this->data['axes_idAxe'] = null;
        }
    }

    /**
      // @method addQuestion()
      // @desc Method for adding a question
     */
    function addQuestion() {

        // Get data posted by the form
        $questionFR = $_POST['questionFR'];
        $questionDE = $_POST['questionDE'];
        $questionCommentFR = $_POST['questionCommentFR'];
        $questionCommentDE = $_POST['questionCommentDE'];
        $noQuestion = intval($_GET['noQuestion']);
        $phase = intval($_GET['phase']);

        if ($noQuestion == 2) {
            $idAxe = $_POST['axe'];
        } else {
            $idAxe = null;
        }

        try {
            $result = Question::getLastNo($noQuestion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        $no = (int) $result[0];

        $questionNo = $noQuestion . '.' . ++$no;

        // Create the new question
        $question = new Question(null, $questionNo, $questionFR, $questionCommentFR, $questionDE, $questionCommentDE, $idAxe);

        if (!$idAxe && $phase == 2) {
            $_SESSION['msg'] = MSG_ADD_AXE;
            $this->redirect('phases', 'phase' . $phase);
        } else {
            try {
                // Insert the question
                $question->insertQuestion();
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }

            $_SESSION['msgSuccess'] = MSG_INSERT;
            $this->redirect('phases', 'phase' . $phase);
        }
    }

    /**
      // @method modifQuestion()
      // @desc Method for the modification of a question
     */
    function modifQuestion() {

        // Get data posted by the form
        $questionFR = $_POST['questionFR'];
        $questionDE = $_POST['questionDE'];
        $questionCommentFR = $_POST['questionCommentFR'];
        $questionCommentDE = $_POST['questionCommentDE'];
        $idQuestion = intval($_GET['id']);
        $phase = intval($_GET['phase']);

        try {
            // Get other data
            $question = Question::getQuestionById($idQuestion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        if ($question->getAxeId()) {
            $idAxe = $_POST['axe'];
        } else {
            $idAxe = null;
        }

        $questionNo = $question->getQuestionNo();

        // Create the new question
        $question = new Question($idQuestion, $questionNo, $questionFR, $questionCommentFR, $questionDE, $questionCommentDE, $idAxe);

        try {
            // Update the question
            $question->updateQuestion($idQuestion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        $_SESSION['msgSuccess'] = MSG_MODIF;
        $this->redirect('phases', 'phase' . $phase);
    }

    /**
      // @method deleteQuestion()
      // @desc Method for deleting a question
     */
    function deleteQuestion() {

        // Get data posted by the form
        $idQuestion = intval($_GET['id']);
        $phase = intval($_GET['phase']);

        try {
            Question::deleteQuestion($idQuestion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        $_SESSION['msgSuccess'] = MSG_DELETE;

        $this->redirect('phases', 'phase' . $phase);
    }

    /**
      // @method getQuestionsByNo()
      // @desc Method that get questions by the no of question from the DB
      // @param int $no
      // @return Questions
     */
    public static function getQuestionsByNo($no) {
        try {
            return Question::getQuestionsByNo($no);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}