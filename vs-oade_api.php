<?php

class SqlConnection {

    const HOST = "127.0.0.1";
    const PORT = "3306";
    const DATABASE = "db_vs-oade_admin";
    const USER = "root";
    const PWD = "";

    private static $instance;
    private $_conn;

    /**
     * Constructor
      // @method __construct()
      // @desc constructor
     */
    private function __construct() {
        try {
            $this->_conn = new PDO('mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DATABASE, self::USER, self::PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $e) {
            die(MSG_CONNECTION_FAIL . ' : ' . $e->getMessage());
        }
    }

    /**
     // singleton method
     // @method getInstance
     // @return resource
     */
    public static function getInstance() {
        if (!isset(self::$instance) || self::$instance == null) {
            $c = __CLASS__;
            self::$instance = new $c();
        }
        return self::$instance;
    }

    /**
     // @method getConn
     // @return connection
     */
    public function getConn() {
        return $this->_conn;
    }

    /**
     // @method selectDB
     // @desc Method for the SELECT
     // @param query
     // @return result
     */
    public function selectDB($query) {
        $result = $this->_conn->query($query) or die(print_r($this->_conn->errorInfo(), true));

        return $result;
    }

}

// -------------- API --------------------//

/**
 * @method get_questions_by_id()
 * @desc Method that get questions by id
 * @param $id
 * @return $questions
 */
function get_questions_by_id($id) {

    $questions = array();

    switch ($id) {
        case 1:
            $query = "SELECT * FROM questions WHERE questionNo LIKE '1.%' OR questionNo LIKE '2.%' 
                ORDER BY 1*SUBSTRING_INDEX(questionNo, '.', 1) ASC, 1*SUBSTRING_INDEX(questionNo, '.', -1) ASC;";
            break;
        case 2:
            $query = "SELECT * FROM questions WHERE questionNo LIKE '2.%'
                ORDER BY 1*SUBSTRING_INDEX(questionNo, '.', 1) ASC, 1*SUBSTRING_INDEX(questionNo, '.', -1) ASC;";
            break;
        case 3:
            $query = "SELECT * FROM questions WHERE questionNo LIKE '3.%'
                ORDER BY 1*SUBSTRING_INDEX(questionNo, '.', 1) ASC, 1*SUBSTRING_INDEX(questionNo, '.', -1) ASC;";
            break;
        case 4:
            $query = "SELECT * FROM questions WHERE questionNo LIKE '2.%'
                ORDER BY 1*SUBSTRING_INDEX(questionNo, '.', 1) ASC, 1*SUBSTRING_INDEX(questionNo, '.', -1) ASC;";
            break;
        case 5:
            $query = "SELECT * FROM questions WHERE questionNo LIKE '5.%'
                ORDER BY 1*SUBSTRING_INDEX(questionNo, '.', 1) ASC, 1*SUBSTRING_INDEX(questionNo, '.', -1) ASC;";
            break;
        case 6:
            $query = "SELECT * FROM questions WHERE questionNo LIKE '6.%'
                ORDER BY 1*SUBSTRING_INDEX(questionNo, '.', 1) ASC, 1*SUBSTRING_INDEX(questionNo, '.', -1) ASC;";
            break;
        case 7:
            $query = "SELECT * FROM questions WHERE questionNo LIKE '7.%'
                ORDER BY 1*SUBSTRING_INDEX(questionNo, '.', 1) ASC, 1*SUBSTRING_INDEX(questionNo, '.', -1) ASC;";
            break;
        case 8:
            $query = "SELECT * FROM questions WHERE questionNo LIKE '8.%'
                ORDER BY 1*SUBSTRING_INDEX(questionNo, '.', 1) ASC, 1*SUBSTRING_INDEX(questionNo, '.', -1) ASC;";
            break;
        case 9:
            $query = "SELECT * FROM questions WHERE questionNo LIKE '9.%'
                ORDER BY 1*SUBSTRING_INDEX(questionNo, '.', 1) ASC, 1*SUBSTRING_INDEX(questionNo, '.', -1) ASC;";
            break;
    }

    $result = SqlConnection::getInstance()->selectDB($query);
    $rows = $result->fetchAll();

    foreach ($rows as $row) {
        $question = array("id" => $row['questionNo'], "questionFR" => $row['questionFR'], "questionCommentFR" => $row['questionCommentFR']
            , "questionDE" => $row['questionDE'], "questionCommentDE" => $row['questionCommentDE'], "axes_idAxe" => $row['axes_idAxe']);
        $questions[] = $question;
    }

    return $questions;
}

/**
 * @method get_question_by_id()
 * @desc Method that get a question by id
 * @param $id
 * @return $question
 */
function get_question_by_id($id) {

    $questions = array();

    $query = "SELECT * FROM questions WHERE questionNo='$id';";

    $result = SqlConnection::getInstance()->selectDB($query);
    $row = $result->fetch();
    if (!$row) {
        return false;
    }

    $question = array("id" => $row['questionNo'], "questionFR" => $row['questionFR'], "questionCommentFR" => $row['questionCommentFR']
        , "questionDE" => $row['questionDE'], "questionCommentDE" => $row['questionCommentDE'], "axes_idAxe" => $row['axes_idAxe']);

    return $question;
}

/**
 * @method get_axe_by_id()
 * @desc Method that get an axe by id
 * @param $id
 * @return $axe
 */
function get_axe_by_id($id) {

    $query = "SELECT * FROM axes WHERE idAxe='$id';";

    $result = SqlConnection::getInstance()->selectDB($query);
    $row = $result->fetch();
    if (!$row) {
        return false;
    }

    $axe = array("id" => $row['idAxe'], "nameFR" => $row['nameFR'], "nameDE" => $row['nameDE']);

    return $axe;
}

/**
 * @method get_axes()
 * @desc Method that get all axes
 * @return $axes
 */
function get_axes() {

    $axes = array();

    $query = "SELECT * FROM axes;";

    $result = SqlConnection::getInstance()->selectDB($query);
    $rows = $result->fetchAll();

    foreach ($rows as $row) {
        $axe = array("id" => $row['idAxe'], "nameFR" => $row['nameFR'], "nameDE" => $row['nameDE']);
        $axes[] = $axe;
    }

    return $axes;
}

$possible_url = array("get_axes", "get_axe_by_id", "get_questions", "get_question_by_id");

$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url)) {

    switch ($_GET["action"]) {
        case "get_questions":
            if (isset($_GET["id"])) {
                $value = get_questions_by_id($_GET["id"]);
            } else {
                $value = "Missing argument";
            }
            break;
        case "get_question_by_id":
            if (isset($_GET["id"])) {
                $value = get_question_by_id($_GET["id"]);
            } else {
                $value = "Missing argument";
            }
            break;
        case "get_axe_by_id":
            if (isset($_GET["id"])) {
                $value = get_axe_by_id($_GET["id"]);
            } else {
                $value = "Missing argument";
            }
            break;
        case "get_axes":
            $value = get_axes();
            break;
    }
}

// return JSON array
exit(json_encode($value));