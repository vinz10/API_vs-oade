<?php

/**
 * Class Axe
 */
class Axe {

    private $idAxe;
    private $nameFR;
    private $nameDE;

    /**
     * Constructor
     * @param int $idAxe
     * @param string $nameFR
     * @param string $nameDE
     */
    public function __construct($idAxe = null, $nameFR, $nameDE) {
        $this->setId($idAxe);
        $this->setNameFR($nameFR);
        $this->setNameDE($nameDE);
    }

    /**
     * @return idAxe
     */
    public function getId() {
        return $this->idAxe;
    }

    /**
     * @param int $idAxe
     */
    public function setId($idAxe) {
        $this->idAxe = $idAxe;
    }

    /**
     * @return nameFR
     */
    public function getNameFR() {
        return $this->nameFR;
    }

    /**
     * @param string $nameFR
     */
    public function setNameFR($nameFR) {
        $this->nameFR = $nameFR;
    }

    /**
     * @return nameDE
     */
    public function getNameDE() {
        return $this->nameDE;
    }

    /**
     * @param string $nameDE
     */
    public function setNameDE($nameDE) {
        $this->nameDE = $nameDE;
    }

    /**
      // @method getAxes()
      // @desc Method that get axes from the DB
      // @return Axes
     */
    public static function getAxes() {

        $query = "SELECT * FROM axes;";
        $result = SqlConnection::getInstance()->selectDB($query);
        $Axes = array();
        $rows = $result->fetchAll();

        foreach ($rows as $row) {
            $axe = new Axe($row['idAxe'], $row['nameFR'], $row['nameDE']);

            $Axes[] = $axe;
        }

        return $Axes;
    }

    /**
      // @method getAxeById()
      // @desc Method that get an axe by the idAxe from the DB
      // @param int $idAxe
      // @return Axe
     */
    public static function getAxeById($idAxe) {
        $query = "SELECT * FROM axes WHERE idAxe='$idAxe';";
        $result = SqlConnection::getInstance()->selectDB($query);
        $row = $result->fetch();

        if (!$row) {
            return false;
        }

        return new Axe($row['idAxe'], $row['nameFR'], $row['nameDE']);
    }

    /**
      // @method insertAxe()
      // @desc Method that insert a new Axe into the DB
      // @return PDOStatement
     */
    public function insertAxe() {

        $sql = SqlConnection::getInstance();

        $query = "INSERT into axes(nameFR, nameDE) VALUES(";
        $query .= $sql->getConn()->quote($this->nameFR) . ', ';
        $query .= $sql->getConn()->quote($this->nameDE) . ');';

        return $sql->executeQuery($query);
    }

    /**
      // @method updateAxe()
      // @desc Method that update an axe into the DB by the idAxe
      // @param int $idAxe
      // @return PDOStatement
     */
    public function updateAxe($idAxe) {

        $sql = SqlConnection::getInstance();

        $query = 'UPDATE axes SET nameFR = ' . $sql->getConn()->quote($this->nameFR);
        $query .= ', nameDE = ' . $sql->getConn()->quote($this->nameDE) . ' WHERE idAxe = ' . $idAxe . ';';

        return $sql->executeQuery($query);
    }

    /**
      // @method deleteAxe()
      // @desc Method that delete an axe by the idAxe
      // @param int $idAxe
     */
    public static function deleteAxe($idAxe) {

        $query = "DELETE FROM axes WHERE idAxe='$idAxe'";

        return SqlConnection::getInstance()->deleteDB($query);
    }

    /**
      // @method existAxe()
      // @desc Method that check if an axe already exists by the nameFR or nameDE
      // @param string $nameFR
      // @param string $nameDE
      // @return boolean
     */
    public static function existAxe($nameFR, $nameDE) {

        $sql = SqlConnection::getInstance();

        $query = "SELECT * FROM axes WHERE nameFR=" . $sql->getConn()->quote($nameFR) . " OR nameDE=" . $sql->getConn()->quote($nameDE) . ";";

        $result = $sql->selectDB($query);
        $row = $result->fetch();
        if (!$row) {
            return false;
        }

        return true;
    }

    /**
      // @method checkLinks()
      // @desc Method that check if an axe is related to a question by the idAxe
      // @param int $idAxe
      // @return boolean
     */
    public static function checkLinks($idAxe) {

        $sql = SqlConnection::getInstance();

        $query = "SELECT * FROM questions WHERE axes_idAxe='$idAxe';";

        $result = $sql->selectDB($query);
        $row = $result->fetch();
        if (!$row) {
            return false;
        }

        return true;
    }

}